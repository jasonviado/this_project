<?php

namespace App\Http\Controllers;

use App\logRegModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class logRegController extends Controller
{
    public function index(){
        if(Auth::check()){
            return Redirect::to('home');
        }else{
            return view('login');
        }
    }
    public function login(Request $request){

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return array(
                'status' => 'success'
            );
        }
    }
}
