<?php
require APPROOT . '/views/adminView/includes/head.php';
?>

<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center custom-login">
            <h3>Ro'yxatdan o'tish</h3>
            <p>Ro'yxatdan o'tish uchun berilgan formalarni to'ldiring.</p>
        </div>
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body">
                    <form action="<?php echo URLROOT; ?>/users/register" id="loginForm" method="POST">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" placeholder="username..." required>
                                <span class="help-block small danger"><?= $data['usernameError'] ?></span>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Email Address</label>
                                <input type="email" class="form-control" name="email" placeholder="email..." required>
                                <span class="help-block small danger"><?= $data['emailError'] ?></span>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" placeholder="password..." required>
                                <span class="help-block small danger"><?= $data['passwordError'] ?></span>
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Repeat Password</label>
                                <input type="password" class="form-control" name="confirmPassword" placeholder="confirm..." required>
                                <span class="help-block small danger"><?= $data['confirmPasswordError'] ?></span>
                            </div>

                        </div>
                        <div class="text-center">
                            <button class="btn btn-success loginbtn" type="submit">Register</button>
                            <button class="btn btn-default" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center login-footer">
            <p>Copyright © 2022. Akhmadov Blog </p>
        </div>
    </div>
</div>

<?php
require APPROOT . '/views/adminView/includes/footer.php';
?>