$("#email").blur(function(){
    var email = $(this).val();
    emailValidation(email);

    // if the email input is empty, dont show a message
    if(email == ""){
        $("#msg").fadeOut();
    } else {
        $.ajax({
            url: 'checkemail.php',
            type: 'POST',
            data: {email:email},
            success: function(data){
                //parse the data sent back from the PHP 
                var result = $.parseJSON(data);
                var string ='';

                //if there is more than result, provide a message that tells the user the email is already in use
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

    //if there is an input in the first name box, a message is allowed to be displayed
    if (firstName != ''){ 
        //if the input matches any invalid characters, let the user know
        if (invalid.test(firstName)  === false){
            document.getElementById('first-name-validation').style.color = '#9c4b49';
            document.getElementById('first-name-validation').innerHTML = 'Only letters and white space allowed!';
        //if the name has been entered properly, don't display a message 
        }  else {
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
        //if there is an input in the last name box, a message is allowed to be displayed
        if (invalid.test(lastName)  === false){
            document.getElementById('last-name-validation').style.color = '#9c4b49';
            document.getElementById('last-name-validation').innerHTML = 'Only letters and white space allowed!';
        //if the name has been entered properly, don't display a message
        }  else {
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
        //if there is an input in the last name box, a message is allowed to be displayed
        if (invalid.test(email)  === false){
            document.getElementById('email-validation-msg').style.color = '#9c4b49';
            document.getElementById('email-validation-msg').innerHTML = 'Pleae use a valid email!';
        //if the name has been entered properly, don't display a message
        }  else {
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
        //if the passwords matching show 'Matching'
        if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
            document.getElementById('password-message').style.color = 'green';
            document.getElementById('password-message').innerHTML = 'Passwords Matching';
        
        //if the passwords don't match, show 'Passwords Not matching'
        } else {
            document.getElementById('password-message').style.color = '#9c4b49';
            document.getElementById('password-message').innerHTML = 'Passwords Not Matching';
        }

    //if no passwords have been entered, don't show a message
    } else{
        document.getElementById('password-message').style.color = 'white';
        document.getElementById('password-message').innerHTML = '';
    }
}

