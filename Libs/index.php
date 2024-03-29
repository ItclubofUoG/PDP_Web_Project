<?php
//Get current event by realtime
function Get_Current_Event()
{
    include("./connectDB.php");
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $currentDay = date("Y-m-d");
    $currentMinutes = date("H:i:s");
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
    $result = mysqli_query($conn, "SELECT * FROM event WHERE `date` ='$currentDay' AND time_start <='$currentTimeStart' AND time_end >='$currentTime'") or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $row['event_id'];
    } else {
        return -1;
    }
}
function Get_Current_Event_UserLog()
{
    include("../connectDB.php");
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $currentDay = date("Y-m-d");
    $currentMinutes = date("H:i:s");
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
    $result = mysqli_query($conn, "SELECT * FROM event WHERE `date` ='$currentDay' AND time_start <='$currentTimeStart' AND time_end >='$currentTime'") or die(mysqli_error($conn));
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $row['event_id'];
    } else {
        return -1;
    }
}
//get list year to search
function Get_List_Year_Selected($year, $yearChoose)
{
    $arr = array();
    // add yearChoose to array
    array_push($arr, $yearChoose);
    for ($i = 0; $i < 4; $i++) {
        if($year - $i != $yearChoose)
        {
            array_push($arr, $year - $i);
        }
    }
    return $arr;
}
function Get_List_Year($year)
{
    $arr = array();
    // add yearChoose to array
    array_push($arr);
    for ($i = 0; $i < 4; $i++) {
        array_push($arr, $year - $i);
    }
    return $arr;
}
function Get_result_querry($major, $course, $startDate, $endDate)
{
    include("../connectDB.php");
    // Check Input isset or not 
    $major = isset($major) ? $major : "";
    $course = isset($course) ? $course : "";
    $date_begin = isset($startDate) ? $startDate : "";
    $date_end = isset($endDate) ? $endDate : "";
    if (empty($major) != true && empty($course) != true && empty($date_begin) == true && empty($date_end) == true) {
        //Query with Major and Course input
        $res = "SELECT * FROM user where major_id ='$major' and course_id ='$course'";
    } elseif (empty($major) != true && empty($course) == true && empty($date_begin) == true && empty($date_end) == true) {
        //Query with Major input
        $res = "SELECT * FROM user where major_id ='$major'";
    } elseif (empty($major) == true && empty($course) != true && empty($date_begin) == true && empty($date_end) == true) {
        //Query with Course input
        $res = "SELECT * FROM user where course_id ='$course'";
    } elseif (empty($major) == true && empty($course) == true && empty($date_begin) != true && empty($date_end) == true) {
        //Query with date_begin input
        $res = "SELECT * FROM user WHERE student_id IN 
        (SELECT student_id FROM user_log WHERE event_id IN (SELECT event_id FROM `event` 
        WHERE date >= '$date_begin'))";
    } elseif (empty($major) == true && empty($course) == true && empty($date_begin) == true && empty($date_end) != true) {
        //Query with date_end input
        $res = "SELECT * FROM user WHERE student_id IN 
        (SELECT student_id FROM user_log WHERE event_id IN (SELECT event_id FROM `event` 
        WHERE date <= '$date_end'))";
    } elseif (empty($major) == true && empty($course) == true && empty($date_begin) != true && empty($date_end) != true) {
        // Query with date_begin and date_end input
        $res = "SELECT * FROM user WHERE student_id IN 
        (SELECT student_id FROM user_log WHERE event_id IN (SELECT event_id FROM `event` 
        WHERE date >= '$date_begin' AND date <= '$date_end'))";
    } elseif (empty($major) != true && empty($course) == true && empty($date_begin) != true && empty($date_end) != true) {
        // Query with date_begin and date_end input
        $res = "SELECT * FROM user WHERE student_id IN 
        (SELECT student_id FROM user_log WHERE event_id IN (SELECT event_id FROM `event` 
        WHERE date >= '$date_begin' AND date <= '$date_end')) AND major_id ='$major'";
    } elseif (empty($major) == true && empty($course) != true && empty($date_begin) != true && empty($date_end) != true) {
        // Query with date_begin and date_end input
        $res = "SELECT * FROM user WHERE student_id IN 
        (SELECT student_id FROM user_log WHERE event_id IN (SELECT event_id FROM `event` 
        WHERE date >= '$date_begin' AND date <= '$date_end')) AND course_id ='$course'";
    } elseif (empty($major) != true && empty($course) != true && empty($date_begin) != true && empty($date_end) != true) {
        // Query with all input
        $res = "SELECT * FROM user WHERE student_id IN 
        (SELECT student_id FROM user_log WHERE event_id IN (SELECT event_id FROM `event` 
        WHERE date >= '$date_begin' AND date  <= '$date_end')) AND course_id ='$course' AND major_id ='$major'";
    } else {
        //Query without input data
        $res = "SELECT * FROM user";
    }
    $result = mysqli_query($conn, $res);
    // echo mysqli_num_rows($result);
    // exit();
    if (mysqli_num_rows($result) > 0) {
        $resArray = array($res, $date_begin, $date_end);
        return $resArray;
    } else {
        return  $resArray = array(0, $date_begin, $date_end);
    }
}

