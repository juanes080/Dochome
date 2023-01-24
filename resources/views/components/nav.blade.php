<link rel="stylesheet" href="{{  secure_asset('css/paginap.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="{{  secure_asset('css/nav1.css') }}">
<link rel="stylesheet" href="{{  secure_asset('css/footer.css') }}">

<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sidebars/">

<nav class="menu-principal">
    <ul >
        <li><a href="{{ url('http://127.0.0.1:8000') }}">Inicio</a></li>
        @if (auth()->check())
           {{--  <li class="mx-8">
                <p class="text-xl">Welcome <b>{{ auth()->user()->nombres_y_apellidos }}</b></p>
            </li> --}}
            <li class="menuu">
                <p class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="img/usuario.png" alt="" width="45" height="45"
                        class="rounded-circle me-2">
                    <b>{{ auth()->user()->nombres_y_apellidos }}</b>
                </p>
                <div class="dropdown-menu dropdown-menu-dark text-small shadow" style="background-color: #115679">
                    <a style="color: white" class="dropdown-item" href="#">Ver Perfil</a>
                    <a style="color: white" class="dropdown-item" href="#"> Editar Perfil</a>
                    <a  style="color: white" class="dropdown-item" href="{{ route('login.destroy') }}" >Cerrar Sesion</a>

                </div>
            </li>
    </ul>
    </li>
@else
<li>
    <a href="{{ route('nosotros.index') }}"
        class="font-semibold
    border-2 border-white py-2 px-4 rounded-md hover:bg-white
    hover:text-indigo-700">Nosotros</a>
</li>
    <li class="mx-6">
        <a href="{{ route('login.index') }}"
            class="font-semibold
        hover:bg-indigo-700 py-3 px-4 rounded-md">Iniciar Sesion</a>
    </li>

    <li>
        <a href="{{ url('/pacientes/create') }}"
            class="font-semibold
        border-2 border-white py-2 px-4 rounded-md hover:bg-white
        hover:text-indigo-700">Registrate</a>
    </li>

     <li>
        <a href="{{ url('/medicos/create') }}"
            class="font-semibold
        border-2 border-white py-2 px-4 rounded-md hover:bg-white
        hover:text-indigo-700">¿Eres medico?, ven y trabaja con nosotros </a>
    </li>

    @endif
    </ul>

</nav>

<script>
    (() => {
        'use strict'
        const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.forEach(tooltipTriggerEl => {
            new bootstrap.Tooltip(tooltipTriggerEl)
        })
    })()
</script>
