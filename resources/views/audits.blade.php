 @extends('layouts.app')
 @section('content')
 <br>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="fa fa-align-justify"></i>
                             Auditoria
                             <a class="pull-right" href="{{ route('denuncias.create') }}"><i class="fa fa-plus-square fa-lg"></i></a>
                         </div>
                         <div class="card-body">
                               <div class="table-responsive" style="padding:15px;">
    <table class="table" id="Table">
      <thead>
            <tr>
              <th>Model</th>
              <th>Accion</th>
              <th>Usuario</th>
              <th>Tiempo</th>
              <th>Old Values</th>
              <th>New Values</th>
            </tr>
          </thead>
          <tbody id="audits">
            @foreach($audits as $audit)
              <tr>
                <td>{{ $audit->auditable_type }} (id: {{ $audit->auditable_id }})</td>
                <td>{{ $audit->event }}</td>
                <td>{{ $audit->user->name }}</td>
                <td>{{ $audit->created_at }}</td>
                <td>
                  <table class="table">
                    @foreach($audit->old_values as $attribute => $value)
                      <tr>
                        <td><b>{{ $attribute }}</b></td>
                        <td>{{ $value }}</td>
                      </tr>
                    @endforeach
                  </table>
                </td>
                <td>
                  <table class="table">
                    @foreach($audit->new_values as $attribute => $value)
                      <tr>
                        <td><b>{{ $attribute }}</b></td>
                        <td>{{ $value }}</td>
                      </tr>
                    @endforeach
                  </table>
                </td>
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
                

   