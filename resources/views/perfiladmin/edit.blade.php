<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{  secure_asset('css/perfiladmin.css') }}">
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

    <nav class="menu-principal">
        <ul>
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

    <section class="home-section">

        <h1 class="editar">EDITAR PERFIL</h1>
        <article class="caja ">

            <section class="formulario">

                <form method="POST" action="{{ route('subiradmin') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <br>
                    {{--  <div class="imagen">
                        <img class="imgRedonda2" src=" {{  asset('file/'.auth()->user()->foto)}}" alt="">
                    </div>  --}}
                    <article class="labels_right">
                        <label for="foto" class="form-label">Fotografía</label>
                        <span class="btn btn-secondary btn-file">
                            <i class="far fa-images"></i> <input accept="image/*" value="{{ auth()->user()->foto }}"
                                onchange="vistaPrevia(event)" type="file" name="foto">
                            @error('foto')
                                <p
                                    class="alert alert-danger border border-red-500 rounded-md bg-red-100 w-fulltext-red-600 p-2 my-2">
                                    * {{ $message }}</p>
                            @enderror
                        </span>
                    </article>
                    <hr>
                    <br>
                    <br>

                    <div class="row mb-5 justify-content-evenly">
                        <div class="col-5 ">
                            <div class="form-outline">
                                <label class="form-label" style="color: #10A9FF;"> <b>Correo Electronico</b> </label>
                                <input class="form-control" type="email" value="{{ auth()->user()->email }}"
                                    name="email" />
                                @error('email')
                                    <p
                                        class="alert alert-danger border border-red-500 rounded-md bg-red-100 w-fulltext-red-600 p-2 my-2">
                                        * {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        {{--  <div class="col-5">
                            <div class="form-outline">
                                <label class="form-label" style="color: #10A9FF;"><b>Sexo</b></label>
                                <input class="form-control" type="text" value="{{ auth()->user()->sexo }}"
                                name="email" />
                            </div>
                        </div> --}}

                        <div class="row mb-5 justify-content-evenly">
                            {{-- <div class="col-5">
                                <div class="form-outline">
                                    <label class="form-label" style="color: #10A9FF;"> <b>Nombres y
                                            apellidos</b></label>
                                    <input type="text" class="form-control"
                                        value="{{ auth()->user()->nombres_y_apellidos }}" name="nombres_y_apellidos" />

                                </div>
                            </div> --}}
                            {{-- <div class="col-5">
                                <div class="form-outline">
                                    <label class="form-label" for="Cedula" style="color: #10A9FF;">
                                        <b>Cedula</b></label>
                                    <input type="number" id="Cedula" class="form-control" name="cedula"
                                        value="{{ auth()->user()->cedula }}" />
                                </div>
                            </div> --}}
                            {{--  <div class="row mb-5 col-5">
                                <div class="form-outline">
                                    <label class="form-label" for="password" style="color: #10A9FF;">
                                        <b>Contraseña</b></label>
                                    <input type="password" id="password" class="form-control" name="password"
                                        value="{{}}" />
                                </div>
                            </div> --}}

                            <article>
                                <button type="submit" class="btn botonnn"
                                    style="background-color: #10A9FF;  color: white; ">Actualizar</button>
                            </article>

                        </div>
                </form>
            </section>
        </article>
    </section>
</head>

</html>
