<?php
require APPROOT . '/views/adminView/includes/head.php';
?>
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>PLEASE LOGIN TO APP</h3>
				<p>This is the best app ever!</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="<?php echo URLROOT; ?>/users/login"  method="POST" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="username" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                                <span class="help-block small danger"><?= $data['usernameError'] ?></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                <span class="help-block small danger"><?= $data['passwordError']; ?></span>
                            </div>
                            <button type="submit" class="btn btn-success btn-block loginbtn">Login</button>
                            <a class="btn btn-default btn-block" href="<?= URLROOT . '/users/register' ?>">Register</a>
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