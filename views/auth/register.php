
<form action="/register" method="post" id="register">
    <i class="fa fa-chevron-left fa-lg text-white"></i>
    <div class="form-group mt-4 mb-4">
        <input type="text" name="login" class="form-control text-white" id="login-field" placeholder="Login">
    </div>
    <div class="form-group mt-4 mb-4">
        <input type="email" name="email" class="form-control text-white" id="email-field" placeholder="john@example.com">
    </div>
    <div class="form-group mt-4 mb-4">
        <input type="text" name="name" class="form-control text-white" id="name-field" placeholder="John Doe">
    </div>
    <div class="form-group mt-4 mb-4">
        <input type="password" class="form-control text-white" id="password-field" placeholder="Password" name="password">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="show-password">
            <label for="show-password" class="custom-control-label text-white mt-2">
                Show password
            </label>
        </div>
    </div>
    <div class="from-group d-flex justify-content-between">
        <button type="submit" class="register-button text-uppercase">
            <small>
                Register
            </small>
        </button>
    </div>
</form>
