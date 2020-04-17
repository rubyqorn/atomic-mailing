<?php require_once '../views/parts/header.php'; ?>
    <!-- Main content -->
    <main id="login-content">
        <div class="container">
        
            <div class="row justify-content-center">

                <div class="col-lg-12 d-flex shadow p-0">

                    <!-- Preview -->
                    <div class="col-lg-6 text-center" id="left-side-login">
                        <p class="h1">Login into your account</p>
                        <i class="fa fa-atom fa-10x text-white loader"></i>
                        <p class="h3 mt-3 text-white text-uppercase">
                            Atomic Mailing
                        </p>
                    </div>

                    <!-- Login form -->
                    <div class="col-lg-6 pt-4" id="login-form">
                        <form action="/auth" method="post" class="text-white" id="login">
                            <div class="form-group mt-4 mb-4">
                                <input type="email" name="email" class="form-control text-white" placeholder="Email">
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <input type="password" class="form-control text-white" placeholder="Password" name="password">
                                <div class="custom-control custom-checkbox mt-2">
                                    <input type="checkbox" class="custom-control-input" id="show-password">
                                    <label for="show-password" class="custom-control-label">
                                        Show password |
                                    </label>
                                    <a href="/forgot" class="text-white">
                                        <small>
                                            Forgot password
                                        </small>
                                    </a>
                                </div>
                            </div>
                            <div class="from-group d-flex justify-content-between">
                                <button type="submit" class="login-button text-uppercase">
                                    <small>
                                        Login
                                    </small>
                                </button>
                                <button type="button" class="register-form-button text-uppercase">
                                    <small>
                                        Registration
                                    </small>
                                </button>
                            </div>
                        </form>
                    </div>
                
                </div>

            </div>

        </div>

        <?php require_once '../views/parts/alert.php'; ?>

    </main>
    
<?php require_once '../views/parts/footer.php'; ?>