<?php
include_once('./Libs/index.php');
include_once('./connectDB.php');
if ($_SESSION["id"] != null) {
    $id = $_SESSION["id"];
    $res = mysqli_query($conn, "SELECT * FROM user WHERE student_id='$id'");
    $row = mysqli_fetch_array($res, MYSQLI_ASSOC);
    
}
?>


<body>

    <div class="changeinfor-wrapper">
        <form class="changepw-form" method="POST" action="./Process/changeInfor.php?function=updateInfo">
            <div class="changepw-title">Update User Information</div>
            <div class="changepw-item">
                <input style="font-size:15px;" type="text" id="stuID" name="stuID" class="changepw-input" placeholder="StudentID" readonly value="<?php echo $row['student_id'] ?>">
            </div>
            <div class="changepw-item">
                <input style="font-size:15px;" type="text" id="stuName" name="stuName" class="changepw-input" placeholder="Student Name" readonly value="<?php echo $row['fullname'] ?>">
            </div>
            <div class="changepw-item">
                <input style="font-size:15px;" type="text" id="stuEmail" name="stuEmail" class="changepw-input" placeholder="Email" readonly value="<?php echo $row['email'] ?>">
            </div>
            <div class="changepw-item">
                <input style="font-size:15px;" type="date" id="stuDoB" name="stuDoB" class="changepw-input" placeholder="Date of Birth" value="<?php echo $row['dob'] ?>">
                <span class="alert-error"></span>
            </div>
            <div class="changepw-item">
                <input style="font-size:15px;" type="phone" id="stuPhone" name="stuPhone" class="changepw-input" placeholder="Phone" value="<?php echo $row['phone'] ?>">
                <span class="alert-error"></span>
            </div>

            <div class="choose-major-infor">
                <span class="infor-title">Major:</span>
                <?php  bind_Major_List($conn,$row['major_id']) ?>
            </div>
            <div class="choose-gender-infor">
                <p class="gender-label">Gender:</p>
                
                <?php
                if ($row['gender'] == 'male') { ?>
                    <input style="font-size:15px;" id="stuGender" type="radio" name="gender" class="type-gender-user" value="male" checked><span>Male</span>
                    <input style="font-size:15px;" id="stuGender" type="radio" name="gender" class="type-gender-user" value="female"><span>Female</span>
                <?php }
                else{ ?>

                    <input id="stuGender" type="radio" name="gender" class="type-gender-user" value="male" ><span>Male</span>
                    <input id="stuGender" type="radio" name="gender" class="type-gender-user" value="female" checked><span>Female</span>
                <?php } ?>                
            </div>

            <div>
                <input type="submit" value="Update Information" class="changepw-btn">
            </div>
        </form>
    </div>


    <script src="./Assets/js/Validation.js"></script>

    <script src="./Assets/js/ValidationInfo.js"></script>

</body>
