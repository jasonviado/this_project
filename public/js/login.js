/**
 * Created by victor.taguines on 4/19/17.
 */
$(document).ready(function (){
   $('#btn-login').click(function(e){
       e.preventDefault();
       $.ajax({
          method:"post",
          url:"loginUser",
          data:$('#login-form').serialize(),
          dataType:"json",
          success:function(data){
                if(data.status == 'success'){
                    window.location.href = 'home';
                }
          }
       });
   });
});