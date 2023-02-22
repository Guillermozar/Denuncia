@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Denuncias</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             Denuncias reporte
                
                         </div>
                         <div class="card-body">
                             <div class="table-responsive-sm">
    <table class="table table-striped" id="botones">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Fecha</th>
        <th>Observacion</th>
        <th>Descripcion</th>
        <th>Estado</th>
        <th>Tipo</th>
        <th>Fecha de registro</th>
            </tr>
        </thead>
        <tbody>
        @foreach($denuncia as $denuncia)
            <tr>
                 <td>{{ $denuncia->usuario->name }}</td>
                <td>{{ $denuncia->fecha }}</td>
            <td>{{ $denuncia->observacion }}</td>
            <td>{{ $denuncia->descripcion }}</td>
            <td>{{ $denuncia->estado->nombre }}</td>
            <td> @switch(true)
            @case($denuncia->tipo == 'Urgente')
            <span class="badge badge-danger"> {{ $denuncia->tipo }} </span>
            @break
            @case($denuncia->tipo == 'Prioridad')
            <span class="badge badge-warning"> {{ $denuncia->tipo }} </span>
            @break
            @case($denuncia->tipo == 'Regular' )
            <span class="badge badge-success"> {{ $denuncia->tipo }} </span>
            @break
            @endswitch</li><br></td>
            <td>{{ $denuncia->created_at }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection
