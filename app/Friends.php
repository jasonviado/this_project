<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class Friends extends Model
{
    protected $table = "tbl_friends";

    public function myFriends(){
        $data = $this::where('user_id',Auth::user()->id)
                    ->where('status',1)
                    ->join('users','tbl_friends.friend_id','users.id')
                    ->select('friend_id','name','lname')->get();
        return $data;
    }
    public function find_friends($id){
        $data1 = Friends::where('user_id',$id)->join('users','tbl_friends.friend_id','users.id')->select('friend_id as id')->get();
        $data2 = Friends::where('friend_id',$id)->join('users','tbl_friends.user_id','users.id')->select('user_id as id')->get();
        $holder_data1 = [];
        $holder_data2 = [];
        $counter = 0;
        foreach($data1 as $key => $val){
            $holder_data1[$counter] = $val->id;
            $counter++;
        }
        $counter = 0;
        foreach($data2 as $key => $val){
            $holder_data2[$counter] = $val->id;
            $counter++;
        }
        $friends = array_unique(array_merge($holder_data1,$holder_data2));
        $people = User::all();
        $all = [];
        foreach($people as $key => $val){
            if($val->id != Auth::user()->id){
                $all[$key] = $val->id;
            }
        }
        $my_friends = $friends;
        $friends = array_diff($all,$friends);
        $user_data_val = [];
        $count = 0;
        foreach($friends as $key => $val){
            $counter = Friends::whereIn('friend_id',$my_friends)->where('user_id',$val)->where('status',1)->count();
            $user_data = User::find($val);
            $user_data_val[$count] = [
                'id' => $user_data->id,
                'name' => $user_data->name,
                'lname' => $user_data->lname,
                'mutual' => $counter
            ];
            $count++;
        }
        return $user_data_val;
    }
    public function pending_friends(){
        return Friends::where('user_id',Auth::user()->id)
            ->where('status',0)
            ->join('users','tbl_friends.friend_id','users.id')->get();
    }
    public function get_friend_request(){
        return Friends::where('friend_id',Auth::user()->id)
            ->where('status',0)
            ->join('users','tbl_friends.user_id','users.id')->get();
    }
}
