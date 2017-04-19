/**
 * Created by jason.viado on 4/19/17.
 */

$(document).ready(function(){
   $('.left_btn1').on('click',function(){
       $('.left_title b').html($(this).children("img").attr("alt"));
   });
    $('.left_btn2').on('click',function(){
        $('.left_title b').html($(this).children("img").attr("alt"));
    });
    $('.left_btn3').on('click',function(){
        $('.left_title b').html($(this).children("img").attr("alt"));
    });
    $('.left_btn4').on('click',function(){
        $('.left_title b').html($(this).children("img").attr("alt"));
    });
});