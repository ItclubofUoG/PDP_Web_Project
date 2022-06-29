
<?php
session_start();
include_once("../connectDB.php");

if (isset($_SESSION['id'])) {
    $name = $_SESSION['us'];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE fullname='$name'") or die(mysqli_error($conn));
} else {
    $name = $_SESSION['admin'];
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE admin_email='$name'") or die(mysqli_error($conn));
}

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    if (isset($_SESSION['us'])) {
        $pass = $row['password'];
    } else {
        $pass = $row['admin_pwd'];
    }
}
if (isset($_GET['function']) && $_GET['function'] == 'changePassword') {
    $oldPass = $_POST["oldpass"];
    $newPass = $_POST["newpassword"];
    $confirmPass = $_POST["confirmpassword"];


    if (md5($oldPass) != $pass) {
        echo "<script>alert('Old password is not correct')</script>";
        if (isset($_SESSION['admin'])) {
            echo "<script> location.href='../admin.php?page=changepass'</script>";
        } else {
            echo "<script> location.href='../index.php?page=changepass'</script>";
        }
        exit;
    } else {
        $pwd = md5($confirmPass);
        if (isset($_SESSION['us'])) {
            mysqli_query($conn, "UPDATE user SET `password` = '$pwd' WHERE fullname = '$name'") or die(mysqli_error($conn));
        } else {
            mysqli_query($conn, "UPDATE `admin` SET `admin_pwd` = '$pwd' WHERE admin_email = '$name'") or die(mysqli_error($conn));
        }

        echo "<script>alert('Change password success')</script>";

        if (isset($_SESSION['admin'])) {
            echo "<script> location.href='../admin.php?page=home'</script>";
        } else {
            echo "<script> location.href='../index.php?page=home'</script>";
        }
        exit;
    }
}
?>