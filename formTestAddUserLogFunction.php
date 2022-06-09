<?php
include_once('../Libs/index.php'); 
include_once('../Model/connectDB.php');
?>

<form action="../Controller/addUserLogController.php" method="POST">
    <label for="">Student ID </label>
    <input type="text" name="txtStudentID" id="txtStudentID" required><br><br>

    <label for="">Event Name </label>
    <?php bind_Event_List($conn); ?><br><br>

    <input type="submit" name="btnSubmitAttendance" id="btnSubmitAttendance">
</form>