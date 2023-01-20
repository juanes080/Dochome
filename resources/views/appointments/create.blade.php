 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> --}}
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <link rel="stylesheet"
         href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
     <link rel="stylesheet" href="{{ asset('css/registrocita.css') }}">
     {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
         integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
     </script> --}}
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
     </script>
     <link href="{{ asset('css/argon-dashboard.css?v=1.1.2') }}" />

     <title>Reservar Cita Medica</title>
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

     <section class="fondo1" style="width: 100%; height: 70%;">
         <div class="container py-5">
             <div class="row d-flex justify-content-center align-items-center">
                 <div class="col-12 col-md-8 col-lg-9 col-xl-10">
                     <div class="tarjeta card " style="border-radius: 1rem;">
                         <div class="card-body p-5 ">
                             <form class="mt-4" enctype="multipart/form-data" method="POST"
                                 action="{{ url('/reservarcitas') }}">
                                 @csrf
                                 @if ($errors->any())
                                     @foreach ($errors->all() as $error)
                                         <div class="alert alert-danger" role="alert">
                                             <i class='bx bxs-error' style='color:#ad1919'></i>
                                             <strong>Por favor!!</strong> {{ $error }}
                                         </div>
                                     @endforeach

                                 @endif

                                 <div class="row mb-4">
                                     <div class="col">
                                         <div class="form-outline">
                                             <label for="specialty" class="form-label">Especialidad</label>
                                             <select class="form-select form-control" name="specialty_id"
                                                 id="specialty">
                                                 <option value=""> -Selecciona una especialidad</option>
                                                 @foreach ($specialties as $especialidad)
                                                     <option value="{{ $especialidad->id }}"
                                                         @if (old('specialty_id') == $especialidad->id) selected @endif>
                                                         {{ $especialidad->name }}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                     </div>

                                     <div class="col">
                                         <div class="form-outline">
                                             <label for="doctor" class="form-label">Médico</label>
                                             <select class="form-control form-select" name="doctor_id" id="doctor"
                                                 required>
                                                 @foreach ($doctors as $doctor)
                                                     <option value="{{ $doctor->id }}"
                                                         @if (old('doctor_id') == $doctor->id) selected @endif>
                                                         {{ $doctor->nombres_y_apellidos }}</option>
                                                 @endforeach
                                             </select>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row mb-4">
                                     <div class="col">
                                         <div class="form-outline">
                                             <label class="form-label" for="date">Fecha</label>
                                             <input id="date" name="scheduled_date" type="date"
                                                 class="form-control"
                                                 value="{{ old('scheduled_date'), date('Y-m-d') }}"
                                                 data-date-format="yyyy-mm-dd"
                                                 data-date-start-date="{{ date('Y-m-d') }}"
                                                 data-date-end-date="+30d" />
                                         </div>
                                     </div>
                                 </div>

                                 <div class="row mb-4">
                                     <div class="col">
                                         <div class="form-outline">
                                             <label class="form-label" for="hours">Hora de Atención</label>
                                             <div class="container">
                                                 <div class="row">
                                                     <div class="col">
                                                         <h4 class="m-3" id="titleMorning"></h4>
                                                         <div id="hoursMorning">
                                                             @if ($intervals)
                                                                 <h4 class="m-3">En la mañana</h4>
                                                                 @foreach ($intervals['morning'] as $key => $interval)
                                                                     <div class="custom-control custom-radio mb-3">
                                                                         <input type="radio"
                                                                             id="intervalMorning{{ $key }}"
                                                                             name="scheduled_time"
                                                                             class="custom-control-input"
                                                                             value="{{ $interval['start'] }}">
                                                                         <label class="custom-control-label"
                                                                             for="intervalMorning{{ $key }}">{{ $interval['start'] }}
                                                                             - {{ $interval['end'] }} </label>
                                                                     </div>
                                                                 @endforeach
                                                             @else
                                                                 <mark>
                                                                     <small class="text-black display-12">
                                                                         Selecciona un médico y una fecha, para ver las
                                                                         horas.
                                                                     </small>
                                                                 </mark>
                                                             @endif
                                                         </div>
                                                     </div>
                                                     <div class="col">
                                                         <h4 class="m-3" id="titleAfternoon"></h4>
                                                         <div id="hoursAfternoon">
                                                             @if ($intervals)
                                                                 <h4 class="m-3">En la tarde</h4>
                                                                 @foreach ($intervals['afternoon'] as $key => $interval)
                                                                     <div class="custom-control custom-radio mb-3">
                                                                         <input type="radio"
                                                                             id="intervalAfternoon{{ $key }}"
                                                                             name="scheduled_time"
                                                                             class="custom-control-input"
                                                                             value="{{ $interval['start'] }}">
                                                                         <label class="custom-control-label"
                                                                             for="intervalAfternoon{{ $key }}">{{ $interval['start'] }}
                                                                             - {{ $interval['end'] }} </label>
                                                                     </div>
                                                                 @endforeach
                                                             @endif
                                                         </div>
                                                     </div>

                                                 </div>

                                             </div>

                                         </div>
                                     </div>
                                 </div>

                                 <div class="row mb-4">
                                     <div class="col">
                                         <div class="form-outline">
                                             <label class="form-label">Tipo de Consulta</label>
                                             <div class="custom-control custom-radio mt-3 mb-3">
                                                 <input type="radio" id="type1" name="type"
                                                     class="custom-control-input"
                                                     @if (old('type') == 'Consulta') checked @endif value="Consulta">
                                                 <label class="custom-control-label" for="type1">Consulta</label>
                                             </div>
                                             <div class="custom-control custom-radio mb-3">
                                                 <input type="radio" id="type2" name="type"
                                                     class="custom-control-input"
                                                     @if (old('type') == 'Examen') checked @endif value="Examen">
                                                 <label class="custom-control-label" for="type2">Examen</label>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="col">
                                         <div class="form-outline">
                                             <label class="form-label" for="description">Síntomas</label>
                                             <textarea name="description" id="description" type="text" class="form-control" rows="5"
                                                 placeholder="Descripción breve de sus síntomas..." required></textarea>
                                         </div>
                                     </div>
                                 </div>



                                 <div
                                     class="col-12 col-md-12 col-lg-12 col-xl-12 d-flex align-items-center justify-content-evenly pb-4">
                                     <button type="submit" class="btn"
                                         style="background-color: #10A9FF; color: white;">Guardar</button>
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

     <script>
         let $doctor, $date, $specialty, $iRadio;
         let $hoursMorning, $hoursAfternoon, $titleMorning, $titleAfternoon;

         const titleMorning = `
   En la mañana
`;

         const titleAfternoon = `
   En la tarde
`;

         const noHours = `<b class="text-danger">
    No hay horas disponibles.
    </b>`;

         $(function() {
             const $specialty = $('#specialty');
             $doctor = $('#doctor');
             $date = $('#date');
             $titleMorning = $('#titleMorning');
             $hoursMorning = $('#hoursMorning');
             $titleAfternoon = $('#titleAfternoon');
             $hoursAfternoon = $('#hoursAfternoon');


             $specialty.change(() => {
                 const specialtyId = $specialty.val();
                 const url = `/especialidades/${specialtyId}/medicos`;
                 $.getJSON(url, onDoctorsLoaded);
             });

             $doctor.change(loadHours);
             $date.change(loadHours);

         });

         function onDoctorsLoaded(doctors) {
             let htmlOptions = '';
             doctors.forEach(doctor => {
                 htmlOptions += `<option value="${doctor.id}" > ${doctor.nombres_y_apellidos} </option>`;
             });
             $doctor.html(htmlOptions);
         }

         function loadHours() {
             const selectedDate = $date.val();
             const doctorId = $doctor.val();
             const url = `/horario/horas?date=${selectedDate}&doctor_id=${doctorId}`;
             $.getJSON(url, displayHours);
         }

         function displayHours(data) {
             let htmlHoursM = '';
             let htmlHoursA = '';

             $iRadio = 0;

             if (data.morning) {
                 const morning_intervalos = data.morning;
                 morning_intervalos.forEach(intervalo => {
                     htmlHoursM += getRadioIntervaloHTML(intervalo);
                 });
             }

             if (!htmlHoursM != "") {
                 htmlHoursM += noHours;
             }

             if (data.afternoon) {
                 const afternoon_intervalos = data.afternoon;
                 afternoon_intervalos.forEach(intervalo => {
                     htmlHoursA += getRadioIntervaloHTML(intervalo);
                 });
             }

             if (!htmlHoursA != "") {
                 htmlHoursA += noHours;
             }

             $hoursMorning.html(htmlHoursM);
             $hoursAfternoon.html(htmlHoursA);
             $titleMorning.html(titleMorning);
             $titleAfternoon.html(titleAfternoon);

         }

         function getRadioIntervaloHTML(intervalo) {
             const text = `${intervalo.start} - ${intervalo.end}`;

             return `<div class="custom-control custom-radio mb-3">
            <input type="radio" id="interval${$iRadio}" name="scheduled_time" class="custom-control-input" value="${intervalo.start}"  required>
            <label class="custom-control-label" for="interval${$iRadio++}">${text}</label>
            </div>`;

         }
     </script>
 </body>

 </html>
