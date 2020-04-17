$(document).ready(function () {

    //Load register form without reloading
    $('#login-form .register-form-button').click(function (event) {
        event.preventDefault();

        $('#login-form').load('registration', () => {
            $.getScript('../js/app.js');
        });

    });

    // Return to login form 
    $('#login-form #register .fa-chevron-left').click(function () {
        $('#login-form').load('login #login-form #login');
    })

    // Activate spinner loader when click at register button
    $('#login-form #register .register-button').click(function (event) {
        event.preventDefault();

        $('#login-form .fa-atom').addClass('cir');

        $.ajax({
            url: '/register',
            method: 'POST',
            data: {
                email: $('#login-form #register #email-field').val(),
                password: $('#login-form #register #password-field').val(),
                name: $('#login-form #register #name-field').val(),
                login: $('#login-form #register #login-field').val(),
            }
        }).done((data) => {
            $('#login-content .alert strong').append(data);
            $('#login-content #status-message').removeClass('d-none');
            $('#login-content #status-message').addClass('active-alert');
        });

        setTimeout(() => {
            window.location.href = "/login"
        }, 3000);
    });

    // Show password button
    $('#login-form #show-password').click(function () {
        let passwordInput = $('#login-form input[name="password"]');

        if ($(passwordInput).attr('type') == 'password') {
            $(passwordInput).prop('type', 'text');
        } else {
            $(passwordInput).prop('type', 'password');
        }

    });

    // Show message form and add active class for dialog 
    $('#home-content #dialogs #dialog').click(function () {
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
    $('#home-nav .link').click(function (event) {
        event.preventDefault();

        let href = $(this).attr('href');

        // Remove content blocks 
        $('#home-nav').remove();
        $('#home-content').remove();

        // Remove class which hide loader
        $('#loader').removeClass('d-none');

        // Redirect user in 1,5 seconds
        setTimeout(function () {
            window.location.href = href;
        }, 1500);

    })

    // Show password and confirmation fields
    $('#settings #user-settings-form .fa-eye').click(function () {
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
    $('#settings #user-settings-form .save-settings').click(function (event) {
        event.preventDefault();
        $(this).find('small').remove();
        $(this).append('<div class="spinner-border spinner-border-sm" role="status"></div>');
    })

    // Make tab active and show content block
    $('#account #tabs .nav-item').click(function () {
        $('#account #tabs .nav-item').removeClass('active-tab');
        $(this).addClass('active-tab');

        let activeTab = $(this).attr('id');

        if (activeTab == 'social') {
            $('#account #user-info #default-info').css({
                marginLeft: "2000px"
            }).addClass('d-none');

            $('#account #user-info #social-links').removeClass('d-none').addClass('active-block');
        } else if (activeTab == 'default') {
            $('#account #user-info #social-links').addClass('d-none').css({
                marginLeft: "2000px"
            });

            $('#account #user-info #default-info').removeClass('d-none').addClass('active-block');
        }
    });

    // Show edit form in default info block
    $('#account #default-info .edit-button').click(function () {
        $(this).addClass('active-tab');

        $('#account #default-info .save-edits').removeClass('d-none');
        $('#account #default-info .user-default-content').addClass('d-none');
        $('#account #default-info #edit-form').removeClass('d-none').addClass('show-form');
    });

    // When click at save editions button its will show spinner in button
    $('#account #default-info .save-edits').click(function (event) {
        event.preventDefault();

        $(this).find('small').remove();
        $(this).append('<div class="spinner-border spinner-border-sm" role="status"></div>');
    });

    // Show buttons which call modal windows by clicking
    $('#account #social-links .edit-button').click(function () {
        $(this).addClass('active-tab');
        $('#account #social-links i[role="button"]').toggleClass('d-none');
    });

    $('#home-nav i.fa-search').click(function () {
        $(this).remove();
        $('#home-nav #search-icon').append('<button class="btn btn-sm btn-outline-dark search-button">Search</button>');
        $('#home-nav li.d-none').removeClass('d-none').addClass('show-search-form');
    });

})