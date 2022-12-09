<?php
include_once("./connectDB.php");
if (isset($_POST['btnCancel'])) {
    echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
}
if (isset($_GET['functions']) && $_GET['functions'] == 'loginSetcookie') {
    $email = $_POST['email-login'];
    $email = mysqli_real_escape_string($conn, $email);
    $pa = $_POST['password'];
    $err = "";
    $pass = md5($pa);

    if (isset($_POST['selector'])) {
		setcookie("email", $email, time() + (86400 * 30), "/");
		setcookie("password", $pa, time() + (86400 * 30), "/");
	}
    
    $res = mysqli_query($conn, "SELECT * FROM user WHERE email='$email' and `password`='$pass'")  or die(mysqli_error($conn));
    if (mysqli_num_rows($res) == 1) {
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            session_start();
            $_SESSION["us"] = $row["fullname"];
            $_SESSION["id"] = $row["student_id"];
        }
        echo "<script> location.href='./index.php?page=home'</script>";
        exit;
    } else {
        $res = mysqli_query($conn, "SELECT * FROM admin WHERE admin_email='$email' AND admin_pwd='$pass'") or die(mysqli_error($conn));
        $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
        if (mysqli_num_rows($res) == 1) {
            session_start();
            $_SESSION['admin'] = $row["admin_email"];
            echo "<script> location.href='./admin.php?page=home'</script>";
            exit;
        } else {
            echo "<script type='text/javascript'>alert('Login Fail');</script>";
            echo "<script> location.href='./index.php?page=login'</script>";
            exit;
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>UoG Event Portal</title>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./Assets/css/Index.css">
    <link rel="stylesheet" href="./Assets/css/Login.css">
    <link rel="stylesheet" href="./Assets/css/User.css">
    <link rel="stylesheet" href="./Assets/css/Admin.css">
    <link rel="stylesheet" href="./Assets/css/ChangePass.css">
    <link rel="stylesheet" href="./Assets/css/ManageDevice.css">
    <link rel="shortcut icon" href="./Assets/img/tablogo.jpg">

    <!-- Custom scrollbar -->
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 8px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 8px gray;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: blue;
        }
    </style>

    <script src="./Assets/js/index.js"></script>
</head>



<?php
session_start();

if (isset($_GET['page'])) {
    if (isset($_SESSION["us"]) && $_GET['page'] != 'login' && $_GET['page'] != 'logout' && $_GET['page'] != "") {
        $page = $_GET['page'];
        include_once("./Views/headerUser.html");
    } else {
        include('./Views/headerLogin.html');
    }
} else {
    include('./Views/headerLogin.html');
}


if (isset($_SESSION["us"]) && isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == 'home') {
        include_once("./Views/EventMosnth.php");
    } else if ($page == 'changepass') {
        include_once("./Views/ChangePass.html");
    } else if ($page == 'changeinfo') {
        include_once("./Views/UpdateUserInfo.php");
    } else if ($page == 'attendence') {
        include_once("./Views/EventsAttendence.php");
    }
    // else if ($page == 'attendence') {
    //     include_once("./Views/EventsAttendence.php");
    // }
    else if ($page == 'login') {
        include_once("./Views/LoginForm.php");
    } else if ($page == 'logout') {
        include_once("./Process/logout.php");
    } else {
        include("./Views/LoginForm.php");
    }
} else {
    include("./Views/LoginForm.php");
}
include('./Views/footer.html');
?>