<?php
include_once("../connectDB.php");
include("../Libs/index.php");
// FIllter with Month to Month, Major and Course 
if (isset($_POST['btn_fillter'])) {

?>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Day of birth</th>
                    <th>Major</th>
                    <th>Course</th>
                    <th>Scores</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // $resArray = Get_result_querry();
                $res = mysqli_query($conn, (string)$resArray[0]);
                $month_begin = $resArray[1];
                $month_end = $resArray[2];
                while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                    $student_id = $row['student_id'];
                    $res_sum = mysqli_query($conn, "SELECT SUM(scores) FROM user_log Where student_id = '$student_id' 
                            && MONTH(checkin_date) >='$month_begin'  && MONTH(checkin_date) <= '$month_end'");
                ?>
                    <tr>
                        <td><?php echo $row['student_id'] ?></td>
                        <td><?php echo $row['fullname'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['dob'] ?></td>
                        <td><?php echo $row['major_id'] ?></td>
                        <td><?php echo $row['course_id'] ?></td>
                        <!-- Show Total Scores -->
                        <?php while ($row = mysqli_fetch_array($res_sum, MYSQLI_ASSOC)) { ?>
                            <td><?php echo $row['SUM(scores)'] ?></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


<?php }
$out = "";
if (isset($_POST['btn_ToExel'])) {
    // $resArray = Get_result_querry();
    $res = mysqli_query($conn, (string)$resArray[0]);
    $month_begin = $resArray[1];
    $month_end = $resArray[2];
    if ((mysqli_num_rows($res)) > 0) {
        $out .= ' <table class="table" border="1">
            <thead>
                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Day of birth</th>
                    <th>Major</th>
                    <th>Course</th>
                    <th>Scores</th>
                </tr>
            </thead>';
        while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $student_id = $row['student_id'];
            $res_sum = mysqli_query($conn, "SELECT SUM(scores) FROM user_log Where student_id = '$student_id' 
                && MONTH(checkin_date) >='$month_begin'  && MONTH(checkin_date) <= '$month_end'");
            $out .= ' 
                        <tbody>
                            <tr>
                                    <td>' . $row['student_id'] . '</td>
                                    <td>' . $row['fullname'] . '</td>
                                    <td>' . $row['phone'] . '</td>
                                    <td>' . $row['gender'] . '</td>
                                    <td>' . $row['email'] . '</td>
                                    <td>' . $row['dob'] . '</td>
                                    <td>' . $row['major_id'] . '</td>
                                    <td>' . $row['course_id'] . '</td>
                    ';
            while ($row = mysqli_fetch_array($res_sum, MYSQLI_ASSOC)) {
                $out .= '
                                <td>' . $row['SUM(scores)'] . '</td>
                               
                    ';
            }
            $out .= '
                </tr>
             </tbody>';
        }
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=User.xls');
        echo $out;
    }
}

?>
<!-- Process for EnventAttendence - Search Function -->
<?php
if (isset($_GET['btn_search']) && $_GET['btn_search'] == "Search") {

    $month = $_GET['month'];
    $year = $_GET['year'];

    $sqlquery = "SELECT * FROM user_log WHERE Month(checkin_date) ='$month'AND Year(checkin_date)='$year'";
    $url = "../index.php?page=attendence&&sqlquery=$sqlquery";
    $url = str_replace(PHP_EOL, '', $url);
    header("location: $url");
}
?>