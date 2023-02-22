<div class="table-responsive-sm">
    <table class="table table-striped" id="Tabla">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Fecha</th>
        <th>Observacion</th>
        <th>Descripcion</th>
        <th>Imagen</th>
        <th>Estado</th>
        <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                 <td>{{ $denuncia->usuario->name }}</td>
                <td>{{ $denuncia->fecha }}</td>
            <td>{{ $denuncia->observacion }}</td>
            <td>{{ $denuncia->descripcion }}</td>
            <td><img src="{{ asset('storage').'/'.$denuncia->imagen}}" width="50" height="50"></td>
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
            </tr>
        </tbody>
    </table>
</div>
<table class="table table-bordered" id="data-table">
              <tr>
                <th> <strong>Ubicacion de denuncia.</strong></th>
              </tr>
                   
                   <tr>
                    <th>
                     <div id="map"></div>
                     </th>
                   </tr> 
                   
                </div>
              </table>
            </div>
           
</div>
         </div>
    </li>
    </ul>
    <style type="text/css">
                   #map { height: 350px; width:1550px; }
           </style>
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"/>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css" type="text/css">
            <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
          <script>
            var map = L.map('map').setView([{{$denuncia->lat}} , {{$denuncia->long}}], 15);
           L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
              attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(map);
            marker = new L.marker([{{$denuncia->lat}} , {{$denuncia->long}}]);
            marker.bindPopup("Denuncia:{{$denuncia->descripcion}}</br>");
            map.addLayer(marker);
            marker.openPopup();
            
     </script>
