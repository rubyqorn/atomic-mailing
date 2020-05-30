<div class="col-lg-12">
    <?php foreach($dialog as $messages): ?>
        <div class="col-lg-12 mt-4 d-none" id="messages-content">
            <div class="col-lg-12 d-flex flex-row">
                <div class="col-lg-1">
                    <img src="/public/img/default-avatar.png" class="w-100" alt="">
                </div>
                <div class="col-lg-11 text-left">
                    <p class="username"><?php echo $messages['who_login'] ?></p>
                    <p class="message">
                        <?php echo $messages['message'] ?>
                    </p>
                </div>
            </div>
            <div class="col-lg-12 d-flex flex-row-reverse">
                <div class="col-lg-1 text-right">
                    <img src="/public/img/default-avatar.png" class="w-100" alt="">
                </div>
                <div class="col-lg-11 text-right">
                    <p class="username"><?php echo $messages['whom_login'] ?></p>
                    <p class="message">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eius, dicta.
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
