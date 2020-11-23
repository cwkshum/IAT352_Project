$(document).ready(function(){

    $("#email").blur(function(){
        var email = $(this).val();
        if(email == ""){
            $("#msg").fadeOut();
        }else{
            $.ajax({
                url: 'checkemail.php',
                type: 'POST',
                data: {
                    email:email
                },
                success: function(data){

                    // Show response
                    $("#msg").fadeIn().html(data);
                }
            });
        }

    });

});