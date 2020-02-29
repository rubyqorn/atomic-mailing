<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oxanium&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="/public/css/app.css">
    <title>Atomic Mailing</title>
</head>
<body>


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
                    <div class="col-lg-6 pt-4 text-white" id="login-form">
                        <form action="/" method="post" class="text-white" id="login">
                            <div class="form-group mt-4 mb-4">
                                <input type="text" name="login" class="form-control" placeholder="Login">
                            </div>
                            <div class="form-group mt-4 mb-4">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <div class="custom-control custom-checkbox mt-2">
                                    <input type="checkbox" class="custom-control-input" id="show-password">
                                    <label for="show-password" class="custom-control-label">
                                        Show password
                                    </label>
                                </div>
                            </div>
                            <div class="from-group d-flex justify-content-between">
                                <button type="submit" class="login-button text-uppercase">
                                    <small>
                                        Login
                                    </small>
                                </button>
                                <button type="submit" class="register-form-button text-uppercase">
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
    </main>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="/public/js/app.js"></script>
</body>
</html>