<!-- Fecha Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control','id'=>'fecha']) !!}
</div>
<!-- Observacion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('observacion', 'Observacion:') !!}
    {!! Form::text('observacion', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-12">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Long Field -->
<div class="form-group col-sm-12"style="display: none">
    {!! Form::label('long', 'Long:') !!}
    {!! Form::text('long', null, ['class' => 'form-control']) !!}
</div>

<!-- Lat Field -->
<div class="form-group col-sm-12"style="display: none">
    {!! Form::label('lat', 'Lat:') !!}
    {!! Form::text('lat', null, ['class' => 'form-control']) !!}
</div>

<!-- Imagen Field -->
<div class="form-group col-sm-12">
            <label for="imagen">Selecione un archivo:</label>
             @if(isset($denuncia->imagen))
            <img src="{{ asset('storage').'/'.$denuncia->imagen}}" width="100" height="100" class="img-circle">
            @endif 
            <input type="file" id="imagen" name="imagen">
            
            </div>        
<!-- user Field -->
<div class="form-group col-md-12 pull-left">
<label for="id_user">Usuario:</label>
            <input type="text" name="id_user" class="form-control" value="{{ Auth::user()->id }}" readonly>
        </div>

<!-- Estado Field -->
 @if(Auth::user()->hasRole('super_admin'))
             <div class=" form-group col-sm-12">
                {!! Form::label('id_estado', 'Estado:') !!}
                {!! Form::select('id_estado', $estado, null, ['class' => 'form-control custom-select','placeholder'=>'Selecione una opcion','required']) !!}
</div>
            @else
             <div class="form-group col-sm-12">
               {!! Form::label('id_estado', 'Estado:') !!}
                {!! Form::select('id_estado', $estado, null, ['class' => 'form-control custom-select','required']) !!}
                </div>
            @endif
<!-- Tipo Field -->
<div class=" form-group col-sm-12">
 {!! Form::label('tipo', 'Tipo:') !!}
{!! Form::select('tipo',array('Urgente' => 'Urgente', 'Prioridad' => 'Prioridad','Regular' => 'Regular'),null, ['class' => 'form-control','placeholder'=>'Seleccione','required'])!!}
</div>
<div class="form-group col-sm-12">
<div id="map"></div>
</div>
<style type="text/css">
    #map { height: 360px; }
</style>
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
      <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>

<script type="text/javascript">
     var map = L.map('map').setView([-27.33056,  -55.86667], 13);

          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
              attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(map);
           marker = new L.marker([-27.33056,  -55.86667], {draggable:'true'});
            map.addLayer(marker);
            function onMapClick(e) {
            marker.on('dragend', function(event){
            var marker = event.target;
            var position = marker.getLatLng();
            marker.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
            map.panTo(new L.LatLng(position.lat, position.lng));
            console.log(marker.getLatLng());
            document.getElementById('lat').value = marker.getLatLng().lat;
            document.getElementById('long').value = marker.getLatLng().lng;
          });
          
          map.addLayer(marker);
        };
    
        map.on('mouseover', onMapClick);
</script>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('denuncias.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
