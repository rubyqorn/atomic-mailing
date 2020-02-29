$(document).ready(function() {

    //Load register form without reloading
    $('#login-form .register-form-button').click(function(event) {
        event.preventDefault();

        $('#login-form').load('register.php');

    });

    // Return to login form 
    $('#login-form #register .fa-chevron-left').click(function() {
        $('#login-form').load('auth.php #login-form #login');
    })

    //Activate spinner loader when click at login button
    $('#login-form .login-button').click(function(event) {
        event.preventDefault();
        $('#left-side-login .fa-atom').addClass('cir');

        setTimeout(function() {
            window.location.href = 'http://localhost:2002/public/index.php';
        }, 2000)
    });

    // Activate spinner loader when click at register button
    $('#login-form #register .register-button').click(function(event) {
        event.preventDefault();

        $('#login-form .fa-atom').addClass('.cir');

        setTimeout(function() {
            window.location.href = 'http://localhost:2002/public/index.php';
        }, 2000)
    });

    // Show password button
    $('#login-form #show-password').click(function() {
        let passwordInput = $('#login-form input[name="password"]');

        if ($(passwordInput).attr('type') == 'password') {
            $(passwordInput).prop('type', 'text');
        } else {
            $(passwordInput).prop('type', 'password');
        }
        
    });

})