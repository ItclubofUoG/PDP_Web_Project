<?php
include_once('../connectDB.php');

// Add admin function
if (isset($_GET['function']) && $_GET['function'] == 'addAdmin') {
    $name = $_POST['adnameadd'];
    $email = $_POST['admailadd'];
    $pass = '25d55ad283aa400af464c76d713c07ad';

    $res = mysqli_query($conn, "SELECT * FROM admin WHERE admin_email = '$email'") or die(mysqli_error($conn));
    if (mysqli_num_rows($res) >= 1) {
        echo "<script type='text/javascript'>alert('Email admin already exists');</script>";
        echo "<script> location.href='../admin.php?page=admin'</script>";
        exit;
    } else {
        mysqli_query($conn, "INSERT INTO `admin` (admin_name, admin_email,admin_pwd) VALUES ('$name','$email','$pass')") or die(mysqli_error($conn));
        echo "<script> location.href='../admin.php?page=admin'</script>";
        exit;
    }
}


//update admin function
if (isset($_GET['function']) && $_GET['function'] == 'updateAdmin') {
    $id = $_POST['adIDupdate'];
    $name = $_POST['adnameupdate'];
    $email = $_POST['admailupdate'];

    $res = mysqli_query($conn, "SELECT * FROM admin WHERE id != '$id' and admin_email='$email'") or die(mysqli_error($conn));
    if (mysqli_num_rows($res) >= 1) {
        echo "<script type='text/javascript'>alert('Admin email already exists');</script>";
        echo "<script> location.href='../admin.php?page=admin'</script>";
    } else {
        mysqli_query($conn, "UPDATE `admin` SET `admin_name`='$name', admin_email = '$email' WHERE id='$id'") or die(mysqli_error($conn));
        echo "<script> location.href='../admin.php?page=admin'</script>";
        exit;
    }
}


//Delete admin function
if (isset($_GET['function']) && $_GET['function'] == 'deleteAdmin') {
    $id=$_GET['id'];
    mysqli_query($conn,"DELETE from admin where id='$id'");
    echo "<script>alert('Delete admin successfully')</script>";
    echo "<script> location.href='../admin.php?page=admin'</script>";

}
