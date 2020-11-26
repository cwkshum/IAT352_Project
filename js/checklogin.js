$(document).ready(function(){
    $("#submit").click(function(){
        var email = $("#email").val().trim();
        var password = $("#password").val().trim();

        if( email != "" && password != "" ){
            $.ajax({
                url:'checklogin.php',
                type:'post',
                data:{email:email,password:password},
                success:function(response){
                    var msg = "";
                    if(response == 1){
                        window.location = "memberhome.php";
                    }else{
                        msg = "Invalid email and password!";
                    }
                    $("#message").html(msg);
                }
            });
        }
    });
});