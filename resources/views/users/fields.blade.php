<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-12">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
<!-- Role Field -->
<div class="form-group col-sm-12">
    {!! Form::label('role', 'Role:') !!}
    {!! Form::select('role', $roleItems, isset($user) ? $user->roles()->pluck('id'):[], ['class' => 'form-control','placeholder'=>'Seleccione'])
    !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-3">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
</div>
