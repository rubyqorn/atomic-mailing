<?php require_once '../views/parts/header.php' ?>

    <div class="container mt-4" id="forgot">
        <div class="row justify-content-center">
            <div class="col-lg-5 p-4 shadow bg-light">
                <form action="/confirmation" method="post">
                    <input type="hidden" name="code" value="">
                    <div class="form-group d-flex">
                        <i class="fa fa-envelope text-muted mt-2 mr-2"></i>
                        <input type="email" name="email" class="form-control" placeholder="john@example.com">
                    </div>
                    <div class="form-group d-flex">
                        <i class="fa fa-lock mt-2 mr-2 text-muted"></i>
                        <input type="password" name="password" class="form-control" placeholder="New password">
                    </div>
                    <div class="form-group d-flex">
                        <i class="fa fa-lock mt-2 mr-2 text-muted"></i>
                        <input type="password" name="confirmation" class="form-control" placeholder="Password confirmation">
                    </div>
                    <div class="form-group d-none" id="code">
                        <i class="fa fa-lock mt-2 mr-2 text-muted"></i>
                        <input type="text" name="code_confirm" class="form-control" placeholder="Type your code">
                    </div>
                    <div class="form-group m-0 d-none" id="message">
                        <p class="text-danger">
                            <small></small>
                        </p>
                    </div>
                    <div class="form-group d-flex justify-content-end">
                        <button type="submit" id="password_confirm" class="btn btn-info text-uppercase">
                            <small>
                                Reset password
                            </small>
                        </button>
                        <button type="submit" class="btn btn-info text-uppercase d-none" id="code_confirm">
                            <small>
                                Send
                            </small>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-lg-7 bg-info text-center shadow">
                <p class="mt-4 text-white h4 text-center font-weight-bold">
                    Forgot your password? Let's get a new one
                </p>
                <i class="fa fa-unlock-alt text-center text-white mt-3 mb-2 fa-7x"></i>
            </div>
        </div>
    </div>

<?php require_once '../views/parts/footer.php' ?>