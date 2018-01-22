<ul class="navbar-nav mr-auto">
    @section('menu-items')
        <li class="nav-item active">
            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/saludo/johan') }}">Saluda a Johan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/saludo/johan/johanquiroga') }}">Saluda a 'johanquiroga'</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/usuarios') }}">Usuarios</a>
        </li>
    @show
</ul>