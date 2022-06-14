<?php

if (isset($_POST['btnCancel'])) {
    echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
}
if (isset($_POST['btn_login'])) {
    $email = $_POST['email-login'];
    $email = mysqli_real_escape_string($conn, $email);
    $pa = $_POST['password'];
    $err = "";
    $pass = md5($pa);
    $res = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' and `password`='$pass'")  or die(mysqli_error($conn));
    if (mysqli_num_rows($res) == 1) {
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $_SESSION["us"] = $row["fullname"];
            $_SESSION["id"] = $row["student_id"];
            echo "<script> location.href='index.php?page=userPage'</script>";
        }
        exit;
    } else {
        $res = mysqli_query($conn, "SELECT * FROM admin WHERE admin_email='$email' AND admin_pwd='$pass'") or die(mysqli_error($conn));
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        if (mysqli_num_rows($res) == 1) {
            $_SESSION['admin'] = $row["admin_name"];
            // echo "<script> location.href='index.php?page=adminPage'</script>";
            echo "<script> alert('Login success');</script>";

            exit;
        } else {
            echo "<script type='text/javascript'>alert('Login Fail');</script>";
            echo "<script> location.href='index.php'</script>";
            exit;
        }
    }
}
?>



<div class="login-wrapper">
    <form class="login-form" action="../Process/login.php" method="post">
        <div class="login-title">LOGIN</div>
        <div class="login-item">
            <input type="email" id="email-login" name="email-login" class="login-input email" placeholder="✉️ Email">
            <span class="alert-error"></span>
            <span class="alert"></span>
        </div>
        <div class="login-item">
            <input type="password" id="password" name="password" class="login-input" placeholder="🔑 Password">
            <span class="alert-error"></span>
        </div>
        <div>
            <input type="submit" value="Login" class="login-btn" id="btn_login" name="btn_login">
        </div>
    </form>
</div>


<script src="./Assets/js/ValidationLogin.js"></script>
<script src="./Assets/js/Validation.js"></script>

<script>
    Validator({
        form: '.login-form',
        formGroupSelector: '.login-item',
        errorSelector: '.alert-error',
        rules: [
            Validator.isRequired('#password', 'This field can not empty'),
            Validator.isRequired('#email-login', 'This field can not empty'),
            Validator.isPassword('#password', 6, 20, 'Password must be 6 to 20 characters'),
        ],
    });
</script>