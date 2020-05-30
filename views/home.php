<?php require_once __DIR__ . '/parts/header.php' ?>

    <!-- Loader -->
    <div class="container d-none" id="loader">
        <div class="row justify-content-center">
            <div class="spinner-border" role="status"></div>
        </div>
    </div>
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-coral" id="home-nav">
        <a href="/" class="navbar-brand link mt-1">Atomic Mailing</a>
        <ul class="navbar-nav">
            <li class="nav-item mt-2 ml-4" id="search-icon">
                <i class="fa fa-search text-white"></i>
            </li>
            <li class="nav-item d-none">
                <form action="/" method="post" id="search-form">
                    <div class="form-group m-0">
                        <input type="search" name="search-users" class="search-field text-white" placeholder="@user">
                    </div>
                </form>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">

            <?php foreach($user as $user): ?>

                <li class="nav-item d-flex">
                    <img src="<?php echo $user['img']; ?>" alt="">
                    <div class="dropdown">
                        <a role="button" class="nav-link text-white dropdown-toggle" data-toggle="dropdown" id="menu">
                            <?php echo $user['name']; ?>
                        </a>
                        <div class="dropdown-menu">
                            <div class="d-flex dropdown-item">
                                <i class="fa fa-sign-out-alt text-muted mt-1 mr-2"></i>
                                <a href="/logout" class="text-muted">Logout</a>
                            </div>
                            <div class="d-flex dropdown-item">
                                <i class="fas fa-user mt-1 mr-2 text-muted"></i>
                                <a href="/settings" class="text-muted link">Settings</a>
                            </div>
                            <div class="dropdown-item d-flex">
                                <i class="fa fa-cog text-muted mt-1 mr-2"></i>
                                <a href="/account" class="text-muted link">Account</a>
                            </div>
                        </div>
                    </div>
                </li>

            <?php endforeach; ?>

        </ul>
    </nav>

    <!-- Main content -->
    <main id="home-content">
        <div class="container-fluid">
            <div class="row">

                <!-- Dialogs -->
                <div class="col-lg-5 p-0" id="dialogs">

                    <?php foreach($messages as $message): ?>
                        <div class="col-lg-12 p-4 m-0 d-flex dialog-<?php echo $message['dialog_id']?>" id="dialog">
                            <div class="col-lg-2">
                                <img src="<?php echo $message['img'] ?>" alt="" class="w-100">
                            </div>
                            <div class="col-lg-10 text-left">
                                <p class="text-muted title mb-0">
                                    <?php echo $message['name']; ?>
                                </p>
                                <p class="text-muted preview-text font-weight-bold">
                                    <?php echo $message['message']; ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

                <!-- Message content -->
                <div class="col-lg-7 p-0" id="content">
                    <div class="col-lg-12">
                        <div class="preview text-center p-2">
                            <p class="display-4">
                                Click at dialog for start chating
                            </p>
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
        </div>
    </main>


<?php require_once __DIR__ . '/parts/footer.php' ?>