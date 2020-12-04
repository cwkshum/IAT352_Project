$(document).on('click', '.login_btn', function() {
    //get the entered values of email and password
    var email = $("#email").val();
    var password = $("#password").val();
    $.ajax({ 
        url: "login_post.php", 
        method: "POST",
        data: {email: email, password: password},
        
        success:function(data){
            //parse the data
            var result = $.parseJSON(data);

            //if the data returned no matches, give the users an error message
            if (result == '') {
                var errorMessage = "Oops! Wrong email or password. Please try again!"
                $("#login_msg").html(errorMessage);
            } else{
                //if they logged in succesfully, lead the user back to the member page
                window.location.replace("memberhome.php");
            }
        },
    });
});

