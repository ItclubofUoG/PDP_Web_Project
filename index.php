<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="./Assets/css/Index.css">
    <!-- <link rel="stylesheet" href="./Assets/css/Admin.css">
    <link rel="stylesheet" href="./Assets/css/ChangePass.css"> -->
    <link rel="stylesheet" href="./Assets/css/Login.css">
    <!-- <link rel="stylesheet" href="./Assets/css/ManageDevice.css">
    <link rel="stylesheet" href="./Assets/css/User.css"> -->
    <script src="./Assets/js/index.js"></script>
</head>

<div class="warpper">

    <?php
    session_start();
    include('./header_login.html');

    if (!isset($_SESSION["us"]) && isset($_GET['page'])) {
        echo "<script> location.href='index.php'</script>";
        exit;
    }
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if ($page == 'user') {
            include_once("user.php");
        }
        if ($page == 'ChangePass') {
            include_once("ChangePass.html");
        }
    } else {
        include("./Login.html");
    }
    include('./footer.html');
    ?>
</div>