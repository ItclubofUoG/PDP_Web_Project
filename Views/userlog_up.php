<?php
include_once('../Libs/index.php');
include('../connectDB.php');
?>

<div class="main-table">
    <table class="table-admin">
        <tr class="table-head">
            <th class="head-row">Student ID</th>
            <th class="head-row">Student Name</th>
            <th class="head-row">Event Name</th>
            <th class="head-row">Date</th>
            <th class="head-row">Time In</th>
            <th class="head-row">Time Out</th>
            <th class="head-row">Score</th>
            <th class="head-row">Delete</th>
        </tr>

        <?php
        $currentEventId = Get_Current_Event_UserLog();
        if (isset($_GET['event'])) {
            $currentEventId = $_GET['event'];
        }
        //find the total records
        $result = mysqli_query($conn, "select count(id) as total from user_log where event_id ='$currentEventId'");
        $row = mysqli_fetch_assoc($result);
        if ($row['total'] > 0) {
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
        $sql = "SELECT * FROM user_log a, user b, event c where a.student_id = b.student_id and a.event_id = c.event_id and c.event_id ='$currentEventId' LIMIT $start, $limit";
        if (isset($_GET['func']) && $_GET['func'] == 'filter') {
            $sql = $_GET['sql'] . " LIMIT $start, $limit";
        }
        if ($currentEventId != 0 && isset($_GET['func']) == false) {
            $result = mysqli_query($conn, $sql);
        }
        while ($row = mysqli_fetch_array($result,  MYSQLI_ASSOC)) {
        ?>
            <tr class="table-body">
                <td class="body-row"><?php echo $row["student_id"]; ?></td>
                <td class="body-row"><?php echo $row["fullname"]; ?></td>
                <td class="body-row"><?php echo $row["event_title"]; ?></td>
                <td class="body-row"><?php echo $row["checkin_date"]; ?></td>
                <td class="body-row"><?php echo $row["time_in"]; ?></td>
                <td class="body-row"><?php echo $row["time_out"]; ?></td>
                <td class="body-row"><?php echo $row["scores"]; ?></td>
                <td class="body-row"><a href="./Process/userLog.php?function=deleteUser&&id=<?php echo $row['id'] ?>" style="text-decoration:none;" onclick="return confirm('Are you sure to delete')">⛔️</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>
<div class="pag-outline">
    <div class="pag-block">
        <!-- display prev when not stay in page 1 -->
        <?php if ($current_page > 1 && $total_page > 1) {
            echo '   <a href="admin.php?page=eventlog&&pages=' . ($current_page - 1) . '&&event=' . $currentEventId . '">Prev |</a>';
        } ?>
        <div class="pag-item">
            <?php
            //loop the between 
            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $current_page) {
                    echo '<span class="pag-number" style="border: 2px solid blue; background-color:#ccc;">' . $i . '</span> | ';
                } else {
                    echo '<a class="pag-hplink" href="admin.php?page=eventlog&&pages=' . $i . '&&event=' . $currentEventId . '"><div class="pag-number">' . $i . '</div></a> |';
                }
            }
            ?>
        </div>
        <?php
        //display btn next when it not be the end page
        if ($current_page < $total_page && $total_page > 1) {
            echo '<a href="admin.php?page=eventlog&&pages=' . ($current_page + 1) . '&&event=' . $currentEventId . '">Next</a>';
        } ?>
    </div>
</div>