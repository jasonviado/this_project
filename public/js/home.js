/**
 * Created by victor.taguines on 4/19/17.
 */
$(document).ready(function () {
    $('.transition_btn').click(function () {
        if ($('.transition_div').css('width') == '100px') {
            $('.transition_div').css({
                width: '100%',
                height: '100%',
                borderBottomLeftRadius: '0'
            });
            $('.dp_container').css({
                opacity: 1
            });
        } else {
            $('.transition_div').css({
                width: '100px',
                height: '100px',
                borderBottomLeftRadius: '100%'
            });
            $('.dp_container').css({
                opacity: 0
            });
        }
    });
});