<?php
include_once("../connectDB.php");
//add  function
if (isset($_GET['function']) && $_GET['function'] == 'addEvent') {
    $title = $_POST['eventtitle'];
    $date = $_POST['eventdate'];
    $timeStart = $_POST['eventtimestart'];
    $timeEnd = $_POST['eventtimeend'];
    $location = $_POST['eventlocation'];
    $score = $_POST['eventscore'];
    $pic = $_FILES['eventimage'];

    if ($pic['type'] == "image/jpg" || $pic['type'] == "image/jpeg" || $pic['type'] == "image/png" || $pic['type'] == "image/gif") {
        $image = $pic['name'];

        $sql = "SELECT * from event where image = '$image'";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            copy($pic['tmp_name'], "../Assets/Image/" . $pic['name']);
            mysqli_query($conn, "INSERT INTO `event`(`event_title`, `date`, `location`, `score`, `time_start`, `time_end`, `image`) VALUES ('$title','$date','$location','$score','$timeStart','$timeEnd','$image')");
            echo "<script> location.href='../admin.php?page=event'</script>";
            exit;
        } else {
            echo "<script>alert('Image name already exist, please change file name before upload!')</script>";
            echo "<script> location.href='../admin.php?page=event'</script>";
        }
    }
}
//update function
if (isset($_GET['function']) && $_GET['function'] == 'updateEvent') {
    $title = $_POST['updatetitle'];
    $event_id = $_POST['eventID'];
    $date = $_POST['updatedate'];
    $timeStart = $_POST['updatetimestart'];
    $timeEnd = $_POST['updatetimeend'];
    $location = $_POST['updatelocation'];
    $score = $_POST['updatescore'];
    $pic = $_FILES['updateimage'];
    $image = $pic['name'];


    if ($pic['name'] != "") {
        if ($pic['type'] == "image/jpg" || $pic['type'] == "image/jpeg" || $pic['type'] == "image/png" || $pic['type'] == "image/gif") {
            copy($pic['tmp_name'], "../Assets/Image/" . $pic['name']);
            mysqli_query($conn, "UPDATE `event` SET`event_title`='$title',`date`='$date',`location`='$location',`score`='$score',`time_start`='$timeStart',`time_end`='$timeEnd',`image`='$image' WHERE event_id='$event_id'") or die(mysqli_error($conn));
            echo "<script> location.href='../admin.php?page=event'</script>";
            exit;
        }
    } else {
        mysqli_query($conn, "UPDATE `event` SET`event_title`='$title',`date`='$date',`location`='$location',`score`='$score',`time_start`='$timeStart',`time_end`='$timeEnd' WHERE event_id='$event_id'") or die(mysqli_error($conn));
        echo "<script> location.href='../admin.php?page=event'</script>";
    }
}
//remove function
if (isset($_GET['function']) && $_GET['function'] == 'deleteEvent') {
    $id = $_GET['id'];
    $res = mysqli_query($conn, "SELECT * FROM `event` WHERE event_id='$id'");
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $filePic = $row['image'];
    unlink("../Assets/Image/" . $filePic);
    mysqli_query($conn, "DELETE FROM `user_log` WHERE event_id='$id'");
    mysqli_query($conn, "DELETE FROM `event` WHERE event_id='$id'");
    echo "<script> location.href='../admin.php?page=event'</script>";
    exit;
}

//search function
if (isset($_GET['function']) && $_GET['function'] == 'searchEvent') {
    $eventID = $_POST['eventSearch'];
    if ($eventID == 0) {
    }
    if ($eventID != NULL) {
        $sqlFilter = "SELECT * FROM event WHERE event_title like '%$eventID%' and event_id>0 or location like '%$eventID%' and event_id>0";
    } else {
        $sqlFilter = "SELECT * FROM event WHERE event_id>0 order by event_id desc>0";
    }
}


//updateDes

$editorContent = $statusMsg = '';

// If the form is submitted
if (isset($_GET['func']) && $_GET['func'] == 'updatedes') {
    // Get editor content
    $editorContent = $_POST['editor'];
    $id = $_POST['id'];
    // Check whether the editor content is empty
    if (!empty($editorContent)) {
        // Insert editor content in the database
        $insert = $conn->query(" UPDATE `event` SET`description`='$editorContent' WHERE event_id = $id");

        // If database insertion is successful
        if ($insert) {
            $statusMsg = "The editor content has been inserted successfully.";
            echo "<script> location.href='../admin.php?page=event'</script>";
            exit;
        } else {
            $statusMsg = "Some problem occurred, please try again.";
            echo "<script> location.href='../admin.php?page=description&&id='$id'</script>";
            exit;
        }
    } else {
        $statusMsg = 'Please add content in the editor.';
        echo "<script> location.href='../admin.php?page=description&&id='$id''</script>";
        exit;
    }
}
