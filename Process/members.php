<?php
include_once("../connectDB.php");
include("../Libs/index.php");
// FIllter with Month to Month, Major and Course 
if (isset($_POST['btn_filter'])) {
    $major = $_POST['majorFilter'];
    $course = $_POST['courseFilter'];
    $startDate = $_POST['startMonth'];
    $endDate = $_POST['endMonth'];
    $result = Get_result_querry($major, $course, $startDate, $endDate);
    $sqlFilter = $result[0];
    $url = "../admin.php?page=home&&func=filter&&sql=$sqlFilter&&startDate=$startDate&&endDate=$endDate";
    $url = str_replace(PHP_EOL, '', $url);
    header("location: $url");
}
$out = "";
if (isset($_POST['btn_export'])) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $major = $_POST['majorFilter'];
    $course = $_POST['courseFilter'];
    $startDate = $_POST['startMonth'];
    $endDate = $_POST['endMonth'];
    $curDate = date('Y-m-d');
    $result = Get_result_querry($major, $course, $startDate, $endDate);
    $sqlExport = $result[0];
    $res = mysqli_query($conn, $sqlExport);

    if ((mysqli_num_rows($res)) > 0) {
        $out .= ' <table class="table" border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>                    
                    <th>Event joined in</th>
                    <th>Scores</th>
                </tr>
            </thead>';
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $student_id = $row['student_id'];

            if (empty($startDate) != true && empty($endDate) != true) {
                $res_sum = mysqli_query($conn, "SELECT SUM(scores) as score FROM user_log Where student_id = '$student_id' 
                AND  checkin_date >='$startDate'  and checkin_date <= '$endDate'") or die(mysqli_error($conn));

                $sqlEvent = mysqli_query($conn, "SELECT event_title, score from event a, user_log b WHERE a.event_id = b.event_id and b.student_id = '$student_id'
                AND  checkin_date >='$startDate'  and checkin_date <= '$endDate'") or die(mysqli_error($conn));
            } elseif (empty($startDate) != true && empty($endDate) == true) {
                $res_sum = mysqli_query($conn, "SELECT SUM(scores) as score FROM user_log Where student_id = '$student_id' 
                and  checkin_date >='$startDate' ") or die(mysqli_error($conn));

                $sqlEvent = mysqli_query($conn, "SELECT event_title, score from event a, user_log b WHERE a.event_id = b.event_id and b.student_id = '$student_id'
                and  checkin_date >='$startDate'") or die(mysqli_error($conn));
            } elseif (empty($startDate) == true && empty($endDate) != true) {
                $res_sum = mysqli_query($conn, "SELECT SUM(scores) as score FROM user_log Where student_id = '$student_id' 
                and checkin_date <= '$endDate'") or die(mysqli_error($conn));

                $sqlEvent = mysqli_query($conn, "SELECT event_title, score from event a, user_log b WHERE a.event_id = b.event_id and b.student_id = '$student_id'
                and checkin_date <= '$endDate'") or die(mysqli_error($conn));
            } else {
                $res_sum = mysqli_query($conn, "SELECT SUM(scores) as score FROM user_log Where student_id = '$student_id'") or die(mysqli_error($conn));
                $sqlEvent = mysqli_query($conn, "SELECT event_title, score from event a, user_log b WHERE a.event_id = b.event_id and b.student_id = '$student_id'");
            }
            $rowScore = mysqli_fetch_array($res_sum, MYSQLI_ASSOC);



            $arrayEvent = array();
            $arrayScore = array();
            while ($rowEvent = mysqli_fetch_array($sqlEvent, MYSQLI_ASSOC)) {
                array_push($arrayEvent, $rowEvent['event_title']);
                array_push($arrayScore, $rowEvent['score']);
            }


            $out .= ' 
            <tbody>
            <tr>
                    <td>' . $row['student_id'] . '</td>
                    <td>' . $row['fullname'] . '</td>
                    <td>' . $row['email'] . '</td>  
                    <td style=min-width: fit-content>';
            foreach (array_combine($arrayEvent, $arrayScore) as $eventElement => $scoreElement) {
                if ($eventElement == 'First_Score') {
                    $sql = mysqli_query($conn, "SELECT scores From user_log where event_id = '0' and student_id = '$student_id'");
                    $rowScoreExcel = mysqli_fetch_array($sql, MYSQLI_ASSOC);
                    $scoreElement = $rowScoreExcel['scores'];
                }
                $out .= $eventElement . ' (' . $scoreElement . ')' . ' | ';
            }
            $out .= '</td>    
                    <td>' . $rowScore['score'] . '</td>
    ';

            $out .= '
</tr>
</tbody>';
        }
        header('Content-Type: application/xls');
        if (empty($startDate) != true && empty($endDate) != true) {
            header('Content-Disposition: attachment; filename=User - from ' . date('d-m-Y', strtotime($startDate)) . ' to ' . date('d-m-Y', strtotime($endDate)) . '.xls');
        } elseif (empty($startDate) != true && empty($endDate) == true) {
            header('Content-Disposition: attachment; filename=User - from ' . date('d-m-Y', strtotime($startDate)) . ' to ' . date('d-m-Y', strtotime($curDate)) . '.xls');
        } elseif (empty($startDate) == true && empty($endDate) != true) {
            header('Content-Disposition: attachment; filename=User - to ' . date('d-m-Y', strtotime($curDate)) . '.xls');
        } else {
            header('Content-Disposition: attachment; filename=User.xls');
        }

        echo $out;
    }
}

?>
<!-- Process for EnventAttendence - Search Function -->
<!-- <?php
        if (isset($_GET['btn_search']) && $_GET['btn_search'] == "Search") {

            $month = $_GET['month'];
            $year = $_GET['year'];

            $sqlquery = "SELECT * FROM user_log WHERE Month(checkin_date) ='$month'AND Year(checkin_date)='$year'";
            $url = "../index.php?page=attendence&&sqlquery=$sqlquery";
            $url = str_replace(PHP_EOL, '', $url);
            header("location: $url");
        }
        echo "<script type='text/javascript'>alert('None data');</script>";
        echo "<script> location.href='../admin.php?page=home'</script>";
        exit;
        ?> -->