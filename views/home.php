<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Oxanium&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="/public/css/app.css">
    <title>Home</title>
</head>
<body>

    <!-- Loader -->
    <div class="container d-none" id="loader">
        <div class="row justify-content-center">
            <div class="spinner-border" role="status"></div>
        </div>
    </div>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-coral" id="home-nav">
        <a href="/" class="navbar-brand link">Atomic Mailing</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-flex">
                <img src="/public/img/default-avatar.png" alt="">
                <div class="dropdown">
                    <a role="button" class="nav-link text-white dropdown-toggle" data-toggle="dropdown" id="menu">
                        John Doe
                    </a>
                    <div class="dropdown-menu">
                        <div class="d-flex dropdown-item">
                            <i class="fas fa-user mt-1 mr-2 text-muted"></i>
                            <a href="settings.php" class="text-muted link">Settings</a>
                        </div>
                        <div class="dropdown-item d-flex">
                            <i class="fa fa-cog text-muted mt-1 mr-2"></i>
                            <a href="account.php" class="text-muted link">Account</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Main content -->
    <main id="home-content">
        <div class="container-fluid">
            <div class="row">

                <!-- Dialogs -->
                <div class="col-lg-5 p-0" id="dialogs">

                    <div class="col-lg-12 p-4 m-0 d-flex dialog-1" id="dialog">
                        <div class="col-lg-2">
                            <img src="/public/img/default-avatar.png" alt="" class="w-100">
                        </div>
                        <div class="col-lg-10 text-left">
                            <p class="text-muted title mb-0">
                                New york times
                            </p>
                            <p class="text-muted preview-text font-weight-bold">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque, assumenda...
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-12 p-4 m-0 d-flex dialog-2" id="dialog">
                        <div class="col-lg-2">
                            <img src="/public/img/default-avatar.png" alt="" class="w-100">
                        </div>
                        <div class="col-lg-10 text-left">
                            <p class="text-muted title mb-0">
                                New york times
                            </p>
                            <p class="text-muted preview-text font-weight-bold">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque, assumenda...
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-12 p-4 m-0 d-flex dialog-3" id="dialog">
                        <div class="col-lg-2">
                            <img src="/public/img/default-avatar.png" alt="" class="w-100">
                        </div>
                        <div class="col-lg-10 text-left">
                            <p class="text-muted title mb-0">
                                New york times
                            </p>
                            <p class="text-muted preview-text font-weight-bold">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque, assumenda...
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-12 p-4 m-0 d-flex dialog-4" id="dialog">
                        <div class="col-lg-2">
                            <img src="/public/img/default-avatar.png" alt="" class="w-100">
                        </div>
                        <div class="col-lg-10 text-left">
                            <p class="text-muted title mb-0">
                                New york times
                            </p>
                            <p class="text-muted preview-text font-weight-bold">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque, assumenda...
                            </p>
                        </div>
                    </div>
                    
                </div>

                <!-- Message content -->
                <div class="col-lg-7 p-0" id="content">
                    <div class="preview text-center p-2">
                        <p class="display-4">
                            Click at dialog for start chating
                        </p>
                    </div>

                    <div class="col-lg-12 mt-4 d-none" id="messages-content">
                        <div class="col-lg-12 d-flex flex-row">
                            <div class="col-lg-1">
                                <img src="/public/img/default-avatar.png" class="w-100" alt="">
                            </div>
                            <div class="col-lg-11 text-left">
                                <p class="username">John Doe</p>
                                <p class="message">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius, dicta.
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-12 d-flex flex-row-reverse">
                            <div class="col-lg-1 text-right">
                                <img src="/public/img/default-avatar.png" class="w-100" alt="">
                            </div>
                            <div class="col-lg-11 text-right">
                                <p class="username">John Doe</p>
                                <p class="message">
                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius, dicta.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Message form -->
                    <div class="col-lg-12 bg-light p-1" id="message-form">
                        <form action="/" method="post">
                            <div class="form-group">
                                <textarea name="message" class="form-control" id="message" cols="30" rows="2"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-outline-danger btn-block text-uppercase ">
                                    <small>
                                        Send
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