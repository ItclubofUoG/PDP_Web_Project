<body>
  <div class="Device-Container">
    <h1 class="mn-title">Manage Device</h1>
    <hr class="orange-line" />
    <!-- div of table -->
    <div class="device-container">
      <div class="device-head">
        <span class="dv-title">Your Device: </span>
        <input type="submit" value="Add New Device" class="btn-add-device js-add-event">
      </div>
      <div class="device-body">
        <!--Start Table Manage User -->
        <div class="main-table">
          <table class="table-admin">
            <tr class="table-head">
              <th class="head-row">De.Name</th>
              <th class="head-row">De.Department</th>
              <th class="head-row">De.UID</th>
              <th class="head-row">De.Mode</th>
              <th class="head-row">Config</th>
            </tr>

            <?php
            include("./connectDB.php");
            $sql = "SELECT * FROM device ORDER BY id DESC";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
              echo '<p class="error">SQL Error</p>';
            } else {
              mysqli_stmt_execute($result);
              $resultl = mysqli_stmt_get_result($result);
              while ($row = mysqli_fetch_assoc($resultl)) {
            ?>
                <tr class="table-body">
                  <td class="body-row"><?php echo $row["device_name"] ?></td>
                  <td class="body-row"><?php echo $row["device_dep"] ?></td>
                  <td class="body-row">
                    <div class="btn-table">
                      <!-- <input type="button" value="Reload" class="btn-reload"> -->
                      <a class="btn-reload" style="text-decoration: none" onclick="return confirm('Are you sure to reload?');" href="./Process/manageDeviceController.php?function=reload&&deviceid=<?php echo $row["id"] ?>">Reload</a>
                      <p style="color: black; display:flex; align-items:center;">&nbsp;&nbsp;&nbsp;<?php echo $row["device_uid"] ?></p>
                    </div>

                  </td>
                  <td class="body-row">
                    <form action="./Process/manageDeviceController.php?function=updatemode&&deviceid=<?php echo $row['id'] ?>" class="de-mode text-input" method="POST">
                      <div class="btn-table">

                        <?php if ($row["device_mode"] == 0) { ?>
                          <input type="submit" name="btn_attendance" id="btn_attendance" value="Attendance" class="btn-attendence" style="background-color: blue; font-weight:bold; text-decoration:underline">
                          <input type="submit" name="btn_enroll" id="btn_enroll" value="Enrollment" class="btn-enroll">
                        <?php } else { ?>
                          <input type="submit" name="btn_attendance" id="btn_attendance" value="Attendance" class="btn-attendence">
                          <input type="submit" name="btn_enroll" id="btn_enroll" value="Enrollment" class="btn-enroll" style="background-color: blue; font-weight:bold;text-decoration:underline">
                        <?php } ?>

                      </div>
                    </form>
                  </td>
                  <td class="body-row">
                    <div class="btn-table">
                      <!-- <input type="button" value="Delete" class="btn-delete-device"> -->
                      <a class="btn-delete-device" style="text-decoration: none;" onclick="return confirm('Are you sure to delete?');" href="./Process/manageDeviceController.php?function=delete&&deviceid=<?php echo $row["id"] ?>">Delete</a>
                    </div>
                  </td>
                </tr>

            <?php }
            } ?>
          </table>
        </div>
        <!-- End table -->
      </div>
    </div>
  </div>

  <!-- Modal add Device -->
  <div class="modal-add-container js-modal-add">
    <div class="modal-content js-modal-content-add">
      <div class="modal-head">
        <h2 class="modal-label">Add New Device</h2>
        <a class="modal-close js-modal-close-add-event">X</a>
      </div>
      <form action="./Process/manageDeviceController.php?function=add" class="modal-body" id="adddevice" method="POST">
        <div class="modal-input">
          <input type="text" id="adddevicename" name="adddevicename" class="modal-input-box" placeholder="Device Name" />
          <span class="alert-error-modal"></span>
        </div>
        <div class="modal-input">
          <input type="text" id="adddevicelocation" name="adddevicedep" class="modal-input-box" placeholder="Department (Location)" />
          <span class="alert-error-modal"></span>
        </div>
        <div class="modal-footer">
          <div class="btn-footer">
            <input type="submit" class="btn-add-modal" value="Add" />
          </div>
        </div>
      </form>
    </div>
  </div>

  <!--End modal add device  -->

  <script src="./Assets/js/ModalManageDevice.js"></script>
  <script src="./Assets/js/Validation.js"></script>
  <script src="./Assets/js/ManageAdmin.js"></script>
</body>