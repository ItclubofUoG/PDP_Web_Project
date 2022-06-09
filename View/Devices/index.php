<!DOCTYPE html>
<html lang="en">

<body>
    <!-- body -->
    <div class="cover-container">
        <p class="head-label-de">Manage Device</p>
        <div class="table-container">
            <div class="table-head-text">
                <p>Your Device:</p>
                <button class="add-divice js-add-device">New Device</button>

            </div>
            <div class="table-body">
                <div class="sub-table">
                    <table class="de-table">
                        <thead>
                            <tr>
                                <th>De.Name</th>
                                <th>De.UID</th>
                                <th>De.Date</th>
                                <th>De.Mode</th>
                                <th>De.Config</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                            <?php
                            require '../../Model/connectDB.php';
                            $sql = "SELECT * FROM device ORDER BY id DESC";
                            $result = mysqli_stmt_init($conn) or die(mysqli_error($conn));
                            if (!mysqli_stmt_prepare($result, $sql)) {
                                echo '<p class="error">SQL Error</p>';
                            } else {
                                mysqli_stmt_execute($result);
                                $resultl = mysqli_stmt_get_result($result);
                                while ($row = mysqli_fetch_assoc($resultl)) { ?>
                                    <tr>
                                        <td><?php echo $row["device_name"] ?></td>
                                        <td>
                                            <div class="de-mode">
                                                <div class="de-reload">
                                                    <a  onclick="return confirm('Are you sure?');" href="../../Controller/ManageDeviceController.php?function=reload&&deviceid=<?php echo $row["id"] ?>">Reload</style=>
                                                </div>
                                                <p><?php echo $row["device_uid"] ?></p>
                                            </div>
                                        </td>
                                        <td><?php echo $row["device_date"] ?></td>
                                        <td>
                                            <form action="../../Controller/manageDeviceController.php?function=updatemode&&deviceid=<?php echo $row["id"] ?>" class="de-mode text-input" method="POST">
                                                <?php if ($row["device_mode"] == 0) { ?>
                                                    <button type="submit" style="background-color: rgb(255, 177, 61); color:#000;" name="enroll" id="enroll" class="de-enroll">Enrollment</button>
                                                    <button type="submit" name="attendance" id="attendance" class="de-enroll">Attendance</button>
                                                <?php } else { ?>
                                                    <button type="submit" name="enroll" id="enroll" class="de-enroll">Enrollment</button>
                                                    <button type="submit" style="background-color: rgb(255, 177, 61); color:#000;" name="attendance" id="attendance" class="de-enroll">Attendance</button>
                                                <?php } ?>
                                            </form>
                                        </td>
                                        <td>
                                            <div class="de-delete">
                                                <a  onclick="return confirm('Are you sure?');" href="../../Controller/manageDeviceController.php?function=delete&&deviceid=<?php echo $row["id"] ?>">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal add new device -->
    <div class="modal-device js-modal-de">
        <div class="modal-de-container js-modal-de-container">
            <div class="md-de-head">
                <div class="de-label">
                    <p>Add New Device</p>
                    <i class="de-close js-de-close">X</i>
                </div>
            </div>
            <form id="formadd" action="../../Controller/ManageDeviceController.php?function=add" method="POST" class="md-de-body">
                <div class="de-input">
                    <div class="form-group">
                        <p class="input-label">Device Name:</p>
                        <input name="devicename" id="devicename" type="text" class="input-box" placeholder="Enter device name please!!!">
                        <p class="error" style="margin-bottom: 0; margin-bottom: 1px;"></p>
                    </div>
                </div>
                <div class="de-button">
                    <button name="btn_add" id="btn_add" type="submit" class="add-new-de">Create New Device</button>
                    <button type="exit" class="close-de-md js-de-md-close">Close</button>
                </div>
            </form>
        </div>
    </div>
    <!-- end body -->
    <!-- End modal -->
    <script>
        const AddDe = document.querySelectorAll('.js-add-device') //sellect the class use to use js
        const closeAdd = document.querySelector('.js-de-close')
        const modalDe = document.querySelector('.js-modal-de')
        const Decontainer = document.querySelector('.js-modal-de-container')
        const closebtn = document.querySelector('.js-de-md-close')

        function showModal() {
            modalDe.classList.add('open')
        }

        for (const AddDes of AddDe) {
            AddDes.addEventListener('click', showModal)
        }

        function hideModal() {
            modalDe.classList.remove('open')
        }
        closeAdd.addEventListener('click', hideModal)
        closebtn.addEventListener('click', hideModal)

        modalDe.addEventListener('click', hideModal)

        Decontainer.addEventListener('click', function(event) {
            event.stopPropagation() //stop nổi bọt
        })
    </script>
    <script src="./js/validator.js"></script>
    <script>
        Validator({
            form: '#formadd',
            formGroupSelector: '.form-group',
            errorSelector: '.error',
            rules: [
                Validator.isRequired('#devicename', 'this feild can not empty'),
                Validator.isRequired('#departmentname', 'this feild can not empty'),
            ],
        });
    </script>
</body>