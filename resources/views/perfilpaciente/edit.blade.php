<!DOCTYPE html>
<html lang="es">

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
                    <a href="{{ route('paciente.index') }}">Inicio</a>
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
            </section>
            <form method="POST" action="{{ route('subirpaciente') }}" class="box_right" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <article class="labels_right">
                    <label for="foto" class="form-label"><b style="color: #115679">Fotografía </b></label>
                    <span class="btn btn-secondary btn-file">
                        <i class="far fa-images"></i> <input accept="image/*" value="{{ auth()->user()->foto }}"
                            onchange="vistaPrevia(event)" type="file" name="foto">
                    </span>
                    @error('foto')
                        <p
                            class="alert alert-danger border border-red-500 rounded-md bg-red-100 w-fulltext-red-600 p-2 my-2">
                            * {{ $message }}</p>
                    @enderror
                </article>


                <article class="labels_right">
                    <label for="contraseña" class="form-label"><b style="color: #115679">Correo electronico</b></label>
                    <input type="email" id="email" name="email" class="machete letra"
                        value="{{ auth()->user()->email }}">
                    @error('email')
                        <p
                            class="alert alert-danger border border-red-500 rounded-md bg-red-100 w-fulltext-red-600 p-2 my-2">
                            * {{ $message }}</p>
                    @enderror
                </article>

                <article class="labels_right">
                    <label for="telefono" class="form-label"><b style="color: #115679">Numero de telefono </b></label>
                    <input type="number" id="telefono" name="telefono" class="machete letra"
                        value="{{ auth()->user()->telefono }}">
                </article>

                <article class="labels_right">
                    <label for="direccion" class="form-label"><b style="color: #115679">Dirección </b></label>
                    <input type="text" id="direccion" name="direccion" class="machete letra"
                        value="{{ auth()->user()->direccion }}">
                </article>

                <article class="buttons">
                    <button type="submit" class="btn btn-info">Aceptar</button>
                </article>
            </form>

        </section>
    </section>


    <footer>
        <x-footer />
    </footer>


</body>

</html>
