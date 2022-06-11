<?php include_once('./connectDB.php');
session_start();
if ($_SESSION["id"] != null) {
    $id = $_SESSION["id"];
}
if (isset($_GET['function']) && $_GET['function'] == 'update') {
    
    
    $email = $_POST['email'];
    $checkemail = mysqli_query($conn, "SELECT * FROM user WHERE student_id='$id'") or die(mysqli_error($conn));
    while ($row4 = mysqli_fetch_array($checkemail, MYSQLI_ASSOC)) {
        $email1 = $row4['email'];
    }
    if ($email != $email1) {
        $res3 = mysqli_query($conn, "SELECT * FROM user") or die(mysqli_error($conn));
        while ($row5 = mysqli_fetch_array($res3, MYSQLI_ASSOC)) {
            if ($email == $row5['email']) {
                echo "<script type='text/javascript'>alert('Email already exists');</script>";
                echo "<script> location.href='index.php?page=changeinfor'</script>";
                exit;
            }
        }
    }

    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    mysqli_query($conn, "UPDATE `user` SET `gender`='$gender',`email`='$email',`dob`='$dob' WHERE student_id='$id'") or die(mysqli_error($conn)) ;
    echo "<script type='text/javascript'>alert('Update successful');</script>";
    echo "<script> location.href='index.php?page=user'</script>";
   exit;
}
