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

    // Forgot password form
    $(document).ready(function() {
        // Generate code and pass into hidden field 
        let code = Math.floor(Math.floor(999999) * Math.random());
        $('#forgot input[type="hidden"]').attr('value', code);


        // By click we send POST request where validate password 
        // field and send email 
        $('#forgot #password_confirm').click(function(event) {
            event.preventDefault();

            $.ajax({
                url: '/confirmation',
                method: 'POST',
                data: {
                    code: $('#forgot input[name="code"]').val(),
                    email: $('#forgot input[name="email"]').val(),
                    password: $('#forgot input[name="password"]').val(),
                    confirmation: $('#forgot input[name="confirmation"]').val(),
                }
            }).done(function(data) {
                if (data === 'Password mismatch') {
                    $('#forgot #message').removeClass('d-none');
                    return $('#forgot #message small').append(data);
                }

                $('#forgot #message').addClass('d-none');
                $('#forgot #code').removeClass('d-none').addClass('d-flex');
                $('#forgot #password_confirm').addClass('d-none');
                $('#forgot #code_confirm').removeClass('d-none');
            })
        });

        // By click validate typed code from user whom 
        // have come at email message with code. And finally 
        // update user password in database
        $('#forgot #code_confirm').click(function(event) {
            event.preventDefault();

            $.ajax({
                url: '/code_confirmation',
                method: 'POST',
                data: {
                    code: $('#forgot input[name="code"]').val(),
                    email: $('#forgot input[name="email"]').val(),
                    password: $('#forgot input[name="password"]').val(),
                    confirmation: $('#forgot input[name="confirmation"]').val(),
                    code_confirm: $('#forgot input[name="code_confirm"]').val()
                }
            }).done(function(data) {
                console.log(data);
                if (data === 'Wrong code. Please check your email') {
                    $('#forgot #message').removeClass('d-none');
                    return $('#forgot #message small').append(data);
                }

                return setTimeout(function(data) {
                    $('#forgot #message').removeClass('d-none');
                    $('#forgot #message p').removeClass('text-danger').addClass('text-success');
                    $('#forgot #message small').append(data);

                    return window.location.href = '/login';
                }, 2000);
            });
        });
    });

    // Show message form and add active class for dialog 
    $('#home-content #dialogs #dialog').click(function () {
        let dialogClass = $(this).attr('class').split(' ')['4'];
        let dialogId = dialogClass.split('-')['1'];

        $.ajax({
            url: '/dialog/' + dialogId,
            method: 'GET',
        }).done(function(data) {
            $('#home-content #content').append(data);
        });

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
    
    // Update user settings 
    $('#settings #user-settings-form #password-confirm-btn').click(function (event) {
        event.preventDefault();

        $.ajax({
            url: '/update-user-settings',
            method: 'POST',
            data: {
                name: $('#user-settings-form input[name="name"]').val(),
                email: $('#user-settings-form input[name="email"]').val(),
                website: $('#user-settings-form input[name="website"]').val(),
            }
        }).done(function(data) {
            if (data == 'Validation problem') {
                $('#settings #error-message').removeClass('d-none');
                return $('#settings #error-message small').append(data);
            }

            return setTimeout(function() {
                window.location.href = '/settings';
            }, 1000);
        });

    });


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

        $.ajax({
            url: "/edit-account",
            method: "POST",
            data: {
                name: $('#account #default-info input[name="name"]').val(),
                website: $('#account #default-info input[name="website"]').val(),
                email: $('#account #default-info input[name="email"]').val()
            } 
        }).done(function(data) {
            if (data === 'Processing error') {
                $('#account #default #message').removeClass('d-none');
                return $('#account #default-info #message .text-white').append(data);
            }

            $('#account #default #message').addClass('d-none');

            return setTimeout(function() {
                window.location.href = "/account";
            }, 2000);
        })
        
    });

    // Show buttons which call modal windows by clicking
    $('#account #social-links .edit-button').click(function () {
        // Show edit buttons
        $(this).addClass('active-tab');
        let penButton = $('#account #social-links i[role="button"]').toggleClass('d-none');
        
        $(penButton).click(function() {
            // Get target name and set active class for modal window
            let targetName = $(this).attr('data-target');
            $('#account .modal').removeClass('active-modal');
            $('#account '+ targetName).addClass('active-modal');

            // Ajax request processing
            $('#account .active-modal button[type="submit"]').click(function(event) {
                event.preventDefault();

                // Field name where we will get typed data
                let fieldName = $('#account .active-modal').attr('id');
                fieldName = fieldName.split('-')['2'];

                $.ajax({
                    url: "/update-social-links",
                    method: "POST",
                    data: {
                        website: $('#account .active-modal input[name="'+ fieldName +'"]').val()
                    }
                }).done(function(data) {
                    // Show error message if user type wrong link
                    if (data == 'Website is not exists') {
                         $('#account .active-modal #message').removeClass('d-none');
                         return $('#account .active-modal #message strong').append(data);
                    }
                    
                    // Redirect user at account page
                    $('#account .active-modal #message').addClass('d-none');
                    setTimeout(function() {
                        window.location.href = "/account";
                    }, 2000);
                })

            });
        })
    });

    $('#home-nav i.fa-search').click(function () {
        $(this).remove();
        $('#home-nav #search-icon').append('<button class="btn btn-sm btn-outline-dark search-button">Search</button>');
        $('#home-nav li.d-none').removeClass('d-none').addClass('show-search-form');
    });

})