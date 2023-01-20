<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Administrador - Crear Especialidades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/perfiladmin.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


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
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sidebars/">
    <link rel="stylesheet" href="{{ asset('css/adminmedicopaciente.css') }}">
</head>
<nav class="menu-principal">
    <ul>
        @if (auth()->check())
            {{-- <li class="mx-8">
                <p class="text-xl">Welcome <b>{{ auth()->user()->nombres_y_apellidos }}</b></p>
            </li> --}}
            <li class="menuu">
                <p class="navv d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src=" {{ asset('file/' . auth()->user()->foto) }}" alt="" width="45" height="45"
                        class="rounded-circle me-2">
                    <b>{{ auth()->user()->nombres_y_apellidos }}</b>
                </p>
                <div class="dropdown-menu dropdown-menu-dark text-small shadow" style="background-color: #115679">
                    <a style="color: white" class="dropdown-item" href="{{ 'http://127.0.0.1:8000/admin' }}">Inicio</a>
                    <a style="color: white" class="dropdown-item" href="{{ 'perfiladmin/create' }}">Ver Perfil</a>
                    <a style="color: white" class="dropdown-item" href="{{ route('login.destroy') }}">Cerrar
                        Sesion</a>

                </div>
            </li>
    </ul>
    </li>
@else
    <li class="mx-6">
        <a href="{{ route('login.index') }}" class="font-semibold
    hover:bg-indigo-700 py-3 px-4 rounded-md">Iniciar
            Sesion</a>
    </li>
    <li>
        <a href="{{ route('register') }}"
            class="font-semibold
    border-2 border-white py-2 px-4 rounded-md hover:bg-white
    hover:text-indigo-700">Registrate</a>
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

<body>
    <div class="sidebar">
        <div class="logo-details">
            <div class="logo_name">Dochome</div>
            <i class='bx bx-menu' id="btn"></i>
            <br>

        </div>
        <li class="perfil">
            <img width="45" height="45" class="rounded-circle me-2"
                src=" {{ asset('file/' . auth()->user()->foto) }}" alt="">

        </li>
        <hr>
        <ul class="nav-list">
            <li>
                <a href=" {{ route('perfiladmin.index') }}">
                    <i class='bx bxs-user-circle'></i>
                    <span class="links_name">Administradores</span>
                </a>
                <span class="tooltip"></span>
            </li>
            <li>
                <a href=" {{ url('/medicos') }} ">
                    <i class='bx bx-pulse '></i>
                    <span class="links_name">Medicos</span>

                </a>
                <span class="tooltip"></span>
            </li>

            <li>
                <a href=" {{ url('/pacientes') }}">
                    <i class='bx bx-group'></i>
                    <span class="links_name">Pacientes</span>
                </a>
                <span class="tooltip"></span>
            </li>
            <li>
                <a href="{{ url('/especialidades') }}">
                    <i class='bx bx-heart' style='color:#ffffff'></i>
                    <span class="links_name">Especialidades</span>
                </a>
                <span class="tooltip"></span>
            </li>
        </ul>
    </div>
    <section class="home-section">



        <article class="caja ">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <i class='bx bxs-error' style='color:#ad1919'></i>
                        <strong>Por favor!!</strong> {{ $error }}
                    </div>
                @endforeach

            @endif
            <section class="nombree">
                <h1>Nueva Especialidad</h1>
            </section>
            <section class="cajita2">

                <div class="crearespeci">
                    <a href="{{ url('/especialidades') }}" class="btn btn-sm btn-success">
                        <i class='bx bxs-left-arrow-alt'></i> Regresar</a>
                </div>
                <div class="nuevaespeci">
                <form class="formespeci" action="{{ url('/especialidades') }}" method="post">
                    @csrf
                    <br>
                    <div class="form-group row mb-4 especialidad">

                        <label class="form-label" style="color: #10A9FF;" for="name"> <b class="danee">Nombre de la
                                Especialidad</b>
                        </label>

                        <input class="danee form-control" name="name" type="text" value="{{old('name')}}" required />

                    </div>

                    <div class="col">
                        <button type="submit" class="btn1 btn btn-sm"
                            style="background-color: #10A9FF;  color: white; ">Crear Especialidad</button>
                    </div>

                </form>
            </div>
            </section>

        </article>
    </section>
    <br>
    <footer>
        <x-footer />
    </footer>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange(); //calling the function(optional)
        });

        // following are the code to change sidebar button(optional)
        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
            }
        }
    </script>
</body>

</html>
