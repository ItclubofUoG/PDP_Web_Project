<?php
//Delele the device
include('../connectDB.php');
if (isset($_GET['function']) && $_GET['function'] == 'delete') {
    $id = $_GET['deviceid'];
    mysqli_query($conn, "DELETE FROM device WHERE id=$id");
    echo "<script> location.href='../admin.php?page=device'</script>";
    exit;
}
// Checking duplicate and add new device
if (isset($_GET['function']) && $_GET['function'] == 'add') {
    $dev_name = $_POST['adddevicename'];
    $dev_dep = $_POST['adddevicedep'];
    $token = random_bytes(8);
    $dev_token = bin2hex($token);

    $sql = "SELECT * FROM device WHERE device_name ='$dev_name'";
    $checkingExisted = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    if(mysqli_num_rows($checkingExisted)== 0) {
        $sql = "INSERT INTO device (device_name, device_uid, device_date, device_dep, device_mode) VALUES('$dev_name', '$dev_token', CURDATE(), '$dev_dep', 0)";
        mysqli_query($conn, $sql);
        echo "<script> location.href='../admin.php?page=device'</script>";
        exit;
        mysqli_stmt_close($result);
        mysqli_close($conn);
    } else { 
        $err = "<li>Duplicate</li>";
        echo '<script type="text/javascript">window.alert("Duplicate");</script>';
    }
}
//Reload Function
if (isset($_GET['function']) && $_GET['function'] == 'reload') {
    $dev_id = $_GET['deviceid'];
    
    $token = random_bytes(8);
    $dev_token = bin2hex($token);

    $sql = "UPDATE device SET device_uid=? WHERE id=?";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo '<p class="alert alert-danger">SQL Error</p>';
    } else {
        mysqli_stmt_bind_param($result, "si", $dev_token,  $dev_id);
        mysqli_stmt_execute($result);
        echo "<script> location.href='../admin.php?page=device'</script>";
        exit;
    }
    mysqli_stmt_close($result);
    mysqli_close($conn);
}
//Set dev_mode of device    
if (isset($_GET['function']) && $_GET['function'] == 'updatemode') {
    if (isset($_POST['btn_enroll'])){
        $dev_mode = 0;
    }        
    else {
        $dev_mode = 1;
    }
    $dev_id = $_GET['deviceid'];
    $sql = "UPDATE `device` SET `device_mode`= '$dev_mode' WHERE id='$dev_id'";
    mysqli_query($conn,$sql);
    echo "<script> location.href='../admin.php?page=device'</script>";
    exit;

    // if (isset($_POST['btn_enroll']))
    //     $dev_mode = 0;
    // else {
    //     $dev_mode = 1;
    // }
    // $dev_id = $_GET['deviceid'];

    // $sql = "UPDATE device SET device_mode=? WHERE id=?";
    // $stmt = mysqli_stmt_init($conn);
    // if (!mysqli_stmt_prepare($stmt, $sql)) {
    //     echo '<p class="alert alert-danger">SQL Error</p>';
    // } else {
    //     mysqli_stmt_bind_param($stmt, "ii", $dev_mode, $dev_id);
    //     mysqli_stmt_execute($stmt);
    //     echo 1;
    // }
    // echo "<script> location.href='../admin.php?page=device'</script>";
    // exit;
}


?>