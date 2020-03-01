$(document).ready(function() {

    //Load register form without reloading
    $('#login-form .register-form-button').click(function(event) {
        event.preventDefault();

        $('#login-form').load('register.php', function() {
            $.getScript('/public/js/app.js');
        });

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
            window.location.href = 'http://localhost:2002/views/home.php';
        }, 2000)
    });

    // Activate spinner loader when click at register button
    $('#login-form #register .register-button').click(function(event) {
        event.preventDefault();

        $('#login-form .fa-atom').addClass('cir');

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

    // Show message form and add active class for dialog 
    $('#home-content #dialogs #dialog').click(function() {
        // Add active class for dialog
        $('#home-content #dialogs #dialog').removeClass('active-dialog');
        $(this).addClass('active-dialog');

        // Remove preview message
        $('#home-content #content .preview').remove();
        
        // Append message form into message content area
        $('#message-form').removeClass(function() {
            $(this).removeClass('d-none');
            $('#home-content #content').append(this);
        });

        
    })

})