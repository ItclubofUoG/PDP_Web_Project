<?php
if (isset($_GET['function']) && $_GET['function'] == 'modalFilterStudent' && isset($_POST['btn_filter'])) {
    $major = $_POST['majorFilter'];
    $course = $_POST['courseFilter'];
    $startMonth = $_POST['startMonth'];
    $endMonth = $_POST['endMonth'];
    include('../Libs/index.php');
    $result = Get_result_querry($major, $course, $startMonth, $endMonth);
    $sqlFilter = $result[0];
    $url = "../admin.php?page=home&&func=filter&&sql=$sqlFilter";
    $url = str_replace(PHP_EOL, '', $url);

    header("location: $url");
}
