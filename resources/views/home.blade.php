@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
<link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

  <div class="container-fluid">
        <div class="animated fadeIn"> 
                    <div class="row">
<div class="grey-bg container-fluid">
  <section id="minimal-statistics">
    <div class="row">
      <div class="col-12 mt-3 mb-1">
        <h4 class="text-uppercase">Dashboard</h4>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-sm-6 col-12"> 
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                   <i class="fa fas-regular fa-clipboard primary font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>Denuncias</h3>
                  <span>
                  <a href="{{ route('denuncias.index') }}" class="small-box-footer">Ir a <i class="fa fas-solid fa-arrow-right"></i></a></span>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @canany(['create_denuncia','edit_denuncia','delete_denuncia'])
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-speech warning font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>Estado</h3>
                  <span> <a href="{{ route('estados.index') }}" class="small-box-footer">Ir a <i class="fa fas-solid fa-arrow-right"></i></a></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="icon-graph success font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>Reporte</h3>
                  <span> <a href="{{ url('reporte/denuncias') }}" class="small-box-footer">Ir a <i class="fa fas-solid fa-arrow-right"></i></a></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                  <i class="fa fas-solid fa-table danger font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>Auditoria</h3>
                  <span> <a href="{{ route('audits.index') }}" class="small-box-footer">Ir a <i class="fa fas-solid fa-arrow-right"></i></a></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="align-self-center">
                      <i class="fa fas-light fa-user warning font-large-2 float-left"></i>
                </div>
                <div class="media-body text-right">
                  <h3>Usuario</h3>
                  <span> <a href="{{ route('users.index') }}" class="small-box-footer">Ir a <i class="fa fas-solid fa-arrow-right"></i></a></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endcan
  </section>
</div>
            </div>
        </div>
    </div>
</div>
@endsection
