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
            <div id="load_userlog">

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
        <!-- pagination page started here -->

</body>