<?php require_once __DIR__ . '/parts/header.php'; ?>

    <?php foreach($settings as $item): ?>
        <main id="settings">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-8 rounded d-flex" id="account-settings">
                        <div class="col-lg-4 h-100 p-2 overlay" id="user-info">
                            <div class="text-center avatar-and-name p-2">
                                <img src="<?php echo $item['img']; ?>" class="w-50" alt="">
                                <p class="text-white font-weight-bold">
                                    <?php echo $item['name']; ?>
                                </p>
                            </div>
                            <div class="resources border-top">

                                <?php if($websites['0']['twitter'] !== null): ?>
                                    <div class="col mt-2 d-flex">
                                        <i class="fab fa-twitter text-primary mt-1 mr-2"></i>
                                        <a href="<?php echo $websites['0']['twitter']; ?>" class="text-white font-weight-bold">
                                            <small>
                                                Twitter
                                            </small> 
                                        </a>    
                                    </div>
                                <?php endif;?>

                                <?php if($websites['0']['vk'] !== null): ?>
                                    <div class="col mt-2 d-flex">
                                        <i class="fab fa-vk text-info mt-1 mr-2"></i>
                                        <a href="<?php echo $websites['0']['vk']; ?>" class="text-white font-weight-bold">
                                            <small>
                                                VKontakte
                                            </small> 
                                        </a>    
                                    </div>
                                <?php endif; ?>

                                <?php if($websites['0']['discordapp'] !== null): ?>
                                    <div class="col mt-2 d-flex">
                                        <i class="fab fa-discord text-black mt-1 mr-3"></i>
                                        <a href="<?php echo $websites['0']['discordapp']; ?>" class="text-white font-weight-bold">
                                            <small>
                                                Discord
                                            </small> 
                                        </a>    
                                    </div>
                                <?php endif; ?>

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
                                    <input type="text" class="field" name="name" placeholder="John Doe" value="<?php echo $item['name']; ?>" required>
                                </div>
                                <div class="form-group p-1 border">
                                    <label for="email" class="control-label text-muted text-uppercase">
                                        <small>
                                            Email
                                        </small>
                                    </label>
                                    <input type="email" name="email" class="field" placeholder="example@mail.com" value="<?php echo $item['email']; ?>" readonly>
                                </div>
                                <div class="form-group border p-1">
                                    <label for="website" class="control-label text-muted text-uppercase">
                                        <small>
                                            Website
                                        </small>
                                    </label>
                                    <input type="text" class="field" name="website" value="<?php !$item['website'] ?? '' ?>" placeholder="https://example.com">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="code">
                                </div>
                                <div class="form-group border p-1">
                                    <label for="password" class="control-label text-uppercase text-muted">
                                        <small>
                                            Password
                                        </small>
                                    </label>
                                    <div class="d-flex">
                                        <input type="password" name="password" class="field" placeholder="6 symbols required">
                                        <i class="fas fa-eye text-muted mt-1 ml-1"></i>
                                    </div>
                                </div>
                                <div class="form-group border p-1" id="password-confirmation">
                                    <label for="confirmation" class="control-label text-muted text-uppercase">
                                        <small>
                                            Confirmation
                                        </small>
                                    </label>
                                    <input type="password" name="confirmation" class="confirmation-field">
                                    <p class="text-danger d-none">
                                        <small></small>
                                    </p>
                                </div>
                                <div class="form-group border p-1 d-none" id="code">
                                    <label for="confirmation" class="control-label text-muted text-uppercase">
                                        <small>
                                            Code
                                        </small>
                                    </label>
                                    <input type="text" name="code_confirm" class="confirmation-field" required>
                                    <p class="text-danger d-none">
                                        <small></small>
                                    </p>
                                </div>
                                <div class="form-group d-flex flex-row-reverse">
                                    <button type="submit" id="password-confirm-btn" class="save-settings text-black text-uppercase">
                                        <small>
                                            Save
                                        </small>
                                    </button>
                                    <button type="submit" id="code-confirm-btn" class="d-none btn btn-outline-danger text-uppercase">
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
    <?php endforeach; ?>

<?php require_once __DIR__ . '/parts/footer.php'; ?>