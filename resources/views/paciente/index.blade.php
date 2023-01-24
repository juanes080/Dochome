<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocHome - Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
    <link rel="stylesheet" href="{{  secure_asset('css/nav.css') }}">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sidebars/">
</head>

<body>

    <header>
        <section class="centrar">
            <br>
            <nav class="menu-principal">
                <ul>
                    {{-- <li class="navs"><a href="{{ route('listaespecialidad.index') }}">Medicos</a></li> --}}
                    <li class="navs"><a href=" {{ url('reservarcitas/create') }} ">Reservar Cita Medica</a></li>
                    <li class="navs"><a href=" {{ url('miscitas') }} ">Mis Citas Medicas</a></li>
                    @if (auth()->check())
                        {{--  <li class="mx-8">
                        <p class="text-xl">Welcome <b>{{ auth()->user()->nombres_y_apellidos }}</b></p>
                    </li> --}}
                        <li class="menuu">
                            <p class="navv d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img src=" {{ asset('file/' . auth()->user()->foto) }}" width="45" height="45"
                                    class="rounded-circle me-2">
                                <b>Paciente. {{ auth()->user()->nombres_y_apellidos }}</b>
                            </p>
                            <div class="dropdown-menu dropdown-menu-dark text-small shadow"
                                style="background-color: #115679">
                                <a style="color: white" class="dropdown-item" href="{{ 'perfilpaciente/create' }}">Ver
                                    Perfil</a>

                                <a style="color: white" class="dropdown-item" href="{{ route('login.destroy') }}">Cerrar
                                    Sesion</a>

                            </div>
                        </li>
                </ul>
                </li>
            @else
                <li class="mx-6">
                    <a href="{{ route('login.index') }}"
                        class="font-semibold
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


        </section>

        <section class="centrar">
            <article class="encabezado">
                <h4 class="subtitulo"></h4>

                <h1 class="titulo-principal">Proyecto DocHome</h1>
                <hr>
                <p class="descripcion">
                    Es un sitio web en el que las personas podran adquirir un servicio medico a domicilio el cual tendra
                    un costo que se pactara antes de aceptar la cita.
                </p>
                <br>
            </article>


        </section>
    </header>
    <br>
    <br>



    <section class=" elegir ">
        <article class="  centrar">

            <article class="derecha ">
                <h4 class="-naranja"></h4><br>
                <article class="">
                    <h1 class="texto">¿Por qué elegirnos?</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque laborum earum quos quam,
                        perferendis suscipit. Commodi maiores dolorem necessitatibus illum ratione reiciendis corporis
                        at, similique minus eligendi, nesciunt impedit et.</p>

                    <br>
                    <section id="container" class="opciones">
                        <article class="opcion">
                            <img src="img/seguro-de-vida.png" class="img-opciones" alt="">
                            <h4 class="texto-opciones">Te brindamos seguridad</h4>
                        </article>

                        <article class="opcion">
                            <img src="img/atencion.webp" class="img-opciones" alt="">
                            <h4 class="texto-opciones">Atención</h4>
                        </article>

                        <article class="opcion">
                            <img src="img/apreton-de-manos.png" class="img-opciones" alt="">
                            <h4 class="texto-opciones">Comprometidos</h4>
                        </article>

                        <article class="opcion">
                            <img src="img/comercio-justo.png" class="img-opciones" alt="">
                            <h4 class="texto-opciones">Responsables</h4>
                        </article>
                    </section>
                </article>
            </article>
    </section>


    <section class="servicios ">
        <br>
        <article class="centrarr ">
            <h1>Nuestros servicios</h1>
        </article>
        <br>
        <section id="container" class="contenedores">

            <section class="contenidos">
                <img src="img/pago-en-efectivo1.png" class="img-servicios" alt="">
                <h4 class="titulo-servicios">Metodos de pago</h4>
                <p class="parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio atque quae
                    quos
                    voluptas, minus accusamus veritatis numquam ea error sequi modi? Autem nostrum libero.</p>
            </section>

            <section class="contenidos">
                <img src="img/certificado-medico (1).png" class="img-servicios" alt="">
                <h4 class="titulo-servicios">Doctores verificados y certificados</h4>
                <p class="parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio atque quae
                    quos
                    voluptas, minus accusamus veritatis numquam ea error sequi modi? Autem nostrum libero.</p>
            </section>

            <section class="contenidos">
                <img src="img/verificado.png" class="img-servicios" alt="">
                <h4 class="titulo-servicios">Seguridad</h4>
                <p class="parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio atque quae
                    quos
                    voluptas, minus accusamus veritatis.</p>
            </section>

            <section class="contenidos">
                <img src="img/transformar.png" class="img-servicios" alt="">
                <h4 class="titulo-servicios">Variedad de doctores</h4>
                <p class="parrafo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio atque quae
                    quos
                    voluptas, minus accusamus veritatis.</p>
            </section>
        </section>
    </section>
    <footer>
        <x-footer />
    </footer>

</body>


</html>



{{-- @endsection --}}
