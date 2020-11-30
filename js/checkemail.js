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
                    var result = $.parseJSON(data);
                    var string ='';
                    if (result == 1) {
                        string += 'This email is already in use.';
                    }
                    // Show response
                    $("#msg").fadeIn().html(string);
                }
            });
        }

    });

});