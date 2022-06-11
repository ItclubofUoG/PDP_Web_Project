<?php
include_once("./connectDB.php");
//Add function

if (isset($_POST['btn_add']) && $_POST['btn_add'] = 'add') {
    $major = $_POST['major_name'];
    $res = mysqli_query($conn, "SELECT * FROM major WHERE major_name='$major'") or die(mysqli_error($conn));
    if (mysqli_num_rows($res) >= 1) {
        echo "<script type='text/javascript'>alert('Majorname already exists');</script>";
        echo "<script> location.href='admin.php?page=managecourse'</script>";
        exit;
    } else {
        mysqli_query($conn, "INSERT INTO `major`(`major_name`) VALUES ('$major')") or die(mysqli_error($conn));
        echo "<script> location.href='admin.php?page=manageusercourse'</script>";
        exit;
    }
}
//Update function
if (isset($_POST['btn_update']) && $_POST['btn_update'] = 'update') {
    $id = $_POST['major_id'];
    $major = $_POST['major_name'];
    $res = mysqli_query($conn, "SELECT * FROM major WHERE major_id='$id'") or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $major1 = $row['major_name'];
    }
    if ($major != $major1) {
        $res3 = mysqli_query($conn, "SELECT * FROM major") or die(mysqli_error($conn));
        while ($row5 = mysqli_fetch_array($res3, MYSQLI_ASSOC)) {
            if ($major == $row5['major_name']) {
                echo "<script type='text/javascript'>alert('Majorname already exists');</script>";
                echo "<script> location.href='admin.php?page=managecourse'</script>";
                exit;
            }
        }
    } else {
        mysqli_query($conn, "UPDATE `major` SET `major_name`='$major' WHERE major_id='$id'") or die(mysqli_error($conn));
        echo "<script> location.href='admin.php?page=manageusercourse'</script>";
        exit;
    }
}
//remove function
if (isset($_GET['major_id'])) {
    $stuid = $_GET['major_id'];
    mysqli_query($conn, "DELETE FROM `major` WHERE major_id='$id'") or die(mysqli_error($conn));
    echo "<script> location.href='admin.php?page=manageusercourse'</script>";
    exit;
}
