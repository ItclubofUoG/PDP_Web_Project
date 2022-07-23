<?php
include_once('../Libs/index.php');
include('../connectDB.php');
?>

<div class="main-table-mn">
    <table class="table-admin-mn">
        <tr class="table-head-mn">
            <th class="head-row-mn">Student ID</th>
            <th class="head-row-mn">Student Name</th>
            <th class="head-row-mn">Event Name</th>
            <th class="head-row-mn">Date</th>
            <th class="head-row-mn">Time In</th>
            <th class="head-row-mn">Time Out</th>
            <th class="head-row-mn">Score</th>
            <th class="head-row-mn">Plus</th>
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
        $sql = "SELECT * FROM user_log a, user b, event c where a.student_id = b.student_id and a.event_id = c.event_id and c.event_id ='$currentEventId' LIMIT $start, $limit";
        if (isset($_GET['func']) && $_GET['func'] == 'filter') {
            $sql = $_GET['sql'] . " LIMIT $start, $limit";
        }
        if ($currentEventId != -1 || isset($_GET['func']) == true) {
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result,  MYSQLI_ASSOC)) {
        ?>
                <tr class="table-body-mn">
                    <td class="body-row-mn"><?php echo $row["student_id"]; ?></td>
                    <td class="body-row-mn"><?php echo $row["fullname"]; ?></td>
                    <td class="body-row-mn"><?php echo $row["event_title"]; ?></td>
                    <td class="body-row-mn"><?php echo $row["checkin_date"]; ?></td>
                    <td class="body-row-mn"><?php echo $row["time_in"]; ?></td>
                    <td class="body-row-mn"><?php echo $row["time_out"]; ?></td>
                    <td class="body-row-mn"><?php echo $row["scores"]; ?></td>
                    <td class="body-row-mn">
                        <form method="POST" action="./Process/userLog.php?function=plusScore">
                            <input type="hidden" name="stdID" id="stdID" value="<?php echo $row["student_id"]; ?>">
                            <input type="submit" value="➕" onclick="return confirm('Are you sure you want to add points for <?php echo $row['fullname']; ?> ?')">
                        </form>
                    </td>
                    <td class="body-row-mn"><a href="./Process/userLog.php?function=deleteUser&&id=<?php echo $row['id'] ?>" style="text-decoration:none;" onclick="return confirm('Are you sure to delete')">⛔️</a></td>
                </tr>
        <?php
            }
        }
        ?>


    </table>
</div>
<div class="pag-outline">
    <div class="pag-block">
        <!-- display prev when not stay in page 1 -->
        <?php if ($current_page > 1 && $total_page > 1) {
            echo '   <a href="admin.php?page=eventlog&&pages=' . ($current_page - 1) . '&&event=' . $currentEventId . '" class="pag-number"><i class="fa-solid fa-angles-left"></i></a>';
        } ?>
        <div class="pag-item">
            <?php
            //loop the between 
            for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $current_page) {
                    echo '<span class="pag-number" style="background-color:orange; color: white;">' . $i . '</span>';
                } else {
                    echo '<a class="pag-hplink" href="admin.php?page=eventlog&&pages=' . $i . '&&event=' . $currentEventId . '"><div class="pag-number">' . $i . '</div></a>';
                }
            }
            ?>
        </div>
        <?php
        //display btn next when it not be the end page
        if ($current_page < $total_page && $total_page > 1) {
            echo '<a href="admin.php?page=eventlog&&pages=' . ($current_page + 1) . '&&event=' . $currentEventId . '" class="pag-number"><i class="fa-solid fa-angles-right"></i></a>';
        } ?>
    </div>
</div>