//Show event list for ADD function
function bind_Event_List($conn)
{
    include("./connectDB.php");
    $sqlString = "SELECT event_id, event_title from event WHERE event_id>0";
    $result = mysqli_query($conn, $sqlString);
    echo "<SELECT name='EventList' class='select-event' required>
        <option value='0'>Choose event</option>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<option value='" . $row['event_id'] . "'>" . $row['event_title'] . "</option>";
    }
    echo "</select>";
}
function bind_Event_List_Userlog($conn)
{
    include("./connectDB.php");
    if (Get_Current_Event() != -1) {
        $event_id = Get_Current_Event();
        echo "<script type='text/javascript'>console.log(2);</script>";
        $sqlString = "SELECT event_id, event_title from event WHERE event_id='$event_id'";
    } else {
        $sqlString = "SELECT event_id, event_title from event WHERE event_id>0";
    }
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
    $sqlString = "SELECT * from major where major_id>0";
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
    $sqlString = "SELECT * from major  where major_id>0";
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
    $sqlString = "SELECT * from course where course_id>0";
    $result = mysqli_query($conn, $sqlString);

    echo "<SELECT name='courseFilter' id='courseFilter' class='select-mg-cr'>
    <option value='0'>Choose course</option>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<option value='" . $row['course_id'] . "'>" . $row['course_name'] . "</option>";
    }
    echo "</select>";
}



//Show current major's Update Student admin page
function selected_Major($conn, $major)
{
    include("./connectDB.php");
    $sqlString = "SELECT * from major WHERE major_id>0";
    $result = mysqli_query($conn, $sqlString);

    echo "<SELECT  name='major' id='major' class='modal-input-box'>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($row['major_id'] == $major) {
            echo "<option value='" . $row['major_id'] . "'selected>" . $row['major_name'] . "</option>";
        } else {
            echo "<option value='" . $row['major_id'] . "'>" . $row['major_name'] . "</option>";
        }
    }
    echo "</select>";
}

//Show current course's Update Student admin page
function selected_Course($conn, $major)
{
    include("./connectDB.php");
    $sqlString = "SELECT * from course WHERE course_id>0";
    $result = mysqli_query($conn, $sqlString);

    echo "<SELECT  name='course' id='course' class='modal-input-box'>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($row['course_id'] == $major) {
            echo "<option value='" . $row['course_id'] . "'selected>" . $row['course_name'] . "</option>";
        } else {
            echo "<option value='" . $row['course_id'] . "'>" . $row['course_name'] . "</option>";
        }
    }
    echo "</select>";
}
