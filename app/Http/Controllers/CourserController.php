<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class CourserController extends Controller{

    public function store(){
        return User::paginate();
    }

    public function show($id){
        return User::find($id);
    }
}
