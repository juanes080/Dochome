<link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

<header class="opciones">

    <!-- <nav> -->
    <ul class="menu">
        <li><a href="{{ url('perfilmedico') }}">Perfil</a></li>
        <li><a href="{{ route('agenda') }}">Agenda</a></li>
        <li><a href="{{ route('historialmedico') }}">Historial Citas</a></li>
        <!-- <li><a href="">Cerrar sesion</a></li> -->
    </ul>
    <ul class="Cerrar_sesion">
        <li><a href="{{ url('http://127.0.0.1:8000') }}">Cerrar sesion</a></li>
    </ul>

    <!-- </nav>         -->
    <!-- <p>Agenda</p>
    <p>Historial Citas</p>
    <p>Cerrar Cesion</p> -->
</header>
