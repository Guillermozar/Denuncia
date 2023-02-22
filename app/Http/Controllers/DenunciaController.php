<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDenunciaRequest;
use App\Http\Requests\UpdateDenunciaRequest;
use App\Repositories\DenunciaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use App\Models\Denuncia;
use App\Models\Estado;
use Response;
use Auth;
use Illuminate\Support\Facades\Storage;
class DenunciaController extends AppBaseController
{
    /** @var DenunciaRepository $denunciaRepository*/
    private $denunciaRepository;

    public function __construct(DenunciaRepository $denunciaRepo)
    {
        $this->denunciaRepository = $denunciaRepo;
    }

    /**
     * Display a listing of the Denuncia.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->hasRole('super_admin')) {
        $denuncias= Denuncia::all();  
        return view('denuncias.index',compact('denuncias'));
        }
        $denuncias= Denuncia::where('id_user', auth()->user()->id)->get();  
        return view('denuncias.index')
            ->with('denuncias', $denuncias)->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new Denuncia.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::user()->hasRole('super_admin')) {
        $estado =Estado::pluck('nombre','id');
        return view('denuncias.create',compact('estado'));
         }
          $estado =Estado::where('id',1)->pluck('nombre','id');
        return view('denuncias.create',compact('estado'));
    }

    /**
     * Store a newly created Denuncia in storage.
     *
     * @param CreateDenunciaRequest $request
     *
     * @return Response
     */
    public function store(CreateDenunciaRequest $request)
    {
        $rules = [
        'imagen' => 'required',
      ];
       $mensaje = [
        'required'=>'El :attribute es requerido',
      ];
      $this->validate($request,$rules,$mensaje);
        
        $input = $request->all();
         if($request->hasFile('imagen')){
            $input['imagen']=$request->file('imagen')->store('uploads','public');   
        }

        $denuncia = $this->denunciaRepository->create($input);

        Flash::success('Denuncia saved successfully.');

        return redirect(route('denuncias.index'));
    }

    /**
     * Display the specified Denuncia.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $denuncia = $this->denunciaRepository->find($id);

        if (empty($denuncia)) {
            Flash::error('Denuncia not found');

            return redirect(route('denuncias.index'));
        }

        return view('denuncias.show')->with('denuncia', $denuncia);
    }

    /**
     * Show the form for editing the specified Denuncia.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $denuncia = $this->denunciaRepository->find($id);
        $estado =Estado::pluck('nombre','id');

        if (empty($denuncia)) {
            Flash::error('Denuncia not found');

            return redirect(route('denuncias.index'));
        }

        return view('denuncias.edit',compact('denuncia','estado'));
    }

    /**
     * Update the specified Denuncia in storage.
     *
     * @param int $id
     * @param UpdateDenunciaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDenunciaRequest $request)
    {    
    {
        //Verifica si la foto existe para no volver a cargar
        $rules=[
        'fecha' => 'required',
        'observacion' => 'required',
        'descripcion' => 'required',
        'long' => 'required',
        'lat' => 'required',
        'tipo' => 'required'
        ];
        $mensaje = [
        'required'=>'El :attribute es requerido',
      ];

        if($request->hasFile('imagen')){
            $campo=['imagen'=>'required|mines:jpeg,png,jpg'];
            $mensaje = [
        'required'=>'El :attribute es requerido',
      ];
  }
   $this->validate($request,$rules,$mensaje);

        $dato= request()->except(['_token','_method']);
        if($request->hasFile('imagen')){
            $denuncia=Denuncia::findOrFail($id);
            Storage::delete('public/'.$denuncia->imagen); 
            $dato['imagen']=$request->file('imagen')->store('uploads','public'); 
    }
        Denuncia::where('id','=',$id)->update($dato);  
        $denuncia=Denuncia::findOrFail($id);
        Flash::success('Denuncia actualizada.');

        return redirect(route('denuncias.index'));
    }
}

    /**
     * Remove the specified Denuncia from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $denuncia = $this->denunciaRepository->find($id);

        if (empty($denuncia)) {
            Flash::error('Denuncia not found');

            return redirect(route('denuncias.index'));
        }

        $this->denunciaRepository->delete($id);

        Flash::success('Denuncia deleted successfully.');

        return redirect(route('denuncias.index'));
    }
}
