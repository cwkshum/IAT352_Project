$(document).on('click', '.login_btn', function() {
    var email = $("#email").val();
    var password = $("#password").val();
    $.ajax({ 
        url: "login_post.php", 
        method: "POST",
        data: {email: email, password: password},
        
        success:function(data){
            var result = $.parseJSON(data);
            if (result == '') {
                var errorMessage = "Oops! Wrong email or password. Please try again!"
                $("#login_msg").html(errorMessage);
            } else{
                window.location.replace("memberhome.php");
            }
            
            
        },
    });
});

