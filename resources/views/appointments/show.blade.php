<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis citas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/citascancelada.css') }}">
    <link rel="stylesheet" href="{{ asset('css/perfilpaciente.css') }}">
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

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sidebars/">
    <link href="{{ asset('css/argon-dashboard.css?v=1.1.2') }}" />
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
    <header class="centrar">
        <br>
        <nav class="menu-principal">
            <ul>
                @if (auth()->user()->role == 'paciente')
                    <li class="navs">
                        <a href="{{ route('paciente.index') }}">Inicio</a>
                    </li>

                    <li class="navs"><a href="{{ route('perfilpaciente.create') }}">Perfil</a></li>

                    <li class="navs"><a href=" {{ url('reservarcitas/create') }} ">Reservar Cita Medica</a></li>
                    <li class="navs"><a href=" {{ url('miscitas') }} ">Mis Citas Medicas</a></li>

                    <li class="navs"><a href="{{ route('login.destroy') }}">Cerrar sesion</a></li>
                @elseif (auth()->user()->role == 'doctor')
                    <li class="navs">
                        <a href="{{ route('medico.index') }}">Inicio</a>
                    </li>

                    <li class="navs"><a href="{{ route('perfilmedico.create') }}">Perfil</a></li>
                    <li class="navs"><a href="{{ url('/horario') }}">Ver Agenda</a></li>

                    <li class="navs"><a href=" {{ url('/miscitas') }} ">Mis Citas Medicas</a></li>

                    <li class="navs"><a href="{{ route('login.destroy') }}">Cerrar sesion</a></li>
                @else
                    <li class="navs"><a href="{{ route('login.destroy') }}">Cerrar sesion</a></li>
                @endif
            </ul>
        </nav>
    </header>

    <br>
    <section class="home-section">

        <section class="cancell">
            <div class="col text-right">
                <a href="{{ url('/miscitas') }}" class="btn btn-sm btn-success">
                    <i class='bx bxs-left-arrow-alt'></i> Regresar</a>
            </div>

            <div class="alerta card-body">
                <ul>
                    <dd>
                        <strong>Fecha:</strong> {{ $appointment->scheduled_date }}
                    </dd>
                    <dd>
                        <strong>Hora de atención:</strong> {{ $appointment->scheduled_time_12 }}
                    </dd>
                    @if ($role == 'paciente')
                        <dd>
                            <strong>Doctor:</strong> {{ $appointment->doctor->nombres_y_apellidos }}
                        </dd>
                    @elseif ($role == 'doctor')
                        <dd>
                            <strong>Paciente:</strong> {{ $appointment->patient->nombres_y_apellidos }}
                        </dd>
                    @endif
                    <dd>
                        <strong>Especialidad:</strong> {{ $appointment->specialty->name }}
                    </dd>
                    <dd>
                        <strong>Tipo de Consulta:</strong> {{ $appointment->type }}
                    </dd>
                    <dd>
                        <strong>Estado:</strong>
                        @if ($appointment->status == 'Cancelada')
                            <span class="badge badge-danger">Cancelada</span>
                        @else
                            <span class="badge badge-primary">{{ $appointment->status }}</span>
                        @endif
                    </dd>
                    <dd>
                        <strong>Síntomas:</strong> {{ $appointment->description }}
                    </dd>
                </ul>

                @if ($appointment->status == 'Cancelada')
                    <div class="alert bg-ligth text-primary" style="background-color: rgba(189, 189, 189, 0.519)">
                        <b style="color: black">Detalles de la cancelación</b>
                        @if ($appointment->cancellation)
                            <ul>
                                <li>
                                    <strong>Fecha de Cancelación:</strong>
                                    {{ $appointment->cancellation->created_at }}
                                </li>
                                <li>
                                    <strong>La cita fue cancelada por:</strong>
                                    {{ $appointment->cancellation->cancelled_by->nombres_y_apellidos }}
                                </li>
                                <li>
                                    <strong>Motivo de la Cancelación:</strong>
                                    {{ $appointment->cancellation->justification }}
                                </li>
                            </ul>
                        @else
                            <ul>
                                <li>
                                    <strong>La cita fue cancelada antes de su confirmación.</strong>
                                </li>
                            </ul>
                        @endif

                    </div>
                @endif
            </div>
        </section>
        <br>
    </section>
    <br><br>
    <br>
    <footer>
        <x-footer />
    </footer>
</body>

</html>
