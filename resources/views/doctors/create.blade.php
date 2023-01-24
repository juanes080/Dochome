<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{  secure_asset('css/registropaciente.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>


    <title>Registrarse</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

    <section class="fondo1" style="width: 100%; height: 70%;">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-9 col-xl-10">
                    <div class="tarjeta card " style="border-radius: 1rem;">
                        <div class="card-body p-5 ">


                            <h5>Crear cuenta</h5>
                            <div class="d-flex justify-content-stretch mb-4">
                                <p>¿Ya tienes creada una cuenta?</p>
                                <a style="color: #115679;" href="{{ 'login' }}"> Iniciar sesion</a>
                            </div>

                            <form class="mt-4" role="form" action=" {{ url('/medicos') }} "
                                enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label">Nombres y apellidos</label>
                                            <input type="text" class="form-control" id="nombres_y_apellidos"
                                                name="nombres_y_apellidos" />
                                            @error('nombres_y_apellidos')
                                                <p
                                                    class=" alert alert-danger border border-red-500 rounded-md bg-red-100 w-fulltext-red-600 p-2 my-2">
                                                    * {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label">Sexo</label>
                                            <select class="form-select form-control" id=""
                                                aria-label="Default select example" name="sexo">
                                                <option selected="true" disabled="disabled">Seleccionar</option>
                                                <option value="Femenino">Femenino</option>
                                                <option value="Masculino">Masculino</option>
                                                @error('sexo')
                                                    <p
                                                        class="alert alert-danger border border-red-500 rounded-md bg-red-100 w-fulltext-red-600 p-2 my-2">
                                                        * {{ $message }}</p>
                                                @enderror
                                            </select>
                                        </div>
                                    </div>


                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label">Cedula de ciudadania</label>
                                            <input type="number" id="cedula" class="form-control" name="cedula" />
                                            @error('cedula')
                                                <p
                                                    class="alert alert-danger border border-red-500 rounded-md bg-red-100 w-fulltext-red-600 p-2 my-2">
                                                    * {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label">Fecha de expedición</label>
                                            <input type="date" class="form-control" id="fecha_de_expedicion"
                                                name="fecha_de_expedicion" />
                                            @error('fecha_de_expedicion')
                                                <p
                                                    class="alert alert-danger border border-red-500 rounded-md bg-red-100 w-fulltext-red-600 p-2 my-2">
                                                    * {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label">Dirección</label>
                                            <input type="text" id="direccion" class="form-control"
                                                name="direccion" />
                                            @error('direccion')
                                                <p
                                                    class=" alert alert-danger border border-red-500 rounded-md bg-red-100 w-fulltext-red-600 p-2 my-2">
                                                    * {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label">Correo electronico</label>
                                            <input type="email" id="email" name="email" class="form-control" />
                                            @error('email')
                                                <p
                                                    class="alert alert-danger border border-red-500 rounded-md bg-red-100 w-fulltext-red-600 p-2 my-2">
                                                    * {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label">Contraseña</label>
                                            <input type="password" class="form-control" id="password"
                                                name="password" />
                                            @error('password')
                                                <p
                                                    class="alert alert-danger border border-red-500 rounded-md bg-red-100 w-fulltext-red-600 p-2 my-2">
                                                    * {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col ">
                                        <div class="form-outline">
                                            <label class="form-label">Confirmar Contraseña</label>
                                            <input type="password" id="password_confirmation"
                                                name="password_confirmation" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">

                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label">Numero de telefono</label>
                                            <input type="number" class="form-control" id="telefono"
                                                name="telefono" />
                                            @error('telefono')
                                                <p
                                                    class="alert alert-danger border border-red-500 rounded-md bg-red-100 w-fulltext-red-600 p-2 my-2">
                                                    * {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label" for="especialties">Especialidad</label>
                                            {{-- <select class="form-control " multiple id="specialties"
                                                  aria-label="Default select example"  name="specialties[]" required>
                                                <option selected="true" disabled="disabled">- Seleccionar Especialidad
                                                </option>
                                                @foreach ($specialties as $especialidad)
                                                    <option value="{{ $especialidad->id }}">{{ $especialidad->name }}
                                                    </option>
                                                @endforeach --}}
                                            <select class="form-control selectpicker" data-style="btn-primary"
                                                title="-Seleccionar especialidades" id="specialties" multiple
                                                name="specialties[]" required>
                                                @foreach ($specialties as $especialidad)
                                                    <option value="{{ $especialidad->id }}">{{ $especialidad->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            {{--  </select> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-outline">
                                            <label class="form-label">Fotografía</label>
                                            <input accept="image/*" onchange="vistaPrevia(event)" type="file"
                                                name="foto" class="form-control" />
                                            @error('foto')
                                                <p
                                                    class="alert alert-danger border border-red-500 rounded-md bg-red-100 w-fulltext-red-600 p-2 my-2">
                                                    * {{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <script type="text/javascript">
                            function mostrar() {
                                document.getElementById('formulario_m').style.display = 'block';
                            }

                            function ocultar() {
                                document.getElementById('formulario_m').style.display = 'none';
                            }
                        </script>
                        <div
                            class="col-12 col-md-12 col-lg-12 col-xl-12 d-flex align-items-center justify-content-evenly pb-4">
                            <button type="submit" class="btn"
                                style="background-color: #10A9FF; color: white;">Registrar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <br>


        </div>
        </div>
    </section>
    <footer>
        <x-footer />
    </footer>
</body>

</html>
