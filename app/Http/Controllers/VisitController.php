<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    public function profile($id){
        $thisid = new User();
        return view('layouts.visit')->with('room',encrypt(Auth::user()->id));
    }
}
