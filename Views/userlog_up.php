<?php
include_once('../Libs/index.php');
include('../connectDB.php');
?>

<div class="main-table-mn">
    <table class="table-admin-mn">
        <tr class="table-head-mn">
            <th class="head-row-mn">No</th>
            <th class="head-row-mn">Student ID</th>
            <th class="head-row-mn">Student Name</th>
            <th class="head-row-mn">Event Name</th>
            <th class="head-row-mn">Date</th>
            <th class="head-row-mn">Time In</th>
            <th class="head-row-mn">Time Out</th>
            <th class="head-row-mn">Score</th>
            <th class="head-row-mn">Delete</th>
        </tr>

        <?php
        $currentEventId = Get_Current_Event_UserLog();
        if (isset($_GET['event'])) {
            $currentEventId = $_GET['event'];
        }
        //find the total records
        if ($currentEventId != -1) {
            $result = mysqli_query($conn, "select count(id) as total from user_log where event_id ='$currentEventId'");
            $row = mysqli_fetch_assoc($result);
            $total_records = $row['total'];
        } else {
            $total_records = 1;
        }
        //find limit and current page
        $current_page = isset($_GET['pages']) ? $_GET['pages'] : 1;
        $limit = 20;  // set the limit of line in page
        //calculate total page and start page
        $total_page = ceil($total_records / $limit);
        //limit the page from 1 to end
        if ($current_page > $total_page) {
            $current_page = $total_page;
        } else if ($current_page < 1) {
            $current_page = 1;
        }
        //find start page
        $start = ($current_page - 1) * $limit;
        session_start();
        if (isset($_SESSION["search"])) {
            $key = $_SESSION["search"];
            // echo "<script>console_log('a string');</script>";
            if ($key != "") {
                $sql = "SELECT * FROM user_log a, user b, event c where a.student_id = b.student_id and a.event_id = c.event_id and c.event_id ='$currentEventId' and a.student_id like '%$key%' or a.student_id = b.student_id and a.event_id = c.event_id and c.event_id ='$currentEventId' and b.fullname like '%$key%' order by a.time_in desc ";
            }
        } else {
            echo "<script>console.log('key1')</script>";
            $sql = "SELECT * FROM user_log a, user b, event c where a.student_id = b.student_id and a.event_id = c.event_id and c.event_id ='$currentEventId' order by a.time_in desc ";
        }
        if (isset($_GET['func']) && $_GET['func'] == 'filter') {
            $sql = $_GET['sql'] . " ";
        }
        if ($currentEventId != -1 || isset($_GET['func']) == true) {
            $result = mysqli_query($conn, $sql);
            $no = 0;
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result,  MYSQLI_ASSOC)) {
                    $no = $no + 1;
        ?>
                    <tr class="table-body-mn">
                        <td class="body-row-mn"><?php echo $no ?></td>
                        <td class="body-row-mn"><?php echo $row["student_id"]; ?></td>
                        <td class="body-row-mn"><?php echo $row["fullname"]; ?></td>
                        <td class="body-row-mn"><?php echo $row["event_title"]; ?></td>
                        <td class="body-row-mn"><?php echo $row["checkin_date"]; ?></td>
                        <td class="body-row-mn"><?php echo $row["time_in"]; ?></td>
                        <td class="body-row-mn"><?php echo $row["time_out"]; ?></td>
                        <td class="body-row-mn"><?php echo $row["scores"]; ?></td>
                        <td class="body-row-mn"><a href="./Process/userLog.php?function=deleteUser&&id=<?php echo $row['id'] ?>" style="text-decoration:none;" onclick="return confirm('Are you sure to delete')">⛔️</a></td>
                    </tr>
        <?php
                }
            }
        }
        ?>

    </table>
</div>