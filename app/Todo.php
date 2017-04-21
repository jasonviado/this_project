<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Todo extends Model
{
    protected $table = "tbl_todo";
    public function myTodo(){
        return $this::where('user_id',Auth::user()->id)->latest()->get();
    }
}
