<?php require_once __DIR__ . '/parts/header.php'; ?>
    
    <?php foreach($account as $settings): ?>
        <!-- Account content -->
        <main id="account">
            <!-- Account preview -->
            <div class="col-lg-12 p-0 bg-coral" id="user-background">
                <div class="col-lg-12 p-4 text-center">
                    <p class="display-4 text-white">
                        Hello, <?php echo $settings['name']; ?>
                    </p>
                    <div class="d-flex">
                        <img src="<?php echo $settings['img']; ?>" class="avatar" alt="">
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
                                <p class="text-black"><?php echo $settings['name']; ?></p>
                            </li>
                            <li class="user-item mt-4">
                                <p class="text-black"><?php echo !$settings['website'] ? 'Type your website' : $settings['website']; ?></p>
                            </li>
                            <li class="user-item mt-4">
                                <p class="text-black"><?php echo $settings['email']; ?></p>
                            </li>
                        </ul>

                        <div class="p-4 d-none alert alert-dismissible bg-danger fade show col-lg-6" id="message">
                            <button class="close" data-dismiss="alert">
                                <span>&times;</span>
                            </button>
                            <strong class="text-white"></strong>
                        </div>

                        <div class="d-none" id="edit-form">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control text-dark" value="<?php echo $settings['name']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control text-dark" name="website" value="<?php echo !$settings['website'] ? '' : $settings['website']; ?>" placeholder="Your website">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control text-dark" name="email" value="<?php echo $settings['email']; ?>">
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
                            <a href="<?php echo !$websites['0']['twitter'] ? '/home' : $websites['0']['twitter'];  ?>" class="social-link">Twitter</a>
                            <i class="fas fa-pen d-none" role="button" data-toggle="modal" data-target="#social-link-twitter"></i>
                        </li>
                        <li class="social-link-item d-flex mt-4">
                            <i class="fab fa-vk text-info mt-1 mr-2"></i>
                            <a href="<?php echo !$websites['0']['vk'] ? '/home' : $websites['0']['vk'];  ?>" class="social-link">Vkontakte</a>
                            <i class="fas fa-pen d-none" role="button" data-toggle="modal" data-target="#social-link-vk"></i>
                            </li>
                        <li class="social-link-item d-flex mt-4">
                            <i class="fab fa-discord text-black mt-1 mr-2"></i>
                            <a href="<?php echo !$websites['0']['discordapp'] ? '/home' : $websites['0']['discordapp'];  ?>" class="social-link">Discord</a>
                            <i class="fas fa-pen d-none" role="button" data-toggle="modal" data-target="#social-link-discord"></i>
                        </li>
                    </ul>

                </div>
                    
                </div>
            </div>

            <!-- Modal window for editing social link -->
            <div class="modal fade" id="social-link-twitter">
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

                                <div class="col-lg-12">
                                    <div class="alert alert-dismissible bg-danger fade show d-none" id="message">
                                        <button class="close" data-dismiss="alert">
                                            <span class="text-white">&times;</span>
                                        </button>
                                        <strong class="text-white"></strong>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="twitter" class="form-control" placeholder="https://twitter.com">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-primary btn-sm text-uppercase">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="social-link-vk">
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

                                <div class="col-lg-12">
                                    <div class="alert alert-dismissible bg-danger fade show d-none" id="message">
                                        <button class="close" data-dismiss="alert">
                                            <span class="text-white">&times;</span>
                                        </button>
                                        <strong class="text-white"></strong>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="vk" class="form-control" placeholder="https://vk.com">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-info btn-sm text-uppercase">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="social-link-discord">
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

                                <div class="col-lg-12">
                                    <div class="alert alert-dismissible bg-danger fade show d-none" id="message">
                                        <button class="close" data-dismiss="alert">
                                            <span class="text-white">&times;</span>
                                        </button>
                                        <strong class="text-white"></strong>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="discord" class="form-control" placeholder="https://discordapp.com">
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
    <?php endforeach; ?>
    
<?php require_once __DIR__ . '/parts/footer.php'; ?>