<div class="login-wrapper">
    <form class="login-form" action="./index.php?functions=loginSetcookie" method="POST">
        <div class="login-title">LOGIN</div>
        <div class="login-item">
            <input style="font-size:15px;" type="email" id="email-login" name="email-login" class="login-input email-login" placeholder="✉️ Email" value="<?php $userName = isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; echo "{$userName}" ?>">
            <span class="alert-error-log-in"></span>
            <span class="alert"></span>
        </div>
        <div class="login-item">
            <input style="font-size:15px;" type="password" id="password" name="password" class="login-input" placeholder="🔑 Password" value="<?php $password = isset($_COOKIE['password']) ? $_COOKIE['password'] : ''; echo "{$password}" ?>">
            <span class="alert-error-log-in"></span>
        </div>

        <div class="login-item">
            <div class="creat_account">
                <?php
                if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
                    echo '<input type="checkbox" id="f-option2" name="selector" value="1" checked>';
                } else {
                    echo '<input type="checkbox" id="f-option2" name="selector" value="1">';
                }
                ?>
                <label for="f-option2">Remember me</label>
            </div>
        </div>
        <div>
            <input type="submit" value="Login" class="login-btn" id="btn_login" name="btn_login">
        </div>
    </form>
</div>


<script src="./Assets/js/ValicationLogin.js"></script>
<script src="./Assets/js/Validation.js"></script>
<script>
    Validator({
        form: '.login-form',
        formGroupSelector: '.login-item',
        errorSelector: '.alert-error-log-in',
        rules: [
            Validator.isRequired('#password', 'This field can not empty'),
            Validator.isRequired('#email-login', 'This field can not empty'),
            Validator.isPassword('#password', 6, 20, 'Password must be 6 to 20 characters'),
        ],
    });
</script>