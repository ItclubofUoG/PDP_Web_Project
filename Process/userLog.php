<?php
include_once("../connectDB.php");


if (isset($_GET['function']) && $_GET['function'] == 'exportExcel') {
    $eventID = $_POST['EventList'];  //get value from filter interface in user_log
    if ($eventID == 0) {
        echo "<script type='text/javascript'>alert('Please choose one event');</script>";
        echo "<script> location.href='../admin.php?page=eventlog'</script>";
        exit;
    }
    $output = " ";

    $sql = "SELECT a.student_id, fullname, checkin_date, time_in, time_out, scores FROM user_log a, user b 
                WHERE a.event_id = $eventID and a.student_id = b.student_id";

    //get event_title for file excel name in line 40
    $sqlEvent = "SELECT * FROM event where event_id = $eventID";
    $resultEvent = mysqli_query($conn, $sqlEvent);
    $rowEvent = mysqli_fetch_array($resultEvent);

    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $output .= '
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <table class="table" border="1" style="font-size: 25px">  
                        <TR>
                            <TH style="background-color: #74E4E5">Student ID</TH>
                            <TH style="background-color: #74E4E5">Student Name</TH>
                            <TH style="background-color: #74E4E5">Check-in Date</TH>
                            <TH style="background-color: #74E4E5">Time In</TH>
                            <TH style="background-color: #74E4E5">Time Out</TH>
                            <TH style="background-color: #74E4E5">Score</TH>
                        </TR>';
        while ($row = $result->fetch_assoc()) {
            $output .= '
                            <TR> 
                                <TD> ' . strtoupper($row['student_id']) . '</TD>
                                <TD> ' . $row['fullname'] . '</TD>                                
                                <TD style="text-align: center;"> ' . $row['checkin_date'] . '</TD>
                                <TD style="text-align: center;"> ' . $row['time_in'] . '</TD>
                                <TD style="text-align: center;"> ' . $row['time_out'] . '</TD>
                                <TD style="text-align: center;"> ' . $row['scores'] . '</TD> 
                            </TR>';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=' . $rowEvent['event_title'] . ' - ' . $rowEvent['date'] . '.xls');

        echo $output;
        exit();
    } else {
        echo "<script>alert('Empty data'); location.href='../Views/showUserLog.php' </script>";
        // header("location: admin.php?page=userlog");
        exit();
    }
}


//filter function
if (isset($_GET['function']) && $_GET['function'] == 'filterUserLog') {
    $eventID = $_POST['EventList'];
    if ($eventID == 0) {
        echo "<script type='text/javascript'>alert('Please choose one event');</script>";
        echo "<script> location.href='../admin.php?page=eventlog'</script>";
        exit;
    }
    if (empty($eventID) == false) {
        $sqlFilter = "SELECT * FROM user_log a, user b, event c WHERE c.event_id = $eventID and a.student_id = b.student_id and a.event_id = c.event_id";
    } else {
        $sqlFilter = "SELECT * FROM user_log a, user b, event c WHERE a.student_id = b.student_id and a.event_id = c.event_id";
    }

    $url = "../admin.php?page=eventlog&&func=filter&&sql=$sqlFilter&&event=$eventID";
    $url = str_replace(PHP_EOL, '', $url);

    header("location: $url");
}


//delete user log    
if (isset($_GET['function']) && $_GET['function'] == 'deleteUserLog') { //button 'Delete' in User-log interface
    $eventID = $_POST['EventList'];
    if ($eventID == 0) {
        echo "<script type='text/javascript'>alert('Please choose one event');</script>";
        echo "<script> location.href='../admin.php?page=eventlog'</script>";
        exit;
    }
    if ($eventID == 0) {
        echo "<script type='text/javascript'>alert('Please choose one event');</script>";
        echo "<script> location.href='../admin.php?page=eventlog'</script>";
        exit;
    }
    $sql = "DELETE FROM `user_log` WHERE event_id = $eventID";

    mysqli_query($conn, $sql);
    echo "<script>alert('Delete successfully'); location.href='../admin.php?page=eventlog' </script>";
    exit();
}


//add user log function
if (isset($_GET['function']) && $_GET['function'] == 'addUserLog') {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $id = $_POST['logid'];
    $eventName = $_POST['EventList'];
    if ($eventName == 0) {
        echo "<script type='text/javascript'>alert('Please choose one event');</script>";
        echo "<script> location.href='../admin.php?page=eventlog'</script>";
        exit;
    }
    $checkinDate = date("Y-m-d");

    if ($id != "" && $eventName != 0) {
        $sqlCheckID = mysqli_query($conn, "SELECT * FROM user where student_id = '$id'");
        if (mysqli_num_rows($sqlCheckID) != 0) {
            $sqlUserLog = "SELECT * FROM user_log where student_id = '$id' and event_id = '$eventName'";
            $sqlEvent = "SELECT * from event where event_id=$eventName";

            $resUserLog = mysqli_query($conn, $sqlUserLog);

            $resEvent = mysqli_query($conn, $sqlEvent);
            $row = mysqli_fetch_array($resEvent);

            $timeIn = $row['time_start'];
            $timeOut = $row['time_end'];
            $score = $row['score'];

            if (mysqli_num_rows($resUserLog) == 0) {
                mysqli_query($conn, "INSERT INTO user_log (student_id,checkin_date,time_in,time_out,event_id,scores) 
                                        VALUES ('$id','$checkinDate','$timeIn','$timeOut','$eventName',$score)");
                echo "<script>alert('Add successfully'); location.href='../admin.php?page=eventlog' </script>";
            } else {
                echo "<script>alert('Student have already check-in'); location.href='../admin.php?page=eventlog' </script>";
            }
        } else {
            echo "<script>alert('Student ID does not exist'); location.href='../admin.php?page=eventlog' </script>";
        }
    } else {
        echo "<script>alert('Please complete all information'); location.href='../admin.php?page=eventlog' </script>";
    }
}
// delete s.o log 
if (isset($_GET['function']) && $_GET['function'] == 'deleteUser') {
    $id = $_GET['id'];
    $sql = "DELETE FROM `user_log` WHERE id = $id";
    mysqli_query($conn, $sql);
    echo "<script>location.href='../admin.php?page=eventlog'</script>";
    exit();
}



if (isset($_GET['function']) && $_GET['function'] == 'plusScore') {
    $stdID = $_POST['stdID'];
    $eventID = $_POST['eventID'];

    $sqlCurrentScore = mysqli_query($conn, "SELECT * From user_log where student_id = '$stdID' and event_id = '$eventID'");
    $rowCurrentScore = mysqli_fetch_array($sqlCurrentScore, MYSQLI_ASSOC);
    $currentScore = $rowCurrentScore['scores'];

    $sqlScore = mysqli_query($conn, "SELECT * From event where event_id = '$eventID'");
    $rowScore = mysqli_fetch_array($sqlScore, MYSQLI_ASSOC);
    $eventScorePlus = $rowScore['scorePlus'];

    $plus = $currentScore + $eventScorePlus;

    if ($currentScore <= $rowScore['score']) {
        $sql = mysqli_query($conn, "UPDATE user_log set scores = '$plus' where student_id = '$stdID' and event_id = '$eventID'");
        echo "<script>location.href='../admin.php?page=eventlog'</script>";
    } else {
        echo "<script>alert('Students have already added score!');window.location='../admin.php?page=eventlog'</script>";
    }
}
