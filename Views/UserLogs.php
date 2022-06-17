<?php
include_once('./Libs/index.php');
include_once('./connectDB.php');
?>

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

            <!--Start Table User log -->
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
                    </tr>

                    <?php

                    $sql = "SELECT * FROM user_log a, user b, event c where a.student_id = b.student_id and a.event_id = c.event_id";
                    if (isset($_GET['func']) && $_GET['func'] == 'filter') {
                        $sql = $_GET['sql'];
                    }
                    $result = mysqli_query($conn, $sql);
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
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
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
</body>