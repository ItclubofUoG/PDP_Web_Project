<?php
include_once('./connectDB.php');

if (isset($_POST['btnSubmitAttendance'])) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $id = $_POST['txtStudentID'];
    $eventName = $_POST['EventList'];
    $checkinDate = date("Y-m-d");    

    if ($id != "" && $eventName != 0) {
        $sqlUserLog = "SELECT * FROM user_log where student_id = '$id' and event_id = '$eventName'";
        $sqlEvent = "SELECT * from event where event_id=$eventName";

        $resUserLog = mysqli_query($conn, $sqlUserLog);

        $resEvent = mysqli_query($conn,$sqlEvent);
        $row = mysqli_fetch_array($resEvent);

        $timeIn = $row['time_start'];
        $timeOut = $row['time_end'];
        $score = $row['score'];

        if (mysqli_num_rows($resUserLog) == 0) {
            mysqli_query($conn, "INSERT INTO user_log (student_id,checkin_date,time_in,time_out,event_id,scores) 
                                    VALUES ('$id','$checkinDate','$timeIn','$timeOut','$eventName',$score)");
            echo "<script>alert('Add successfully'); location.href='../Controller/showUserLog.php' </script>";
        } else {
            echo "<script>alert('Sinh vien da check in roi'); location.href='../Controller/showUserLog.php' </script>";
        }
    }
    else{
        echo "<script>alert('Vui long dien day du thong tin'); location.href='../Controller/formTestAddUserLogFunction.php' </script>";
    }
}
