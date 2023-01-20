<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Specialty;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexmedico() {

        return view('medico.index');
    }


     public function index(){

        $doctors = User::doctors()->paginate(4);
        return view('doctors.index', compact('doctors'));
    }

    public function create(){

        $specialties = Specialty::all();

        return view('doctors.create',compact('specialties'));
    }

    public function store(Request $request)
    {

        $rules = [
            'nombres_y_apellidos' => 'required|max:30',
            'email' => 'required|unique:users,email|max:30',
            'password' => 'required|max:10',
            'cedula' => 'required|digits:10',
            'fecha_de_expedicion' => 'required',
            'sexo' => 'required',
            'password' => 'required',
            'foto' => 'image|mimes:jpg,jpeg,pgn,svg,jpge|max:2048',
            'telefono' => 'required|digits:10',
            'direccion' =>'required',
        ];
        $messages = [
            'nombres_y_apellidos.required' => 'El nombre del médico es obligatorio',
            'nombres_y_apellidos.min' => 'El nombre del médico debe tener menos de 30 caracteres',
            'email.required' => 'El correo electrónico es obligatorio',
            'email.email' =>'Ingresa una dirección de correo electrónico válido',
            'email.min' => 'El correo electronico del médico debe tener menos de 30 caracteres',
            'cedula.required' => 'La cédula es obligatorio',
            'cedula.digits' => 'La cédula debe de tener 10 dígitos',
            'fecha_de_expedicion.required' => 'La fecha de expedición es requerida',
            'sexo.required' => 'El sexo es requerido',
            'telefono.required' => 'El número de teléfono es obligatorio',
            'telefono.digits' => 'El número de teléfono debe de tener 10 dígitos',
            'direccion.min' => 'La dirección es requerida',
            ];
            $this->validate($request, $rules, $messages) ;

            $user = User::create(
                 $request->only('nombres_y_apellidos','email','cedula','fecha_de_expedicion','sexo','telefono','foto','direccion','password')
                + ['role' => 'doctor'
                ]
             );

             $user->specialties()->attach($request->input('specialties'));

             auth()->login($user);
             return redirect()->to('medico');
        }
    }

