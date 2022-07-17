<?php
include_once("./connectDB.php");
?>

<body>
    <div class="attendence-container">
        <h1 class="mn-title">Attendence</h1>
        <hr class="orange-line">
        <!-- search box-->

        <div class="table-function">
            <form action="./Process/members.php" class="search-month" method="GET">
                <p class="choose-month-title">Choose Month</p>
                <div class="choose-month-cover">
                    <select class="search-box" name="month">
                        <option value="1"> 1 </option>
                        <option value="2"> 2 </option>
                        <option value="3"> 3 </option>
                        <option value="4"> 4 </option>
                        <option value="5"> 5 </option>
                        <option value="6"> 6 </option>
                        <option value="7"> 7 </option>
                        <option value="8"> 8 </option>
                        <option value="9"> 9 </option>
                        <option value="10"> 10 </option>
                        <option value="11"> 11 </option>
                        <option value="12"> 12 </option>
                    </select>
                    <?php
                    include('./Libs/index.php');
                    $year = date("Y");
                    $listYear = Get_List_Year($year);
                    ?>
                    <select class="search-box" name="year">
                        <?php
                        foreach ($listYear as $value) { ?>
                            <option value="<?php echo $value; ?>"> <?php echo $value; ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <input class="btn-search" type="submit" value="Search" name="btn_search">
            </form>
        </div>
        <!--End Search Box-->

        <!--Start Table Attendence-->
        <div class="main-table-mn">
            <table class="table-user-mn">
                <tr class="table-head-mn">
                    <th class="head-row-mn">Name</th>
                    <th class="head-row-mn">Date</th>
                    <th class="head-row-mn">Event Name</th>
                    <th class="head-row-mn">Time In</th>
                    <th class="head-row-mn">Time Out</th>
                    <th class="head-row-mn">Score</th>
                </tr>
                <?php
                $id = $_SESSION["id"];
                if (isset($_GET['sqlquery'])) {
                    $res = mysqli_query($conn, $_GET['sqlquery'] . "&&student_id ='$id'");
                } else {
                    $res = mysqli_query($conn, "SELECT * FROM user_log WHERE Month(checkin_date) >='1' && student_id ='$id'");
                }

                $sum = 0;
                while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                    $event_id = $row['event_id'];
                    $sum += $row['scores'];
                    $res_name = mysqli_query($conn, "SELECT fullname FROM user WHERE student_id = '$id' ");
                    $res_eventname = mysqli_query($conn, "SELECT event_title FROM event WHERE event_id = '$event_id'");


                ?>
                    <tr class="table-body-mn">
                        <?php $rowStudent = mysqli_fetch_array($res_name, MYSQLI_ASSOC) ?>
                        <td class="body-row-mn"><?php echo $rowStudent['fullname'] ?></td>
                        <td class="body-row-mn"><?php echo $row['checkin_date'] ?></td>
                        <?php $rowEvent = mysqli_fetch_array($res_eventname, MYSQLI_ASSOC) ?>
                        <td class="body-row-mn"><?php echo $rowEvent['event_title'] ?></td>
                        <td class="body-row-mn"><?php echo $row['time_in'] ?></td>
                        <td class="body-row-mn"><?php echo $row['time_out'] ?></td>
                        <td class="body-row-mn"><?php echo $row['scores'] ?></td>
                    </tr>
                <?php } ?>
                <tr class="table-body-mn">
                    <td class="body-row-mn" colspan="5">
                        <b class="total-score">Total Score</b>
                    </td>
                    <td class="body-row-mn"><?php echo $sum ?></td>
                </tr>
            </table>
        </div>
        <!-- End table -->
    </div>

</body>