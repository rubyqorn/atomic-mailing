<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Oxanium&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="/public/css/app.css">
    <title>Settings</title>
</head>
<body >

    <main id="settings">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-8 rounded d-flex" id="account-settings">
                    <div class="col-lg-4 h-100 p-2 overlay" id="user-info">
                        <div class="text-center avatar-and-name p-2">
                            <img src="/public/img/default-avatar.png" class="w-50" alt="">
                            <p class="text-white font-weight-bold">
                                John Doe
                            </p>
                        </div>
                        <div class="resources border-top">
                            <div class="col mt-2 d-flex">
                                <i class="fab fa-twitter text-primary mt-1 mr-2"></i>
                                <a href="/" class="text-white font-weight-bold">
                                    <small>
                                        Twitter
                                    </small> 
                                </a>    
                            </div>
                            <div class="col mt-2 d-flex">
                                <i class="fab fa-vk text-info mt-1 mr-2"></i>
                                <a href="/" class="text-white font-weight-bold">
                                    <small>
                                        VKontakte
                                    </small> 
                                </a>    
                            </div>
                            <div class="col mt-2 d-flex">
                                <i class="fab fa-discord text-black mt-1 mr-3"></i>
                                <a href="/" class="text-white font-weight-bold">
                                    <small>
                                        Discord
                                    </small> 
                                </a>    
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 bg-light p-3">
                        <p class="h2 text-black font-weight-bold">
                            Account settings
                        </p>
                        <form action="/" class="mt-3" method="post" id="user-settings-form">
                            <div class="form-group border p-1">
                                <label for="name" class="control-label text-muted text-uppercase">
                                    <small>
                                        Name
                                    </small>
                                </label>
                                <input type="text" class="field" name="name" required>
                            </div>
                            <div class="form-group p-1 border">
                                <label for="email" class="control-label text-muted text-uppercase">
                                    <small>
                                        Email
                                    </small>
                                </label>
                                <input type="email" name="email" class="field" required>
                            </div>
                            <div class="form-group border p-1">
                                <label for="website" class="control-label text-muted text-uppercase">
                                    <small>
                                        Website
                                    </small>
                                </label>
                                <input type="text" class="field" name="website" placeholder="https://example.com">
                            </div>
                            <div class="form-group border p-1">
                                <label for="password" class="control-label text-uppercase text-muted">
                                    <small>
                                        Password
                                    </small>
                                </label>
                                <div class="d-flex">
                                    <input type="password" name="password" class="field" required>
                                    <i class="fas fa-eye text-muted mt-1 ml-1"></i>
                                </div>
                            </div>
                            <div class="form-group border p-1">
                                <label for="confirmation" class="control-label text-muted text-uppercase">
                                    <small>
                                        Confirmation
                                    </small>
                                </label>
                                <input type="password" name="confirmation" class="confirmation-field" required>
                            </div>
                            <div class="form-group d-flex flex-row-reverse">
                                <button type="submit" class="save-settings text-black text-uppercase">
                                    <small>
                                        Save
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