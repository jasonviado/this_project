<?php

namespace App\Http\Controllers;

use App\Friends;
use App\Todo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LeftSideController extends Controller
{
    public function getFriends(){
        $friends = new Friends();
        $content = '';
        $id = new  User();
        foreach($friends->myFriends() as $key => $value){
            $content = $content .'<div class="left_friends_list" style="clear: both;">'.
                '<p class="left_friends" style="float: left;width: 50%;">'. $value->name .' '. $value->lname .'</p>'.
                '<div style="float: right;width: 50%;margin: 10px 0;text-align: center;">'.
                '<button class="visitUser" data-id="'.$value->friend_id.'" type="button">V</button>'.
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
        $thisid = new Todo();
        $data = Todo::where('id',$request->id)->where('user_id',Auth::user()->id)->first();
        if($data == null){
            return [
                'status' => 'error',
                'message' => 'Nice Try.'
            ];
        }else{
            $updatePA = DB::table('tbl_todo')
                ->where('id',$id)
                ->update(['status' => 1]);
            return [
                'status' => 'success',
                'message' => 'Congrats.'
            ];
        }
    }
    public function getNotFriends(){
        $notFriends = new Friends();
        $id = new User();
        $notMyFriends = '';
        $notFriends = $notFriends->find_friends(Auth::user()->id);
        foreach($notFriends as $key => $value){
            $notMyFriends = $notMyFriends.'<div class="left_notfriends_list" style="clear: both;">'.
                    '<p class="left_friends" style="float: left;width: 50%;">'. $value['name'] .' '
                    . $value['lname'] . ' ('. $value['mutual'] .')</p>'.
                    '<div style="float: right;width: 50%;margin: 10px 0;text-align: center;">'.
                    '<button class="addUser" data-id="'. $value['id'] .'" type="button">A</button>
                    <button class="visitUser" data-id="'. $value['id'] .'" type="button">V</button>'.
                    '<button type="button">M</button></div></div>';
        }

        return [
            'status' => 'success',
            'notFriends' => $notMyFriends
        ];
    }
    public function addFriend(Request $request){
        $user = new User();
        $first = Friends::where('user_id',$request->id)->where('friend_id',Auth::user()->id)->first();
        $second = Friends::where('user_id',Auth::user()->id)->where('friend_id',$request->id)->first();
        if($first == null && $second == null){
            $friend = new Friends();
            $friend->user_id = Auth::user()->id;
            $friend->friend_id = $request->id;
            if($friend->save()){
                return [
                    'status' => 'success',
                ];
            }
        }else{
            return [
                'status' => 'error',
                'message' => 'Nice try.'
            ];
        }
    }
    public function getPendingFriends(){
        $pending = new Friends();
        $thisid = new User();
        $pending_friends = $pending->pending_friends();
        $content = '';
        foreach($pending_friends as $key => $value){
            $content = $content .'<div class="left_pendingfriends_list" style="clear: both;">'.
                '<p class="left_friends" style="float: left;width: 50%;">'. $value['name'] .' '. $value['lname'] .'</p>'.
                '<div style="float: right;width: 50%;margin: 10px 0;text-align: center;">'.
                '<button class="visitUser" data-id="'.$value['friend_id'].'" type="button">V</button></div></div>';
        }
        return [
            'status' => 'success',
            'pending' => $content
        ];
    }
    public function getFriendRequest(){
        $data = new Friends();
        $thisis = new User();
        $pending_request = $data->get_friend_request();
        $content = '';
        foreach($pending_request as $key => $value){
            $content = $content .'<div class="left_pendingfriends_list" style="clear: both;">'.
                '<p class="left_friends" style="float: left;width: 50%;">'. $value['name'] .' '. $value['lname'] .'</p>'.
                '<div style="float: right;width: 50%;margin: 10px 0;text-align: center;">'.
                '<button class="acceptUser" data-id="'.$value['user_id'].'" type="button">A</button>
                <button class="visitUser" data-id="'.$value['user_id'].'" type="button">V</button></div></div>';
        }
        return [
            'status' => 'success',
            'request' => $content
        ];
    }
    public function acceptFriend(Request $request){
        $thisid = new User();
        $first = Friends::where('user_id',$request->id)->where('friend_id',Auth::user()->id)->where('status',0)->first();
        $second = Friends::where('user_id',Auth::user()->id)->where('friend_id',$request->id)->first();

        if($first != null && $second == null){
            $updatePA = Friends::where('id',$first->id)
                ->update(['status' => 1]);
            $new = new Friends();
            $new->user_id = Auth::user()->id;
            $new->friend_id = $request->id;
            $new->status = '1';
            if($new->save()){
                return [
                    'status' => 'success',
                ];
            }
        }else{
            return [
                'status' => 'error',
                'message' => 'Nice try'
            ];
        }

    }
}
