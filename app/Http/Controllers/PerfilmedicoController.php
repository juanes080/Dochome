<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Perfilmedico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilmedicoController extends Controller
{
    public function create()
    {
        return view('perfilmedico.create');
    }

    public function edit(Doctor $doctor)
    {
        $i = Auth::user()->id;
        return view('perfilmedico.edit', compact('i'));
    }

    public function subirmedico(Request $request){
        $request->validate([
            'email' => 'required|unique:users,email|max:30',
            'foto' => 'image|mimes:jpg,pgn,jpeg,png,svg,jpge|max:2048',
        ]);

        $i = Auth::user()->id;
        $user = User::find($i);

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

        return redirect()->route('perfilmedico.create');
    }

}
