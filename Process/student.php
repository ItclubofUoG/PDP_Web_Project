<?php

include_once("../connectDB.php");

//Update function
if (isset($_GET['btn_update'])) {
    $username = $_POST['fullname'];
    $id = $_POST['student_id'];
    $res = mysqli_query($conn, "SELECT * FROM user WHERE student_id='$id'") or die(mysqli_error($conn));
    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        $us = $row['fullname'];
    }
    if ($us != $username) {
        $res1 = mysqli_query($conn, "SELECT * FROM user") or die(mysqli_error($conn));
        while ($row1 = mysqli_fetch_array($res1, MYSQLI_ASSOC)) {
            if ($username == $row1['fullname']) {
                echo "<script type='text/javascript'>alert('Username already exists');</script>";
                echo "<script> location.href='../admin.php?page=student'</script>";
                exit;
            }
        }
    }
    $stid = $_POST['student_id'];
    $checkstid = mysqli_query($conn, "SELECT * FROM user WHERE student_id='$id'") or die(mysqli_error($conn));
    while ($row2 = mysqli_fetch_array($checkstid, MYSQLI_ASSOC)) {
        $stid1 = $row2['student_id'];
    }
    if ($stid != $stid1) {
        $res2 = mysqli_query($conn, "SELECT * FROM user") or die(mysqli_error($conn));
        while ($row3 = mysqli_fetch_array($res2, MYSQLI_ASSOC)) {
            if ($stid == $row3['student_id']) {
                echo "<script type='text/javascript'>alert('StudentID already exists');</script>";
                echo "<script> location.href='../admin.php?page=student'</script>";
                exit;
            }
        }
    }
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
                echo "<script> location.href='../admin.php?page=student'</script>";
                exit;
            }
        }
    }
    $phone = $_POST['phone'];
    $checkphone = mysqli_query($conn, "SELECT * FROM user WHERE student_id='$id'") or die(mysqli_error($conn));
    while ($row4 = mysqli_fetch_array($checkphone, MYSQLI_ASSOC)) {
        $phone1 = $row4['phone'];
    }
    if ($phone != $phone1) {
        $res3 = mysqli_query($conn, "SELECT * FROM user") or die(mysqli_error($conn));
        while ($row5 = mysqli_fetch_array($res3, MYSQLI_ASSOC)) {
            if ($phone == $row5['phone']) {
                echo "<script type='text/javascript'>alert('Phone already exists');</script>";
                echo "<script> location.href='../admin.php?page=student'</script>";
                exit;
            }
        }
    }
    $major = $_POST['major'];
    if ($major == 1) {
        echo "<script type='text/javascript'>alert('Invalid Major');</script>";
        echo "<script> location.href='../admin.php?page=student'</script>";
        exit;
    }
    $course = $_POST['course'];
    if ($major == 1) {
        echo "<script type='text/javascript'>alert('Invalid Course');</script>";
        echo "<script> location.href='../admin.php?page=student'</script>";
        exit;
    } else {
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $cart_uid = $_POST['cart_uid'];
        mysqli_query($conn, "UPDATE `user` SET `student_id`='$stid',`fullname`='$username',`phone`='$phone',`gender`='$gender',`email`='$email',`dob`='$dob'`major_id`='$major',`course_id`='$course' WHERE student_id='$id'");
        echo "<script> location.href='../admin.php?page=student'</script>";
        exit;
    }
}
//remove function
if (isset($_GET['stid'])) {
    $stuid = $_GET['stid'];
    mysqli_query($conn, "DELETE FROM `user_log` WHERE student_id='$stuid'");
    mysqli_query($conn, "DELETE FROM `user` WHERE student_id='$stuid'");
    echo "<script> location.href='../admin.php?page=student'</script>";
    exit;
}
