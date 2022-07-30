<?php
include_once('./Libs/index.php');
include_once('./connectDB.php');
?>


<body>

    <div class="major-container">
        <h1 class="mn-title">Manage Major</h1>
        <hr class="orange-line">

        <!-- Search box -->
        <div class="table-function">
            <input type="submit" class="btn-add-right js-add-major" value="Add New Major">
        </div>
        <!-- End Search box -->

        <!-- Begin Table -->
        <div class="main-table-mn">
            <table class="table-admin-mn">
                <tr class="table-head-mn">
                    <th class="head-row-mn">No.</th>
                    <th class="head-row-mn">Major Name</th>
                </tr>

                <?php

                $sql = "SELECT * FROM major order by major_id asc";
                $result = mysqli_query($conn, $sql);
                $no = 1;
                while ($row = mysqli_fetch_array($result,  MYSQLI_ASSOC)) {
                    if ($row['major_id'] != 0) {
                ?>
                        <tr class="table-body-mn">
                            <td class="body-row-mn"><?php echo $row["major_id"]; ?></td>
                            <td class="body-row-mn"><a style="color: blue; font-weight: bold; text-decoration: none" class="choose-user js-update-major" href="?page=major&&id=<?php echo $row["major_id"]; ?>"><?php echo $row["major_name"]; ?></a></td>
                        </tr>
                <?php
                    }
                    $no++;
                }
                ?>
            </table>
        </div>
        <!-- End Table -->

        <script>
            function open_modal() {
                const UpdateMajors = document.querySelectorAll('.js-update-major') //sellect the class used to use js
                const modalclose = document.querySelector('.js-modal-close-update-major')
                const ModalContent = document.querySelector('.js-modal-content-update')
                const modal = document.querySelector('.js-modal')
                modal.classList.add('open')
            }
        </script>

        <!-- Modal add Major -->
        <div class="modal-add-container js-modal-add">
            <div class="modal-content js-modal-content-add">
                <div class="modal-head">
                    <h2 class="modal-label">Add New Major</h2>
                    <a class="modal-close js-modal-close-add-major">X</a>
                </div>
                <form action="./Process/major.php?function=addMajor" class="modal-body" id="addmajor" method="POST">
                    <div class="modal-input">
                        <input type="text" id="addmajorname" name="addmajorname" class="modal-input-box" placeholder="Major Name">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-footer">
                            <input type="submit" class="btn-add-modal" value="Add">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!--End modal add Major  -->

        <!-- Start modal update and delete -->
        <div class="modal-container js-modal">
            <div class="modal-content js-modal-content-update">
                <div class="modal-head">
                    <h2 class="modal-label">Update Major Information</h2>
                    <a class="modal-close js-modal-close-update-major">X</a>
                </div>
                <form action="./Process/major.php?function=updateMajor" class="modal-body" id="updatemajor" method="POST">
                    <div class="modal-input">
                        <?php
                        if (isset($_GET['id'])) {
                            echo '<script type="text/javascript">',
                            'open_modal();',
                            '</script>';
                            $id = $_GET['id'];
                            $result = mysqli_query($conn, "SELECT * FROM major where major_id='$id'");
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        }
                        ?>
                        <input type="hidden" id="updatemajorid" name="updatemajorid" class="modal-input-box" value="<?php echo $row['major_id'] ?>">
                        <input type="text" id="updatemajorname" name="updatemajorname" class="modal-input-box" placeholder="Title" value="<?php echo $row['major_name'] ?>">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-footer">
                            <input type="submit" class="btn-update" value="Update">
                            <a href="./Process/major.php?function=deleteMajor&&id=<?php echo $row['major_id'] ?>" style="width:30%;" onclick="return confirm('Students info related to this major will also be deleted. Are you sure?')">
                                <input type="button" value="Delete" class="btn-delete-user">
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End modal -->

    </div>
    <!-- Script modal update -->
    <script src="./Assets/js/ModalManageMajor.js"></script>
    <script src="./Assets/js/Validation.js"></script>
    <script src="./Assets/js/ManageAdmin.js"></script>
    <!-- End Script modal update -->

</body>