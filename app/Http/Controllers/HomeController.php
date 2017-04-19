<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    public function home(){
        $user = new User();
        return view('layouts.home')->with('room',encrypt(Auth::user()->id));
    }
}
