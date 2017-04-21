/**
 * Created by victor.taguines on 4/19/17.
 */
$(document).ready(function () {
    var num = 0;
    $('.transition_btn').click(function () {
        if (num == 0) {
            num = 1;
            $('.transition_div').css({
                width: '100%',
                height: '100%',
                borderBottomLeftRadius: '0'
            });
            $('.dp_container').css({
                width: '100%',
                height: '100%',
                opacity: 1,
                visibility:'visible',
                borderBottomLeftRadius: '0',
                zIndex:'1'
            });
            $('.profile_container').css({
                visibility:'visible',
                borderBottomLeftRadius:'0'
            });
            $('.transition_btn').css({
                zIndex:'2'
            });
        } else {
            num = 0;
            $('.transition_div').css({
                width: '100px',
                height: '100px',
                borderBottomLeftRadius: '100%'
            });
            $('.dp_container').css({
                opacity: 0,
                zIndex:'1',
                borderBottomLeftRadius: '100%',
                background:'#0074D9'
            });
            $('.transition_btn').css({
                zIndex:'2'
            });
            $('.profile_container').css({
                borderBottomLeftRadius:'100%'
            });
        }
    });
});