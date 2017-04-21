<?php

namespace App\Http\Controllers;

use App\infoModel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Stevebauman\Location\Location;

class HomeController extends Controller
{
    public function home(){
        $user = infoModel::where('user_id',Auth::user()->id)->first();
        return view('layouts.home')->with('room',encrypt(Auth::user()->id))->with('user',$user);
    }
    public function editUser(Request $request){
        User::where('id',Auth::user()->id)->update([
            'name' => $request->name,
            'lname' => $request->lname,
            'dateofbirth' =>$request->dateofbirth
        ]);
        infoModel::where('user_id',Auth::user()->id)->update([
            'nickname' => $request->nickname,
            'address' => $request->address,
            'nationality' =>$request->nationality,
            'school' =>$request->school,
            'work' =>$request->work,
            'professionalskills' => $request->professional,
            'pnumber' =>$request->pnumber,
            'status' => $request->status
        ]);
    }
}
