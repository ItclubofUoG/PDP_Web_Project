<?php
include_once('./Libs/index.php');
include_once('./connectDB.php');
?>
<!-- <meta http-equiv="refresh" content="5"> -->

<body>
    <div id="container">
        <!-- body -->
        <div class="user-container">
            <h1 class="mn-title">User Daily Logs</h1>
            <hr class="orange-line">
            <!-- button log -->
            <div class="table-function">
                <input class="btn-log js-log-filter" type="submit" value="Log Filter" name="btnFilterUserLog" id="btnFilterUserLog">
                <input class="btn-log js-log-export" type="submit" value="Export to Excel" name="btnExportExcel" id="btnExportExcel">
                <input class="btn-log js-log-add" type="submit" value="Add User Log">
                <input class="btn-delete-log js-log-delete" type="submit" value="Delete Log" name="btnDeleteUserLog" id="btnDeleteUserLog">
            </div>
            <!-- End button log -->
            <script>
                $(document).ready(function() {
                    $("#load_userlog").load("./Views/userlog_up.php");
                });
                setInterval(function() {
                    $(document).ready(function() {
                        $("#load_userlog").load("./Views/userlog_up.php");
                    });
                }, 1000)
            </script>
            <!--Start Table User log -->
            <?php
            if (isset($_GET['func']) && $_GET['func'] == 'filter') { ?>
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
                        $currentEventId = Get_Current_Event();
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
                        if ($currentEventId != 0 || isset($_GET['func']) == true) {
                            $result = mysqli_query($conn, $sql);
                        }
                        while ($row = mysqli_fetch_array($result,  MYSQLI_ASSOC)) {
                        ?>
                            <tr class="table-body-mn">
                                <td class="body-row-mn"><?php echo $row["student_id"]; ?></td>
                                <td class="body-row-mn"><?php echo $row["event_title"]; ?></td>
                                <td class="body-row-mn"><?php echo $row["fullname"]; ?></td>
                                <td class="body-row-mn"><?php echo $row["checkin_date"]; ?></td>
                                <td class="body-row-mn"><?php echo $row["time_in"]; ?></td>
                                <td class="body-row-mn"><?php echo $row["time_out"]; ?></td>
                                <td class="body-row-mn"><?php echo $row["scores"]; ?></td>
                                <td class="body-row-mn">
                                    <form method="POST" action="./Process/userLog.php?function=plusScore">
                                        <input type="hidden" name="stdID" id="stdID" value="<?php echo $row["student_id"]; ?>">
                                        <input type="hidden" name="eventID" id="eventID" value="<?php echo $currentEventId ?>">
                                        <input type="submit" style="cursor:pointer;" value="➕" onclick="return confirm('Are you sure you want to add scores for <?php echo $row['fullname']; ?> ?')">
                                    </form>
                                </td>
                                <td class="body-row-mn"><a href="./Process/userLog.php?function=deleteUser&&id=<?php echo $row['id'] ?>" style="text-decoration:none;" onclick="return confirm('Are you sure to delete')">⛔️</a></td>
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
            <?php } else { ?>
                <div id="load_userlog">

                </div>
            <?php } ?>
            <!-- End table -->
            <!-- Start Modal Log filter-->
            <div class="modal-container js-modal-log-filter">
                <div class="modal-content js-modal-content-log-filter">
                    <div class="modal-head">
                        <h2 class="modal-label">Log Filter</h2>
                        <a class="modal-close js-modal-close-log-filter">X</a>
                    </div>
                    <form action="./Process/userLog.php?function=filterUserLog" class="modal-body" method="POST">
                        <div class="modal-input">
                            <?php bind_Event_List($conn); ?>
                        </div>
                        <div class="modal-footer">
                            <div class="btn-footer">
                                <input type="submit" value="Filter" class="btn-add-modal" name="btnFilterUserLog" id="btnFilterUserLog">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Modal -->

            <!-- Start Modal Export to excel-->
            <div class="modal-container js-modal-log-export">
                <div class="modal-content js-modal-content-log-export">
                    <div class="modal-head">
                        <h2 class="modal-label">Export To Excel</h2>
                        <a class="modal-close js-modal-close-log-export">X</a>
                    </div>
                    <form action="./Process/userLog.php?function=exportExcel" class="modal-body" method="POST">
                        <div class="modal-input">
                            <?php bind_Event_List($conn); ?>
                        </div>
                        <div class="modal-footer">
                            <div class="btn-footer">
                                <input type="submit" value="Export" class="btn-add-modal">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Modal -->

            <!-- Start Modal Add user log-->
            <div class="modal-container js-modal-log-add">
                <div class="modal-content js-modal-content-log-add">
                    <div class="modal-head">
                        <h2 class="modal-label">Add Attendence</h2>
                        <a class="modal-close js-modal-close-log-add">X</a>
                    </div>
                    <form action="./Process/userLog.php?function=addUserLog" class="modal-body" id="userlog" method="POST">
                        <div class="modal-input">
                            <input type="text" id="logid" name="logid" class="modal-input-box" placeholder="Student ID">
                            <span class="alert-error-modal"></span>
                        </div>
                        <div class="modal-input">
                            <?php bind_Event_List($conn); ?>
                        </div>


                        <div class="modal-footer">
                            <div class="btn-footer">
                                <input type="submit" value="Add" class="btn-add-modal" name="btnSubmitAttendance" id="btnSubmitAttendance">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Modal -->

            <!-- Start Modal Delete log-->
            <div class="modal-container js-modal-log-delete">
                <div class="modal-content js-modal-content-log-delete">
                    <div class="modal-head">
                        <h2 class="modal-label">Delete Log</h2>
                        <a class="modal-close js-modal-close-log-delete">X</a>
                    </div>
                    <form action="./Process/userLog.php?function=deleteUserLog" class="modal-body" method="POST">
                        <div class="modal-input">
                            <?php bind_Event_List($conn); ?>
                        </div>
                        <div class="modal-footer">
                            <div class="btn-footer">
                                <input type="submit" value="Delete" class="btn-delete" onclick="return confirm('Are you sure to delete')">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Modal -->

        </div>
        <!-- Script Modal Update -->
        <script src="./Assets/js/Validation.js"></script>
        <script src="./Assets/js/ManageAdmin.js"></script>
        <script src="./Assets/js/ModalUserLog.js"></script>
        <script src="./Assets/js/ModalLogAdd.js"></script>
        <script src="./Assets/js/ModalLogDelete.js"></script>
        <!-- End Script modal update -->
        <!-- pagination page started here -->

</body>