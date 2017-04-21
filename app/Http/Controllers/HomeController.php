<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Stevebauman\Location\Location;

class HomeController extends Controller
{
    public function home(){
        return view('layouts.home')->with('room',encrypt(Auth::user()->id));
    }
    public function editUser(){
        return "asdf";
    }
}
