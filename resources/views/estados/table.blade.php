<div class="table-responsive-sm">
    <table class="table table-striped" id="Table">
        <thead>
            <tr>
                <th>Nombre</th>
        <th>Descripcion</th>
                <th>Accion</th>
            </tr>
        </thead>
        <tbody>
        @foreach($estados as $estado)
            <tr>
                <td>{{ $estado->nombre }}</td>
            <td>{{ $estado->descripcion }}</td>
                <td>
                    {!! Form::open(['route' => ['estados.destroy', $estado->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('estados.show', [$estado->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('estados.edit', [$estado->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>