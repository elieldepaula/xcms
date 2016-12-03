<?php echo form_open("admin/auth/login", array('class' => 'form-signin'));?>
    <h2 class="form-signin-heading">Please sign in</h2>
    <div id="infoMessage"><?php echo $message;?></div>
    <label for="inputEmail" class="sr-only">Email address</label>
    <?php echo form_input($identity);?>
    <label for="inputPassword" class="sr-only">Password</label>
    <?php echo form_input($password);?>
    <div class="checkbox">
        <label>
            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    <p><a href="forgot_password" class="btn btn-link">Esqueci minha senha</a></p>
<?= form_close(); ?>