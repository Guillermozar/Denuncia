 <li class="nav-item {{ Request::is('home*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home') }}">
     <i class="fa fas-solid fa-gauge-simple-high"></i>
        <span>Mantenimiento</span>
    </a>
</li>
<li class="nav-item {{ Request::is('denuncias*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('denuncias.index') }}">
      <i class="fa fas-regular fa-clipboard"></i>
        <span>Denuncias</span>
    </a>
</li>
@canany(['create_denuncia','edit_denuncia','delete_denuncia'])
<li class="nav-item {{ Request::is('estados*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('estados.index') }}">
        <i class="fa fas-solid fa-list"></i>
        <span>Estados</span>
    </a>
</li>
<li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ url('reporte/denuncias') }}">
       <i class="fa fas-solid fa-list"></i>

        <span>Reportes</span>
    </a>
</li>
<li class="nav-item {{ Request::is('audits*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('audits.index') }}">
          <i class="fa fas-solid fa-table"></i>
        <span>Auditoria</span>
    </a>
</li>
<li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('users.index') }}">
          <i class="fa fas-light fa-user"></i>
        <span>Usuarios</span>
    </a>
</li>
@endcan