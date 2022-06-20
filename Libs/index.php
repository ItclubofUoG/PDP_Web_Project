<?php
function Get_Current_Event()
{
    include("./connectDB.php");
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $currentDay = date("Y-m-d");
    //minus time
    $date = date("Y-m-d H:i:s");
    $time = strtotime($date);
    $time = $time - (30 * 60);
    $currentTime = date("H:i:s", $time);
    //plus time
    $minutes_to_add = 30;
    $currentDateTime = date('Y-m-d H:i:s');
    $time = new DateTime($currentDateTime);
    $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
    $currentTimeStart = $time->format('Y-m-d H:i');
    $result = mysqli_query($conn, "SELECT * FROM event WHERE `date` ='$currentDay' AND time_start < '$currentTimeStart' AND time_end > '$currentTime'") or die(mysqli_error($conn));

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $row['event_id'];
    } else {
        return 0;
    }
}
//get list year to search
function Get_List_Year($year)
{
    $arr = array();
    for ($i = 0; $i < 4; $i++) {
        array_push($arr, $year - $i);
    }
    return $arr;
}
function Get_result_querry()
{
    include("./connectDB.php");
    // Check Input isset or not 
    $major = isset($_POST['major']) ? $_POST['major'] : "";
    $course = isset($_POST['course']) ? $_POST['course'] : "";
    $month_begin = isset($_POST['month_begin']) ? $_POST['month_begin'] : "";
    $month_end = isset($_POST['month_end']) ? $_POST['month_end'] : "";

    if ($major != "" && $course != "" && $month_begin == "" && $month_end == "") {
        //Query with Major and Course input
        $res = mysqli_query($conn, "SELECT * FROM user where major_id ='$major' && course_id ='$course'");
    } elseif ($major != "" && $course == "" && $month_begin == "" && $month_end == "") {
        //Query with Major input
        $res = mysqli_query($conn, "SELECT * FROM user where major_id ='$major'");
    } elseif ($major == "" && $course != "" && $month_begin == "" && $month_end == "") {
        //Query with Course input
        $res = mysqli_query($conn, "SELECT * FROM user where course_id ='$course'");
    } elseif ($major == "" && $course == "" && $month_begin != "" && $month_end == "") {
        //Query with Month_Begin input
        $res = mysqli_query($conn, "SELECT * FROM user WHERE student_id IN 
        (SELECT student_id FROM user_log WHERE event_id IN (SELECT event_id FROM `event` 
        WHERE MONTH(date) >= '$month_begin'))");
    } elseif ($major == "" && $course == "" && $month_begin == "" && $month_end != "") {
        //Query with Month_End input
        $res = mysqli_query($conn, "SELECT * FROM user WHERE student_id IN 
        (SELECT student_id FROM user_log WHERE event_id IN (SELECT event_id FROM `event` 
        WHERE MONTH(date) <= '$month_end'))");
    } elseif ($major == "" && $course == "" && $month_begin != "" && $month_end != "") {
        // Query with Month_Begin and Month_End input
        $res = mysqli_query($conn, "SELECT * FROM user WHERE student_id IN 
        (SELECT student_id FROM user_log WHERE event_id IN (SELECT event_id FROM `event` 
        WHERE MONTH(date) >= '$month_begin' && <= '$month_end'))");
    } elseif ($major != "" && $course != "" && $month_begin != "" && $month_end != "") {
        // Query with all input
        $res = mysqli_query($conn, "SELECT * FROM user WHERE student_id IN 
        (SELECT student_id FROM user_log WHERE event_id IN (SELECT event_id FROM `event` 
        WHERE MONTH(date) >= '$month_begin' && MONTH(date)  <= '$month_end')) && course_id ='$course' && major_id ='$major'");
    } else {
        //Query without input data
        $res = mysqli_query($conn, "SELECT * FROM user");
    }
    $resArray = array($res, $month_begin, $month_end);
    return $resArray;
}

//Show event list for ADD function
function bind_Event_List($conn)
{
    include("./connectDB.php");
    $sqlString = "SELECT event_id, event_title from event";
    $result = mysqli_query($conn, $sqlString);
    echo "<SELECT name='EventList' class='select-event' required>
        <option value='0'>Choose event</option>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<option value='" . $row['event_id'] . "'>" . $row['event_title'] . "</option>";
    }
    echo "</select>";
}

//Show current major's student list
function bind_Major_List($conn, $major)
{
    include("./connectDB.php");
    $sqlString = "SELECT * from major";
    $result = mysqli_query($conn, $sqlString);

    echo "<SELECT  name='stuMajor' id='stuMajor' class='major-infor'>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($row['major_id'] == $major) {
            echo "<option value='" . $row['major_id'] . "'selected>" . $row['major_name'] . "</option>";
        } else {
            echo "<option value='" . $row['major_id'] . "'>" . $row['major_name'] . "</option>";
        }
    }
    echo "</select>";
}


//Show major list for filter - Home admin page
function Major_List($conn)
{
    include("./connectDB.php");
    $sqlString = "SELECT * from major";
    $result = mysqli_query($conn, $sqlString);

    echo "<SELECT name='majorFilter' id='majorFilter' class='select-mg-cr'>
    <option value='0'>Choose major</option>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<option value='" . $row['major_id'] . "'>" . $row['major_name'] . "</option>";
    }
    echo "</select>";
}

//Show course list for filter - Home admin page
function Course_List($conn)
{
    include("./connectDB.php");
    $sqlString = "SELECT * from course";
    $result = mysqli_query($conn, $sqlString);

    echo "<SELECT name='courseFilter' id='courseFilter' class='select-mg-cr'>
    <option value='0'>Choose course</option>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<option value='" . $row['course_id'] . "'>" . $row['course_name'] . "</option>";
    }
    echo "</select>";
}
