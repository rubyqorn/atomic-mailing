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

        // Remove preview message and show messages
        $('#home-content #content .preview').remove();
        $('#home-content #content #messages-content').removeClass('d-none');
        
        // Show message form
        $('#message-form').addClass('show-message-form');
        
    });

    // Show loader and redirect
    $('#home-nav .link').click(function(event) {
        event.preventDefault();
        
        let href = $(this).attr('href');

        // Remove content blocks 
        $('#home-nav').remove();
        $('#home-content').remove();

        // Remove class which hide loader
        $('#loader').removeClass('d-none');

        // Redirect user in 1,5 seconds
        setTimeout(function() {
            window.location.href = href;
        }, 1500);
            
    })

    // Show password and confirmation fields
    $('#settings #user-settings-form .fa-eye').click(function() {
        let passwordField = $('#settings #user-settings-form input[name="password"]');
        let confirmationField = $('#settings #user-settings-form input[name="confirmation"]');

        if ($(passwordField).attr('type') == 'password') {
            $(passwordField).prop('type', 'text');
            $(confirmationField).prop('type', 'text');
        } else {
            $(passwordField).prop('type', 'password');
            $(confirmationField).prop('type', 'password');
        }
    });

    // Append spinner into save settings button when click on it
    $('#settings #user-settings-form .save-settings').click(function(event) {
        event.preventDefault();
        $(this).find('small').remove();
        $(this).append('<div class="spinner-border spinner-border-sm" role="status"></div>');
    })

})