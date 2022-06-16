<?php
include_once("../connectDB.php");
//add  function
if (isset($_GET['function']) && $_GET['function'] == 'addEvent') {
    $title = $_POST['eventtitle'];
    $date = $_POST['eventdate'];
    $timeStart = $_POST['eventtimestart'];
    $timeEnd = $_POST['eventtimeend'];
    $location = $_POST['eventlocation'];
    $description = $_POST['eventdescription'];
    $score = $_POST['eventscore'];
    $pic = $_FILES['eventimage'];



    if ($pic['type'] == "image/jpg" || $pic['type'] == "image/jpeg" || $pic['type'] == "image/png" || $pic['type'] == "image/gif") {
        $image = $pic['name'];

        $sql = "SELECT * from event where image = '$image'";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            copy($pic['tmp_name'], "../Assets/Image/" . $pic['name']);
            mysqli_query($conn, "INSERT INTO `event`(`event_title`, `description`, `date`, `location`, `score`, `time_start`, `time_end`, `image`) VALUES ('$title','$description','$date','$location','$score','$timeStart','$timeEnd','$image')");
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
    $description = $_POST['updatedescription'];
    $score = $_POST['updatescore'];
    $pic = $_FILES['updateimage'];
    $image = $pic['name'];


    if ($pic['name'] != "") {
        if ($pic['type'] == "image/jpg" || $pic['type'] == "image/jpeg" || $pic['type'] == "image/png" || $pic['type'] == "image/gif") {
            $sq = "SELECT * from event where image = '$image'";
            $re = mysqli_query($conn, $sq);
            if (mysqli_num_rows($re) == 0) {
                copy($pic['tmp_name'], "../Assets/Image/" . $pic['name']);
                mysqli_query($conn, "UPDATE `event` SET`event_title`='$title',`description`='$description',`date`='$date',`location`='$location',`score`='$score',`time_start`='$timeStart',`time_end`='$timeEnd',`image`='$image' WHERE event_id='$event_id'") or die(mysqli_error($conn));
                echo "<script> location.href='../admin.php?page=event'</script>";
                exit;
            }
            else {
                echo "<script>alert('Image name already exist, please change file name before upload!')</script>";
                echo "<script> location.href='../admin.php?page=event'</script>";
            }
        }
    } else {
        mysqli_query($conn, "UPDATE `event` SET`event_title`='$title',`description`='$description',`date`='$date',`location`='$location',`score`='$score',`time_start`='$timeStart',`time_end`='$timeEnd' WHERE event_id='$event_id'") or die(mysqli_error($conn));
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
    if($eventID!=NULL){
        $sqlFilter = "SELECT * FROM event WHERE event_title like '%$eventID%'  or location like '%$eventID%' ";
    }
    else{
        $sqlFilter = "SELECT * FROM event order by event_id desc";
    }   

    $url="../admin.php?page=event&&func=filter&&sql=$sqlFilter";
    $url=str_replace(PHP_EOL, '',$url);

    header("location: $url");    

}
?>

<!-- Search function -->
<!-- <div>
    <form action="" method="POST">
        <div class="form-group">
            <input type="text" name="id" placeholder="" class="form-label">
        </div>
        <div class="button">
            <button type="submit" name="btn_search" id="btn_search">Search</button>
        </div>

    </form>
</div>
<table border="1">
    <tbody class="table-body">


        <?php

        if (isset($_POST['btn_search'])) {
            $id = $_POST['id'];
            $result = mysqli_query($conn, "SELECT * FROM event WHERE event_id like '%$id%' OR event_title like'%$id%'");
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['event_id']; ?> </td>
                    <td><?php echo $row['event_title']; ?> </td>
                    <td> <?php echo $row['description']; ?> </td>
                    <td> <?php echo $row['date']; ?> </td>
                    <td> <?php echo $row['location']; ?> </td>
                    <td> <?php echo $row['score']; ?> </td>
                    <td> <?php echo $row['time_start']; ?> </td>
                    <td> <?php echo $row['time_end']; ?> </td>
                    <td> <?php echo $row['image']; ?> </td>

                </tr>
            <?php }
        } else {
            $result = mysqli_query($conn, "SELECT  * FROM event");
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['event_id']; ?> </td>
                    <td><?php echo $row['event_title']; ?> </td>
                    <td> <?php echo $row['description']; ?> </td>
                    <td> <?php echo $row['date']; ?> </td>
                    <td> <?php echo $row['location']; ?> </td>
                    <td> <?php echo $row['score']; ?> </td>
                    <td> <?php echo $row['time_start']; ?> </td>
                    <td> <?php echo $row['time_end']; ?> </td>
                    <td> <?php echo $row['image']; ?> </td>

                </tr>
        <?php }
        }
        ?>
    </tbody>
</table> -->