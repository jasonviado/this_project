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
    public function encryptStringArray ($stringArray, $key = "thisistheidofthetodo") {
        $s = strtr(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), serialize($stringArray), MCRYPT_MODE_CBC, md5(md5($key)))), '+/=', '-_,');
        return $s;
    }

    public function decryptStringArray ($stringArray, $key = "thisistheidofthetodo") {
        $s = unserialize(rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode(strtr($stringArray, '-_,', '+/=')), MCRYPT_MODE_CBC, md5(md5($key))), "\0"));
        return $s;
    }
}
