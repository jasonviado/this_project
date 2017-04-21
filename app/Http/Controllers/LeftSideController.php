<?php

namespace App\Http\Controllers;

use App\Friends;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LeftSideController extends Controller
{
    public function getFriends(){
        $friends = new Friends();
        $content = '';
        foreach($friends->myFriends() as $key => $value){
            $content = $content .'<div class="left_friends_list" style="clear: both;">'.
                '<p class="left_friends" style="float: left;width: 50%;">'. $value->name .' '. $value->lname .'</p>'.
                '<div style="float: right;width: 50%;margin: 10px 0;text-align: center;">'.
                '<button class="visitUser" data-id="'. $value->friend_id.'" type="button">V</button>'.
                '<button type="button">M</button><button type="button">C</button></div></div>';
        }
        return [
            'status' => 'success',
            'friends' => $content
        ];
    }
    public function getTodo(){
        $todo = new Todo();
        $content = '';
        foreach ($todo->myTodo() as $key => $value) {
            if($value->status == 1){
                $content = $content . '<div class="left_todo complete"><p>'. $value->todo_name .
                    ' </p><div class="left_btn_container"></div></div>';
            }else{
                $content = $content . '<div class="left_todo incomplete"><p>'. $value->todo_name .
                    ' </p><div class="left_btn_container"><button class="left_btn_check" data-id="'. $value->id .
                    '">C</button><button class="left_btn_delete" data-id="'. $value->id .'">D</button></div></div>';
            }
        }
        return [
          'status' => 'success',
            'todo' => $content
        ];
    }
    public function addTodo(Request $request){
        $rules = [
            'todo' => 'required'
        ];
        $message = [
            'required' => 'Text is required'
        ];
        $validator = Validator::make($request->all(),$rules,$message);
        if($validator->fails()){
            return [
                'status' => 'error',
                'error' => $validator->errors()
            ];
        }

        $todo = new Todo();
        $todo->user_id = Auth::user()->id;
        $todo->todo_name = htmlspecialchars($request->todo);
        if($todo->save()){
            return [
                'status' => 'success'
            ];
        }
    }
    public function completeTodo(Request $request){
        $data = Todo::where('id',$request->id)->where('user_id',Auth::user()->id)->first();
        if($data == null){
            return [
                'status' => 'error',
                'message' => 'Nice Try.'
            ];
        }else{
            $updatePA = DB::table('tbl_todo')
                ->where('id',$request->id)
                ->update(['status' => 1]);
            return [
                'status' => 'success',
                'message' => 'Congrats.'
            ];
        }
    }
    public function getNotFriends(){
        $notFriends = new Friends();
        $notMyFriends = '';
        $notFriends = $notFriends->find_friends(Auth::user()->id);
        foreach($notFriends as $key => $value){
            $notMyFriends = $notMyFriends.'<div class="left_notfriends_list" style="clear: both;">'.
                    '<p class="left_friends" style="float: left;width: 50%;">'. $value['name'] .' '
                    . $value['lname'] . ' ('. $value['mutual'] .')</p>'.
                    '<div style="float: right;width: 50%;margin: 10px 0;text-align: center;">'.
                    '<button type="button">A</button>
                    <button class="visitUser" data-id="'. $value['id'].'" type="button">V</button>'.
                    '<button type="button">M</button></div></div>';
        }

        return [
            'status' => 'success',
            'notFriends' => $notMyFriends
        ];
    }
}
