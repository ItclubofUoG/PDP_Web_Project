<?php include_once('../connectDB.php');
session_start();
if ($_SESSION["id"] != null) {
    $id = $_SESSION["id"];
}
if (isset($_GET['function']) && $_GET['function'] == 'updateInfo') {
    
    
    $phone = $_POST['stuPhone'];
    $checkPhone = mysqli_query($conn, "SELECT * FROM user WHERE student_id='$id'") or die(mysqli_error($conn));
    while ($row4 = mysqli_fetch_array($checkPhone, MYSQLI_ASSOC)) {
        $phone1 = $row4['phone'];
    }
    if ($phone != $phone1) {
        $res3 = mysqli_query($conn, "SELECT * FROM user") or die(mysqli_error($conn));
        while ($row5 = mysqli_fetch_array($res3, MYSQLI_ASSOC)) {
            if ($phone == $row5['phone']) {
                echo "<script type='text/javascript'>alert('Phone number already exists, please change another phone');</script>";
                echo "<script> location.href='../index.php?page=changeinfo'</script>";
                exit;
            }
        }
    }

    $dob = $_POST['stuDoB'];
    $gender = $_POST['gender'];
    $phone= $_POST['stuPhone'];
    $major = $_POST['stuMajor'];
    mysqli_query($conn, "UPDATE `user` SET `gender`='$gender', `dob`='$dob',phone='$phone',major_id='$major' WHERE student_id='$id'") or die(mysqli_error($conn)) ;
    echo "<script type='text/javascript'>alert('Update successful');</script>";
    echo "<script> location.href='../index.php?page=home'</script>";
   exit;
}
