// $(document).ready(function(){
//     passwordCheck();
// }); 
$("#email").blur(function(){
    var email = $(this).val();
    emailValidation(email);

    if(email == ""){
        $("#msg").fadeOut();
    } else{
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
                $("#email-taken-msg").fadeIn().html(string);
            }
        });
    }

});

$("#first_name").blur(function(){
    var firstName = document.getElementById('first_name').value;

    var invalid = /^[a-zA-Z\s]+$/;

    if (firstName != ''){ 
        if (invalid.test(firstName)  === false){
            document.getElementById('first-name-validation').style.color = '#9c4b49';
            document.getElementById('first-name-validation').innerHTML = 'Only letters and white space allowed!';
        }  else{
            document.getElementById('first-name-validation').style.color = 'white';
            document.getElementById('first-name-validation').innerHTML = '';
        }
    } else{
        document.getElementById('first-name-validation').style.color = 'white';
        document.getElementById('first-name-validation').innerHTML = '';
    }
});

$("#last_name").blur(function(){
    var lastName = document.getElementById('last_name').value;

    var invalid = /^[a-zA-Z\s]+$/;

    if (lastName != ''){ 
        if (invalid.test(lastName)  === false){
            document.getElementById('last-name-validation').style.color = '#9c4b49';
            document.getElementById('last-name-validation').innerHTML = 'Only letters and white space allowed!';
        }  else{
            document.getElementById('last-name-validation').style.color = 'white';
            document.getElementById('last-name-validation').innerHTML = '';
        }
    } else{
        document.getElementById('last-name-validation').style.color = 'white';
        document.getElementById('last-name-validation').innerHTML = '';
    }
});


function emailValidation(email){
    var invalid = /^\S+@\S+\.\S+$/;

    if (email != ''){ 
        if (invalid.test(email)  === false){
            document.getElementById('email-validation-msg').style.color = '#9c4b49';
            document.getElementById('email-validation-msg').innerHTML = 'Pleae use a valid email!';
        }  else{
            document.getElementById('email-validation-msg').style.color = 'white';
            document.getElementById('email-validation-msg').innerHTML = '';
        }
    } else{
        document.getElementById('email-validation-msg').style.color = 'white';
        document.getElementById('email-validation-msg').innerHTML = '';
    }
}


function passwordCheck(){
    if((document.getElementById('password').value) != ''){    
        if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
            document.getElementById('password-message').style.color = 'green';
            document.getElementById('password-message').innerHTML = 'Passwords Matching';
        } else {
            document.getElementById('password-message').style.color = '#9c4b49';
            document.getElementById('password-message').innerHTML = 'Passwords Not Matching';
        }
    } else{
        document.getElementById('password-message').style.color = 'white';
        document.getElementById('password-message').innerHTML = '';
    }
}

