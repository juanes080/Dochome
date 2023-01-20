<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PerfilpacienteController extends Controller
{

    public function create()
    {
        return view('perfilpaciente.create');
    }
    public function edit(Patient $patient)
    {
        $a = Auth::user()->id;
        return view('perfilpaciente.edit', compact('a'));
    }


    public function subirpaciente(Request $request){
        $request->validate([
            'email' => 'required|unique:users,email|max:30',
            'foto' => 'image|mimes:jpg,jpeg,pgn,png,svg,jpge|max:2048',
        ]);

        $a = Auth::user()->id;

        $user = User::find($a);

   /*      $user->nombres_y_apellidos = $request->nombres_y_apellidos; */
        $user->email = $request->email;

        if (isset($request->foto)) {
            $image_path = public_path().'/file/'.$user->foto;

           $foto = $request->file('foto');
            $foto->move('file',$foto->getClientOriginalName());
            $user->foto = $foto->getClientOriginalName();
       }else{
                $user->foto = $user->foto;
            }

        $user->telefono = $request->telefono;
        $user->direccion = $request->direccion;
        $user->save();

        return redirect()->route('perfilpaciente.create');
    }

}
