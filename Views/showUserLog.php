<a href="../Views/formTestAddUserLogFunction.php">Add new</a><br><br>
<?php
include_once('../Libs/index.php');
include_once('../connectDB.php');
?>

<form action="../Process/userLog.php" method="POST">
    <label for="">Export Excel file</label>
    <?php bind_Event_List($conn); ?><br><br>
    <input type="submit" name="btnExportExcel" id="btnExportExcel" value="Export excel file">
    <input type="submit" name="btnDeleteUserLog" id="btnDeleteUserLog" value="Delete User Log" onclick="return confirm('Are you sure you want to delete')">
    <input type="submit" name="btnFilterUserLog" id="btnFilterUserLog" value="Filter user log">
</form>

<form method="post" action="">

    <table id="" class="table table-striped table-bordered" cellspacing="0" width="100%" border="2">
        <thead>
            <tr>
                <th><strong>No.</strong></th>
                <th><strong>Student ID</strong></th>
                <th><strong>Student Name</strong></th>
                <th><strong>Checkin date</strong></th>
                <th><strong>Time in</strong></th>
                <th><strong>Time out</strong></th>
                <th><strong>Event ID</strong></th>
                <th><strong>Scores</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once("../connectDB.php");
            $No = 1;
            $sql = "SELECT * FROM user_log a, user b where a.student_id = b.student_id";
            if (isset($_GET['func']) && $_GET['func'] == 'filter') {
                $sql = $_GET['sql'];
            }
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result,  MYSQLI_ASSOC)) {
            ?>
                <tr>
                    <td align="center"><?php echo $No; ?></td>
                    <td align="center"><?php echo $row["student_id"]; ?></td>
                    <td align="center"><?php echo $row["fullname"]; ?></td>
                    <td align="center"><?php echo $row["checkin_date"]; ?></td>
                    <td align="center"><?php echo $row["time_in"]; ?></td>
                    <td align="center"><?php echo $row["time_out"]; ?></td>
                    <td align="center"><?php echo $row["event_id"]; ?></td>
                    <td align="center"><?php echo $row["scores"]; ?></td>
                </tr>
            <?php
                $No++;
            }
            ?>
        </tbody>
    </table>
    </div>
</form>