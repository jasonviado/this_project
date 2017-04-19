<?php

namespace App\Http\Controllers;

use App\logRegModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class logRegController extends Controller
{
    public function index(){
        return view('login');
    }
    public function loginUser(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return array(
                'status' => 'success'
            );
        }
    }
    public function home(){
        return view('home');
    }
}
