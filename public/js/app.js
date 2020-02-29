$(document).ready(function() {

    //Load register form without reloading
    $('#login-form .register-form-button').click(function(event) {
        event.preventDefault();

        $('#login-form').load('register.php');
    })

})