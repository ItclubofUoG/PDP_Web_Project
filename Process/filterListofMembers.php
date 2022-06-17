<?php
if (isset($_GET['function']) && $_GET['function'] == 'modalFilterStudent' && isset($_POST['btn_filter'])) {
    $major = $_POST['majorFilter'];
    $course = $_POST['courseFilter'];    

    if($major==0 && $course==0){
        $sqlFilter = "SELECT * FROM user a, major b, course c WHERE a.major_id=b.major_id and a.course_id=c.course_id";
    }
    elseif($major!=0){
        if($course!=0){
            $sqlFilter = "SELECT * from user a, major b, course c where a.major_id = '$major' and a.major_id = b.major_id and a.course_id = '$course' and a.course_id = c.course_id";    
        }
        else{
            $sqlFilter = "SELECT * from user a, major b, course c where a.major_id = '$major' and a.major_id = b.major_id and a.course_id = c.course_id";
        }
    }
    else{
        $sqlFilter = "SELECT * from user a, major b, course c where a.major_id = b.major_id and a.course_id = '$course' and a.course_id = c.course_id";
    }
    $url="../admin.php?page=home&&func=filter&&sql=$sqlFilter";
    $url=str_replace(PHP_EOL, '',$url);

    header("location: $url");
}
?>