<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialty;

class SpecialtyController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

        $specialties = Specialty::paginate(3);
        return view('specialties.index', compact('specialties'));
    }

    public function create(){
        return view('specialties.create');
    }

    public function sendData(Request $request){


        $rules = [
            'name' => 'required|min:3|max:25'
        ];

        $messages = [
            'name.required' => 'El nombre de la especialidad es obligatorio.',
            'name.min' => 'El nombre de la especialidad debe tener más de 3 caracteres.',
            'name.max' => 'El nombre de la especialidad debe tener menos de 25 caracteres.',
        ];

        $this->validate($request, $rules, $messages);

        $specialty = new Specialty();

        $specialty->name = $request->input('name');
        $specialty->save();

        $notification = 'La especialidad se ha creado correctamente.';

        return redirect('/especialidades')->with(compact('notification'));

    }

    public function edit(Specialty $specialty){

        return view('specialties.edit', compact('specialty'));
    }

    public function update(Request $request, Specialty $specialty){


        $rules = [
            'name' => 'required|min:3|max:25'
        ];

        $messages = [
            'name.required' => 'El nombre de la especialidad es obligatorio.',
            'name.min' => 'El nombre de la especialidad debe tener más de 3 caracteres.',
            'name.max' => 'El nombre de la especialidad debe tener menos de 25 caracteres.',
        ];

        $this->validate($request, $rules, $messages);

        $specialty->name = $request->input('name');
        $specialty->save();
        $notification = 'La especialidad se ha actualizado correctamente.';

        return redirect('/especialidades')->with(compact('notification'));

    }

    public function destroy(Specialty $specialty){
        $deletename = $specialty->name;
        $specialty->delete();
        $notification = 'La especialidad ' . $deletename .' se ha eliminado correctamente.';

        return redirect('/especialidades')->with(compact('notification'));
    }

}

