<div class="table-responsive-sm">
    <table class="table table-striped" id="Tabla">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Descripcion</th>
                <th>Creado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $estado->nombre }}</td>
            <td>{{ $estado->descripcion }}</td>
            <td>{{ $estado->created_at }}</td>
            </tr>
        </tbody>
    </table>
</div>