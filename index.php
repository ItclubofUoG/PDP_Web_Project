<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    if ($_GET['page'] != 'login' && $_GET['page'] != "") {
        $page = $_GET['page'];
        include_once("./Views/headerUser.html");
    }else {
        include('./Views/headerLogin.html');}
} else {
    include('./Views/headerLogin.html');
}

// if (!isset($_SESSION["us"]) && isset($_GET['page'])) {
//     echo "<script> location.href='index.php'</script>";
//     exit;
// }
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == 'home') {
        include_once("./Views/EventMonth.php");
    }
    else if ($page == 'changepass') {
        include_once("./Views/ChangePass.html");
    }
    else if ($page == 'changeinfo') {
        include_once("./Views/UpdateUserInfo.php");
    }
    else if ($page == 'attendence') {
        include_once("./Views/EventsAttendence.php");
    }
    // else if ($page == 'attendence') {
    //     include_once("./Views/EventsAttendence.php");
    // }
    else if ($page == 'login') {
        include_once("./Views/Login.html");
    }
    else if ($page == 'logout') {
        include_once("./Process/logout.php");
    }
    else {
        include("./Views/Login.html");
    }
} else {
    include("./Views/Login.html");
}
include('./Views/footer.html');
?>
