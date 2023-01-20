<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{

    public function create()
    {

        return view('auth.register');
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

        $user = new User();
        $user->nombres_y_apellidos = $request->nombres_y_apellidos;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->cedula = $request->cedula;
        $user->fecha_de_expedicion = $request->fecha_de_expedicion;
        $user->sexo = $request->sexo;
        $user->direccion = $request->direccion;
        $user->telefono = $request->telefono;
        $foto = $request->file('foto');
        $foto->move('file', $foto->getClientOriginalName());
        $user->foto = $foto->getClientOriginalName();
        $user->role = "admin";
        $user->save();

        auth()->login($user);
        return redirect()->to('admin');
    }
}
