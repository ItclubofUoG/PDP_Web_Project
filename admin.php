<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UoG Event Portal</title>

    <!-- The link below has needed to the site work    
        
        *Recommend to add all linking file in this site to loading all avoid the design error -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./Assets/css/pagination.css">
    <script src="./Assets/js/index.js"></script>
    <link rel="stylesheet" href="./Assets/css/Admin.css" />
    <link rel="stylesheet" href="./Assets/css/Index.css" />
    <link rel="stylesheet" href="./Assets/css/ChangePass.css" />
    <link rel="stylesheet" href="./Assets/css/ManageDevice.css" />
    <link rel="shortcut icon" href="./Assets/img/tablogo.jpg">

    <script src="https://cdn.tiny.cloud/1/h8hv8ok996dheuo25v0bvdvr8xy5wi21ucqwsnwskpx54apo/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>


    <!-- Customize scrollbar -->
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
            background: #2B3494;
        }
    </style>
</head>

<?php
session_start();
include('./Views/headerAdmin.html');
// if (!isset($_SESSION["admin"])) {
//     header("location: index.php?page=login");
// }
if (isset($_SESSION["admin"]) && isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == 'home') {
        include_once("./Views/ListofMembers.php");
    }
    if ($page == 'eventlog') {
        include_once("./Views/UserLogs.php");
    }
    if ($page == 'changepass') {
        include_once("./Views/ChangePass.html");
    }
    if ($page == 'student') {
        include_once("./Views/ManageStudent.php");
    }
    if ($page == 'admin') {
        include_once("./Views/ManageAdmin.php");
    }
    if ($page == 'major') {
        include_once("./Views/ManageMajor.php");
    }
    if ($page == 'course') {
        include_once("./Views/ManageCourse.php");
    }
    if ($page == 'event') {
        include_once("./Views/ManageEvent.php");
    }
    if ($page == 'device') {
        include_once("./Views/ManageDevice.php");
    }
    if ($page == 'description') {
        include_once("./Views/UpdateDescription.php");
    }
} else {
    echo "<script> location.href='./index.php'</script>";
    exit;
}


include('./Views/footer.html');

?>

</html>