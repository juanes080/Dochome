<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{  secure_asset('css/perfilpaciente.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <header class="centrar">
        <br>
        <nav class="menu-principal">
            <ul>
                <li class="navs">
                    <a href="{{  secure_route('paciente.index') }}">Inicio</a>
                </li>

                <li class="navs"><a href="{{ route('perfilpaciente.create') }}">Perfil</a></li>

                <li class="navs"><a href=" {{ url('reservarcitas/create') }} ">Reservar Cita Medica</a></li>
                <li class="navs"><a href=" {{ url('miscitas') }} ">Mis Citas Medicas</a></li>

                <li class="navs"><a href="{{ route('login.destroy') }}">Cerrar sesion</a></li>

            </ul>
        </nav>
    </header>

    <section class="fondo">
        <section class="body_major">
            <section class="box_left">
                <article class="box_top">

                    <article class="img_doctor">
                        <div class="">
                            <img class="imgRedonda2" src=" {{ asset('file/' . auth()->user()->foto) }}">
                        </div>
                    </article>

                    <article class="name_doctor">
                        <b>
                            {{ auth()->user()->nombres_y_apellidos }}
                        </b>
                    </article>

                    <div>
                        <a href="{{ route('perfil.perfilpaciente') }}" type="submit" class="botonnn btn"
                            style="background-color: #10A9FF;  color: white; ">Editar Perfil</a>

                    </div>
                </article>

            </section>
            <section class="box_right">
                <!-- <p>h</p> -->
                <article class="labels_right">
                    <label for="contraseña" class="form-label"><b style="color: #115679">Correo electronico</b> </label>
                    <b class="machete letra">{{ auth()->user()->email }}</b>
                </article>

                <article class="labels_right">
                    <label for="contraseña" class="form-label"><b style="color: #115679">Sexo</b></label>
                    <b class="machete letra">{{ auth()->user()->sexo }}</b>
                </article>

                <article class="labels_right">
                    <label for="especialidad" class="form-label"><b style="color: #115679">Cedula de ciudadania</b>
                    </label>
                    <b class="machete letra">{{ auth()->user()->cedula }}</b>
                </article>

                <article class="labels_right">
                    <label for="contraseña" class="form-label"><b style="color: #115679">Fecha de expedición</b>
                    </label>
                    <b class="machete letra">{{ auth()->user()->fecha_de_expedicion }}</b>
                </article>

                <article class="labels_right">
                    <label for="contraseña" class="form-label"><b style="color: #115679">Número de telefono</b> </label>
                    <b class="machete letra">{{ auth()->user()->telefono }}</b>
                </article>
                <article class="labels_right">
                    <label for="contraseña" class="form-label"><b style="color: #115679">Dirección</b> </label>
                    <b class="machete letra">{{ auth()->user()->direccion }}</b>
                </article>
            </section>

        </section>
    </section>

    <footer>
        <x-footer />
    </footer>

</body>

</html>
