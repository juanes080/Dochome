<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PerfiladminController;
use App\Http\Controllers\PerfilpacienteController;
use App\Http\Controllers\PerfilmedicoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\AppointmentController;

/*Route::get('/', function () {
    return view('pagina_principal.index');
});*/

Route::get('/', function () {
    return view('home');
});

Route::get('/register', [RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.store');

Route::get('/login', [SessionsController::class, 'create'])
    ->middleware('guest')
    ->name('login.index');

Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.store');

Route::get('/logout', [SessionsController::class, 'destroy'])
    ->middleware('auth')
    ->name('login.destroy');


Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');

Route::get('/medico', [DoctorController::class, 'indexmedico'])
    ->middleware('auth.doctor')
    ->name('medico.index');

Route::get('/paciente', [PatientController::class, 'indexpaciente'])
    ->middleware('auth.patient')
    ->name('paciente.index');

Route::resource('nosotros', NosotrosController::class);


Route::resource('perfiladmin', PerfiladminController::class);

Route::get('perfiladmin2', [PerfiladminController::class, 'edit'])
    ->name('perfiladmin2.edit');

Route::get('/Perfil2', function () {
    return view('perfiladmin.edit');
})->name('perfil.perfiladmin');

Route::put('save2', [PerfiladminController::class, 'subiradmin'])->name('subiradmin');



Route::resource('perfilpaciente', PerfilpacienteController::class);

Route::get('perfilpaciente2', [PerfilpacienteController::class, 'edit'])
    ->name('perfilpaciente2.edit');

Route::get('/Perfil3', function () {
    return view('perfilpaciente.edit');
})->name('perfil.perfilpaciente');

Route::put('save3', [PerfilpacienteController::class, 'subirpaciente'])->name('subirpaciente');

Route::resource('perfilmedico', PerfilmedicoController::class);


Route::get('perfilmedico2', [PerfilmedicoController::class, 'edit'])
    ->name('perfilmedico2.edit');

Route::get('/Perfil1', function () {
    return view('perfilmedico.edit');
})->name('perfil.perfilmedico');

Route::put('save1', [PerfilmedicoController::class, 'subirmedico'])->name('subirmedico');
/////

//RUTAS ESPECIALIDAD
Route::get('/especialidades', [App\Http\Controllers\SpecialtyController::class, 'index']);

Route::get('/especialidades/create', [App\Http\Controllers\SpecialtyController::class, 'create']);
Route::get('/especialidades/{specialty}/edit', [App\Http\Controllers\SpecialtyController::class, 'edit']);
Route::post('/especialidades', [App\Http\Controllers\SpecialtyController::class, 'sendData']);
Route::put('/especialidades/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'update']);
Route::delete('/especialidades/{specialty}', [App\Http\Controllers\SpecialtyController::class, 'destroy']);


//RUTAS MEDICOS
Route::resource('medicos', 'App\Http\Controllers\DoctorController');


//RUTAS PACIENTE
Route::resource('pacientes', 'App\Http\Controllers\PatientController');


//RUTAS HORARIO

Route::get('/horario', [App\Http\Controllers\HorarioController::class, 'edit']);
Route::post('/horario', [App\Http\Controllers\HorarioController::class, 'store']);

//RUTAS CITAS
Route::get('/reservarcitas/create', [App\Http\Controllers\AppointmentController::class, 'create']);
Route::post('/reservarcitas', [App\Http\Controllers\AppointmentController::class, 'store']);
Route::get('/miscitas', [App\Http\Controllers\AppointmentController::class, 'index']);
Route::get('/miscitas/{appointment}', [App\Http\Controllers\AppointmentController::class, 'show']);
Route::post('/miscitas/{appointment}/cancel', [App\Http\Controllers\AppointmentController::class, 'cancel']);
Route::post('/miscitas/{appointment}/confirm', [App\Http\Controllers\AppointmentController::class, 'confirm']);
Route::get('/miscitas/{appointment}/cancel', [App\Http\Controllers\AppointmentController::class, 'formCancel']);


//API ESPECIALIDAD
Route::get('/especialidades/{specialty}/medicos', [App\Http\Controllers\Api\SpecialtyController::class, 'doctors']);
Route::get('/horario/horas', [App\Http\Controllers\Api\HorarioController::class, 'hours']);
