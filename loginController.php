<?php
include_once("./connectDB.php");
session_start();
if (isset($_POST['btnCancel'])) {
    echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
}
if (isset($_GET['function']) && $_GET['function'] == 'login') {
    $email = $_POST['txtEmail'];
    $email = mysqli_real_escape_string($conn, $email);
    $pa = $_POST['txtPassword'];
    $err = "";
    /*echo "You are logged in with $us and password $pa";*/
    $pass = md5($pa);
    $res = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' and `password`='$pass'")  or die(mysqli_error($conn));
    if (mysqli_num_rows($res) == 1) {
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $_SESSION["us"] = $row["fullname"];
            $_SESSION["id"] = $row["student_id"];
        }
        echo "Hi ". $_SESSION["us"] ;//"<script> location.href='index.php?page=user'</script>";
        exit;
    } else {
        $res = mysqli_query($conn, "SELECT * FROM admin WHERE admin_email='$email' AND admin_pwd='$pass'") or die(mysqli_error($conn));
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        if (mysqli_num_rows($res) == 1) {
            $_SESSION['admin'] = $row["admin_name"];
            echo "Hi ". $_SESSION["admin"];//"<script> location.href='admin.php'</script>";
            exit;
        } else {
            echo "<script type='text/javascript'>alert('Login Fail');</script>";
            echo "<script> location.href='index.php?page=login'</script>";
            exit;
        }
    }
}