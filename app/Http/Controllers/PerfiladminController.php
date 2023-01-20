<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Perfiladmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PerfiladminController extends Controller
{
    public function index()
    {
       /*  select('*')->where('role', 'paciente') */
        /* $user = User::; */

        $users = DB::select('select * from users where role = "admin"');

        $perfiladmins = Perfiladmin::paginate(4);
        return view('perfiladmin.index', compact('perfiladmins', 'users'));
    }
    public function create()
    {
        return view('perfiladmin.create');
    }
    public function edit()
    {
        $a = Auth::user()->id;
        return view('perfiladmin.edit', compact('a'));
    }

    public function subiradmin(Request $request){

        $request->validate([
            'email' => 'required|unique:users,email|max:30',
            'foto' => 'image|mimes:jpg,jpeg,pgn,png,svg,jpge|max:2048',
        ]);

        $a = Auth::user()->id;
        $user = User::find($a);

        $user->email = $request->email;

        if (isset($request->foto)) {
            $image_path = public_path().'/file/'.$user->foto;

           $foto = $request->file('foto');
            $foto->move('file',$foto->getClientOriginalName());
            $user->foto = $foto->getClientOriginalName();
       }else{
                $user->foto = $user->foto;
            }

            $user->telefono = $user->telefono;
            $user->direccion = $user->direccion;

        $user->save();

        return redirect()->route('perfiladmin.create');
    }


}
