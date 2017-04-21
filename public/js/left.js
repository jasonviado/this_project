/**
 * Created by jason.viado on 4/19/17.
 */

$(document).ready(function(){

    $('.left_btn1').on('click',function(e){
       $('.left_title b').html($(this).children("img").attr("alt"));
       getFriends(e);
    });
    $('.left_btn2').on('click',function(){
        $('.left_title b').html($(this).children("img").attr("alt"));
        getPendingFriends();
    });
    $('.left_btn3').on('click',function(){
        $('.left_title b').html($(this).children("img").attr("alt")+'<form id="addTodo"><input id="todo_name" id="todo_name"><button id="addTodoBtn" type="button">+</button></form>');
        getTodo();
    });
    $('.left_btn4').on('click',function(){
        $('.left_title b').html($(this).children("img").attr("alt"));
        getFriendRequest();
    });
    $('.left_btn5').on('click',function(){
        $('.left_title b').html($(this).children("img").attr("alt"));
        getNotFriends();
    });
    $(document).delegate('#addTodoBtn','click',function(){
       sendTodo($("#todo_name").val(),$("#token").val());
        $("#todo_name").val('');
    });
    $(document).delegate('.left_btn_check','click',function(){
        completeTodo($(this).data('id'),$("#token").val());
    });
    $(document).delegate('.left_btn_delete','click',function(){
        alert($(this).data('id'));
    });
    $(document).delegate('.visitUser','click',function(){
        if($(location).prop('pathname').split('/')[1] != 'profile'){
            window.location = 'profile/'+$(this).data('id');
        }else{
            window.location = $(this).data('id');
        }
    });
    $(document).delegate('.addUser','click',function(e){
        var me = $(this);
        e.preventDefault();
        if ( me.data('requestRunning') ) {
            return;
        }
        $.ajax({
            method : 'post',
            url : 'addFriend',
            dataType: 'json',
            data : {
                _token : $("#token").val(),
                id : $(this).data('id')
            },
            beforeSend : function(){
            },
            success : function(data){
                getNotFriends();
            },
            complete : function(){
                me.data('requestRunning', false);
            }
        })
    });
    $(document).delegate('.acceptUser','click',function(e){
        var me = $(this);
        e.preventDefault();
        if ( me.data('requestRunning') ) {
            return;
        }
        $.ajax({
            method : 'post',
            url : 'acceptFriend',
            dataType: 'json',
            data : {
                _token : $("#token").val(),
                id : $(this).data('id')
            },
            beforeSend : function(){
            },
            success : function(data){
                getFriendRequest();
            },
            complete : function(){
                me.data('requestRunning', false);
            }
        })
    });
});

function getFriends(e){
    var me = $(this);
    e.preventDefault();
    if ( me.data('requestRunning') ) {
        return;
    }
    $.ajax({
        method : 'get',
        url : 'getFriends',
        dataType : 'json',
        beforeSend: function(){
            $('.left_bot_text').html('<div class="globalLoader"></div>');
        },
        success : function(data){
            $('.left_bot_text').html(data.friends);
        },
        complete :function(){
            $('.left_bot_text .globalLoader').remove();
            me.data('requestRunning', false);
//            console.clear();
        }
    });
}
function getTodo(){
    var me = $(this);
    if ( me.data('requestRunning') ) {
        return;
    }
    $.ajax({
        method : 'get',
        url : 'getTodo',
        dataType : 'json',
        beforeSend : function(){
            $('.left_bot_text').html('<div class="globalLoader"></div>');
        },
        success : function(data){
            console.clear();
            $('.left_bot_text').html(data.todo);
        },
        complete : function(){
            $('.left_bot_text .globalLoader').remove();
            me.data('requestRunning', false);
            console.clear();
        }
    });
}
function sendTodo(todo,token){
    $.ajax({
       method : 'post',
       url : 'addTodo',
       dataType : 'json',
        data :{
            _token : token,
            todo : todo
        },
        beforeSend : function(){
        },
        success : function(data){
            if(data.status == 'error'){
                $('#todo_name').css('border-color','red');
            }else{
                getTodo();
            }
        },
        complete : function(){
//            console.clear();
        }
    });
}
function completeTodo(id,token){
    $.ajax({
       method : 'post',
       url : 'completeTodo',
       dataType : 'json',
       data : {
           _token : token,
           id : id
       },
        beforeSend : function(){
        },
        success : function(data){
            if(data.status == 'error'){
                alert(data.message);
            }else{
                getTodo();
            }
        },
        complete : function(){
            console.clear();
        }
    });
}
function getNotFriends(){
    $.ajax({
        method : 'get',
        url : 'getNotFriends',
        dataType : 'json',
        beforeSend : function(){
            $('.left_bot_text').html('<div class="globalLoader"></div>');
        },
        success : function (data){
            $('.left_bot_text').html(data.notFriends);
        },
        complete : function(){
            $('.left_bot_text .globalLoader').remove();
//            console.clear();
        }
    })
}
function getPendingFriends(){
    $.ajax({
        method : 'get',
        url : 'getPendingFriends',
        dataType : 'json',
        beforeSend : function(){
            $('.left_bot_text').html('<div class="globalLoader"></div>');
        },
        success : function (data){
            $('.left_bot_text').html(data.pending);
        },
        complete : function(){
            $('.left_bot_text .globalLoader').remove();
//            console.clear();
        }
    })
}
function getFriendRequest(){
    $.ajax({
        method : 'get',
        url : 'getFriendRequest',
        dataType : 'json',
        beforeSend : function(){
            $('.left_bot_text').html('<div class="globalLoader"></div>');
        },
        success : function (data){
            $('.left_bot_text').html(data.request);
        },
        complete : function(){
            $('.left_bot_text .globalLoader').remove();
            console.clear();
        }
    })
}