<?php
include_once("../Model/connectDB.php");
$eventID = $_POST['EventList'];

if (isset($_POST['btnExportExcel'])) {
    $eventID = $_POST['EventList'];  //get value from filter interface in user_log
    $Start_date = date("Y-m-d");
    $output = " ";

    $sql = "SELECT a.student_id, fullname, checkin_date, time_in, time_out, scores FROM user_log a, user b 
                WHERE a.event_id = $eventID and a.student_id = b.student_id";

    //get event_title for file excel name in line 40
    $sqlEvent = "SELECT event_title FROM event where event_id = $eventID";
    $resultEvent = mysqli_query($conn, $sqlEvent);
    $rowEvent = mysqli_fetch_array($resultEvent);

    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $output .= '
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
                                <TD> ' . $row['student_id'] . '</TD>
                                <TD> ' . $row['fullname'] . '</TD>                                
                                <TD style="text-align: center;"> ' . $row['checkin_date'] . '</TD>
                                <TD style="text-align: center;"> ' . $row['time_in'] . '</TD>
                                <TD style="text-align: center;"> ' . $row['time_out'] . '</TD>
                                <TD style="text-align: center;"> ' . $row['scores'] . '</TD> 
                            </TR>';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=User_Log - ' . $rowEvent['event_title'] . ' - ' . $Start_date . '.xls');

        echo $output;
        exit();
    } else {
        echo "<script>alert('Empty data'); location.href='../Controller/showUserLog.php' </script>";
        // header("location: admin.php?page=userlog");
        exit();
    }
}


//filter function
if (isset($_POST['btnFilterUserLog'])) {
    if($eventID!=0){
        $sqlFilter = "SELECT * FROM user_log a, user b WHERE a.event_id = $eventID and a.student_id = b.student_id";
    }
    else{
        $sqlFilter = "SELECT * FROM user_log a, user b WHERE a.student_id = b.student_id";
    }   

    $url="../Controller/showUserLog.php?func=filter&&sql=$sqlFilter";
    $url=str_replace(PHP_EOL, '',$url);

    header("location: $url");    
}


//delete user log    
if (isset($_POST['btnDeleteUserLog'])) { //button 'Delete' in User-log interface

    $sql = "DELETE FROM `user_log` WHERE event_id = $eventID";

    mysqli_query($conn, $sql);
    echo "<script>alert('Delete successfully'); location.href='../Controller/showUserLog.php' </script>";
    exit();
}
