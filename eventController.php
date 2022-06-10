<?php
include_once("./connectDB.php");
//add  function
if (isset($_POST['btn_add']) && $_POST['btn_add'] = 'add') {
    $title = $_POST['event_title'];
    $date = $_POST['date'];
    $timeStart = $_POST['time_start'];
    $timeEnd = $_POST['time_end'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $score = $_POST['score'];
    $pic = $_FILES['image'];
    copy($pic['tmp_name'], "../Assets/Image/" . $pic['name']);
    $image = $pic['name'];
    mysqli_query($conn, "INSERT INTO `event`(`event_title`, `description`, `date`, `location`, `score`, `time_start`, `time_end`, `image`) VALUES ('$title','$description','$date','$location','$score','$timeStart','$timeEnd','$image)");
    echo "<script> location.href='admin.php?page=manageevent'</script>";
    exit;
}
//update function
if (isset($_POST['btn_update']) && $_POST['btn_update'] = 'update') {
    $title = $_POST['event_title'];
    $event_id = $_POST['event_id'];
    $date = $_POST['date'];
    $timeStart = $_POST['time_start'];
    $timeEnd = $_POST['time_end'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $score = $_POST['score'];
    $pic = $_FILES['image'];
    $image = $pic['name'];
    copy($pic['tmp_name'], "../Assets/Image/" . $pic['name']);
    mysqli_query($conn, "UPDATE `event` SET`event_title`='$title',`description`='$description',`date`='$date',`location`='$location',`score`='$score',`time_start`='$timeStart',`time_end`='$timeEnd',`image`='$image' WHERE event_id='$event_id'") or die(mysqli_error($conn));
    echo "<script> location.href='admin.php?page=manageevent'</script>";
    exit;
}
//remove function
if (isset($_POST['btn_delete'])) {
    $id = $_POST['event_id'];
    $res = mysqli_query($conn, "SELECT * FROM `event` WHERE event_id='$event_id'");
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    $filePic = $row['image'];
    unlink("../Assets/Image/" . $filePic);
    mysqli_query($conn, "DELETE FROM `user_log` WHERE id='$id'");
    mysqli_query($conn, "DELETE FROM `event` WHERE id='$id'");
    echo "<script> location.href='admin.php?page=manageevent'</script>";
    exit;
}

?>

<!-- Search function -->
<div>
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
</table>