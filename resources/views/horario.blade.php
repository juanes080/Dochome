<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/horario.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/paginap.css') }}">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <title>Horario</title>
</head>

<body>

    <script src="{{ asset('js/plugins/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <!--   Optional JS   -->
    <!--   Argon JS   -->
    <script src="{{ asset('js/argon-dashboard.min.js?v=1.1.2') }}"></script>
    <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
    <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "argon-dashboard-free"
            });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <section class="centrar">
        <br>
        <nav class="menu-principal">
            <ul>
                <li class="navs">
                    <a href="{{ route('medico.index') }}" style=" color: white">Inicio</a>
                </li>

                <li class="navs"><a href="{{ '/horario' }}">Ver Agenda</a></li>
                <li class="navs"><a href=" {{ url('/miscitas') }} ">Mis Citas Medicas</a></li>

                <li class="menuu">
                    <p class="navv d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src=" {{ asset('file/' . auth()->user()->foto) }}" alt="" width="45"
                            height="45" class="rounded-circle me-2">
                        <b>Medico. {{ auth()->user()->nombres_y_apellidos }}</b>
                    </p>
                    <div class="dropdown-menu dropdown-menu-dark text-small shadow" style="background-color: #115679">
                        <a style="color: white" class="dropdown-item" href="{{ route('perfilmedico.create') }}">Ver
                            Perfil</a>
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
    </section>
    <form action="{{ url('/horario') }}" method="POST">
        @csrf
        <section class="contenedor">

            <section class="letra">
                <h1>Selecciona el horario en el que deseas trabajar</h1>

            </section>

            <div class="alerta card-body">
                @if (session('notification'))
                    <div class="alert alert-success" role="alert">
                        {{ session('notification') }}
                    </div>
                @endif

                @if (session('errors'))
                    <div class="alert alert-danger" role="alert">
                        Los cambios se han guardado, pero se encontraron las siguientes novedades:
                        <br>
                        <ul>
                            @foreach (session('errors') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif
            </div>
            <br>
            <section class="tarjetas">
                <table class="table aling-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Día</th>
                            <th scope="col">Activo</th>
                            <th scope="col">Turno Mañana</th>
                            <th scope="col">Turno Tarde</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($horarios as $key => $horario)
                            <tr>
                                <th>{{ $days[$key] }}</th>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="active[]"
                                            value="{{ $key }}" role="switch" id="flexSwitchCheckChecked"
                                            @if ($horario->active) checked @endif>
                                        <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-select form-control" name="morning_start[]">
                                                @for ($i = 8; $i <= 11; $i++)
                                                    <option value="{{ ($i < 10 ? '0' : '') . $i }}:00"
                                                        @if ($i . ':00 AM' == $horario->morning_start) selected @endif>
                                                        {{ $i }}:00 AM</option>
                                                    <option value="{{ ($i < 10 ? '0' : '') . $i }}:30"
                                                        @if ($i . ':30 AM' == $horario->morning_start) selected @endif>
                                                        {{ $i }}:30 AM</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div class="col">
                                            <select class="form-select form-control" name="morning_end[]">
                                                @for ($i = 8; $i <= 11; $i++)
                                                    <option value="{{ ($i < 10 ? '0' : '') . $i }}:00"
                                                        @if ($i . ':00 AM' == $horario->morning_end) selected @endif>
                                                        {{ $i }}:00 AM</option>
                                                    <option value="{{ ($i < 10 ? '0' : '') . $i }}:30"
                                                        @if ($i . ':30 AM' == $horario->morning_end) selected @endif>
                                                        {{ $i }}:30 AM</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-select form-control " name="afternoon_start[]">
                                                @for ($i = 2; $i <= 11; $i++)
                                                    <option value="{{ $i + 12 }}:00"
                                                        @if ($i . ':00 PM' == $horario->afternoon_start) selected @endif>
                                                        {{ $i }}:00 PM</option>
                                                    <option value="{{ $i + 12 }}:30"
                                                        @if ($i . ':30 PM' == $horario->afternoon_start) selected @endif>
                                                        {{ $i }}:30 PM</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div class="col">
                                            <select class="form-select form-control " name="afternoon_end[]">
                                                @for ($i = 2; $i <= 11; $i++)
                                                    <option value="{{ $i + 12 }}:00"
                                                        @if ($i . ':00 PM' == $horario->afternoon_end) selected @endif>
                                                        {{ $i }}:00 PM</option>
                                                    <option value="{{ $i + 12 }}:30"
                                                        @if ($i . ':30 PM' == $horario->afternoon_end) selected @endif>
                                                        {{ $i }}:30 PM</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </section>
            <section class="buttons">
                <button type="submit" class="btn btn-success ">Guardar Cambios </button>
            </section>
        </section>
    </form>
    <br>
    <footer>
        <x-footer />
    </footer>
</body>

</html>
