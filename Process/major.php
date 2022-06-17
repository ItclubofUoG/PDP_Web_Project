<?php
include_once("../connectDB.php");
//Add function

if (isset($_GET['function']) && $_GET['function'] == 'addMajor') {
    $major = $_POST['addmajorname'];
    $res = mysqli_query($conn, "SELECT * FROM major WHERE major_name='$major'") or die(mysqli_error($conn));
    if (mysqli_num_rows($res) >= 1) {
        echo "<script type='text/javascript'>alert('Major name already exists');</script>";
        echo "<script> location.href='../admin.php?page=major'</script>";
        exit;
    } else {
        mysqli_query($conn, "INSERT INTO `major`(`major_name`) VALUES ('$major')") or die(mysqli_error($conn));
        echo "<script> location.href='../admin.php?page=major'</script>";
        exit;
    }
}
//Update function
if (isset($_GET['function']) && $_GET['function'] == 'updateMajor') {
    $id = $_POST['updatemajorid'];
    $major = $_POST['updatemajorname'];

    $res = mysqli_query($conn, "SELECT * FROM major WHERE major_name='$major'") or die(mysqli_error($conn));
    if (mysqli_num_rows($res) >= 1) {
        echo "<script type='text/javascript'>alert('Major name already exists');</script>";
        echo "<script> location.href='../admin.php?page=major'</script>";
        exit;
    } else {
        mysqli_query($conn, "UPDATE `major` SET `major_name`='$major' WHERE major_id='$id'") or die(mysqli_error($conn));
        echo "<script> location.href='../admin.php?page=major'</script>";
        exit;
    }
}
//remove function
if (isset($_GET['function']) && $_GET['function'] == 'deleteMajor') {
    $name = $_GET['id'];
    $sql = "SELECT * FROM `major` WHERE `major_id` = '$name'";

    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $id = mysqli_fetch_array($result);
    $major_id = $id['major_id'];
    $sql = "SELECT * FROM `user` WHERE `major_id` = '$major_id'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    while ($row = mysqli_fetch_array($result)) {
        $student_id = $row['student_id'];
        $sql = "DELETE FROM `user_log` WHERE student_id = '$student_id'";
        mysqli_query($conn, $sql);
    }
    $sql = "DELETE FROM `user` WHERE `major_id` = '$major_id'";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM `major` WHERE `major_id` = '$major_id'";
    mysqli_query($conn, $sql);
    echo "<script type='text/javascript'>alert('Delete successfully');</script>";
    echo "<script> location.href='../admin.php?page=major'</script>";
}
