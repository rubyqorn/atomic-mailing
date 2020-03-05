<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Oxanium&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="/public/css/app.css">
    <title>Account</title>
</head>
<body>

    <!-- Account content -->
    <main id="account">
        <!-- Account preview -->
        <div class="col-lg-12 p-0 bg-coral" id="user-background">
            <div class="col-lg-12 p-4 text-center">
                <p class="display-4 text-white">
                    Hello, John
                </p>
                <div class="d-flex">
                    <img src="/public/img/default-avatar.png" class="avatar" alt="">
                </div>
            </div>
        </div>
        <!-- Tabs and user info -->
        <div class="container" id="user-info">
            <div class="row justify-content-center">

                <div class="col-lg-7" id="tabs">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item active-tab mr-1" id="default">
                            <p class="tab-link text-uppercase">
                                <small>
                                    Default info
                                </small>
                            </p>
                        </li>
                        <li class="nav-item" id="social">
                            <p class="tab-link text-uppercase">
                                <small>
                                    Social Links
                                </small>
                            </p>
                        </li>
                    </ul>
                </div>

                <!-- Block with deful user information -->
               <div class="col-lg-7 mt-4" id="default-info">
                   <form action="/" method="post">
                        <div class="form-group d-flex justify-content-end">
                            <button type="button" class="edit-button text-white mb-2">
                                <i class="fas fa-pen"></i>                            
                            </button>
                            <button type="submit" class="h-100 d-none save-edits text-white text-uppercase">
                                <small>
                                    Save
                                </small>
                            </button>
                        </div>

                        <ul class="user-default-content">
                            <li class="user-item mt-4">
                                <p class="text-black">John Doe</p>
                            </li>
                            <li class="user-item mt-4">
                                <p class="text-black">https://vk.com/rubyqorn</p>
                            </li>
                            <li class="user-item mt-4">
                                <p class="text-black">john@mail.com</p>
                            </li>
                        </ul>

                        <div class="d-none" id="edit-form">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control text-dark" value="John Doe">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control text-dark" name="website" value="https://vk.com/rubyqorn">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control text-dark" name="email" value="john@email.com">
                            </div>
                        </div>
                   </form>
                   
               </div> 

               <!-- Social links -->
               <div class="col-lg-7 mt-4 d-none" id="social-links">

                    <!-- Edit button -->
                    <div class="d-flex flex-row-reverse">
                        <button type="button" class="edit-button text-white mb-2">
                            <i class="fas fa-pen"></i>                            
                        </button>
                    </div>

                   <ul class="social-links-items">
                       <li class="social-link-item d-flex mt-4">
                           <i class="fab fa-twitter text-primary mt-1 mr-2"></i>
                           <a href="/" class="social-link">Twitter</a>
                           <i class="fas fa-pen d-none" role="button" data-toggle="modal" data-target="#social-link"></i>
                        </li>
                       <li class="social-link-item d-flex mt-4">
                           <i class="fab fa-vk text-info mt-1 mr-2"></i>
                           <a href="/" class="social-link">Vkontakte</a>
                           <i class="fas fa-pen d-none" role="button" data-toggle="modal" data-target="#social-link"></i>
                        </li>
                       <li class="social-link-item d-flex mt-4">
                           <i class="fab fa-discord text-black mt-1 mr-2"></i>
                           <a href="/" class="social-link">Discord</a>
                           <i class="fas fa-pen d-none" role="button" data-toggle="modal" data-target="#social-link"></i>
                        </li>
                   </ul>

               </div>
                
            </div>
        </div>

        <!-- Modal window for editing social link -->
        <div class="modal fade" id="social-link">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="text-muted">
                            Edit
                        </h5>
                        <button class="close" data-dismiss="modal" data-target="#social-link">
                            <span>&times;</span>
                        </button>
                    </div>
                    <form action="/" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="website" class="form-control" value="https://twitter.com">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-dark btn-sm text-uppercase">
                                Save
                            </button>
                        </div>
                    </form>
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