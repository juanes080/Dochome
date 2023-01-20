<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller
{


    public function create()
    {

        return view('auth.login');
    }

    public function store()
    {

        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'El correo electrónico o la contraseña son incorrectos, intente nuevamente',
            ]);
        } else {

            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.index');

            } elseif (auth()->user()->role == 'doctor') {
                return redirect()->route('medico.index');

            } elseif (auth()->user()->role == 'paciente') {
                return redirect()->route('paciente.index');

            }else{
                return redirect()->to('/');
            }
        }
    }

    public function destroy()
    {

        auth()->logout();

        return view('home');
        return redirect()->to('/');
    }
}
