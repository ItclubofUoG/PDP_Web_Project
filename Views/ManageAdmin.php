<body>
    <div class="course-container">
        <h1 class="mn-title">Manage Admin</h1>
        <hr class="orange-line">
        <!-- Search box -->
        <div class="table-function">
            <input type="submit" class="btn-add-right js-add-admin" value="Add New Admin">
        </div>
        <!-- End Search box -->

        <!-- Begin Table -->
        <div class="main-table">
            <table class="table-admin">
                <tr class="table-head">
                    <th class="head-row">No. </th>
                    <th class="head-row">Admin Name</th>
                    <th class="head-row">Admin Email</th>
                </tr>

                <?php
                include("./connectDB.php");
                $sql = "SELECT * FROM admin";
                $no = 1;
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                ?>
                    <tr class="table-body">
                        <td class="body-row"> <?php echo $no ?> </a> </td>
                        <td class="body-row"><a href="?page=admin&&id=<?php echo $row['id'] ?>" style="font-weight: bold; color: blue; text-decoration: none" class="choose-user js-update-admin"><?php echo $row['admin_name'] ?></a></td>
                        <td class="body-row"><?php echo $row['admin_email'] ?></td>
                    </tr>
                <?php $no++;
                } ?>
            </table>
        </div>
        <!-- End Table -->
        <script>
            function open_admin() {
                const Updates = document.querySelectorAll('.js-update-admin') //sellect the class used to use js
                const modalclose = document.querySelector('.js-modal-close-update-admin')
                const ModalContent = document.querySelector('.js-modal-content-update-admin')
                const modalad = document.querySelector('.js-modal-update-admin')
                modalad.classList.add('open')
            }
        </script>
        <!-- Start modal add admin -->
        <div class="modal-add-admin-container js-modal-add-admin">
            <div class="modal-content js-modal-content-add-admin">
                <div class="modal-head">
                    <h2 class="modal-label">Add New Account</h2>
                    <a class="modal-close js-modal-close-add-admin">X</a>
                </div>
                <form action="./Process/manageAdmin.php?function=addAdmin" method="POST" class="modal-body" id="addAd">
                    <div class="modal-input">
                        <input type="text" id="adnameadd" name="adnameadd" class="modal-input-box" placeholder="Admin Name">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="email" id="admailadd" name="admailadd" class="modal-input-box" placeholder="Admin Email">
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
        <!--End modal add admin  -->

        <!-- Start modal update and delete -->
        <div class="modal-update-admin-container js-modal-update-admin">
            <div class="modal-content js-modal-content-update-admin">
                <div class="modal-head">
                    <h2 class="modal-label">Update Account</h2>
                    <a class="modal-close js-modal-close-update-admin">X</a>
                </div>
                <form action="./Process/manageAdmin.php?function=updateAdmin" method="POST" class="modal-body" id="updateAd">
                    <div class="modal-input">
                        <?php
                        if (isset($_GET['id'])) {
                            echo '<script type="text/javascript">',
                            'open_admin();',
                            '</script>';
                            $id = $_GET['id'];
                            $result = mysqli_query($conn, "SELECT * FROM admin where id='$id'");
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        }
                        ?>
                        <input type="hidden" name="adIDupdate" id="adIDupdate" value="<?php echo $row['id'] ?>">
                        <input type="text" id="adnameupdate" name="adnameupdate" value="<?php echo $row['admin_name'] ?>" class="modal-input-box" placeholder="Admin Name">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="email" id="admailupdate" name="admailupdate" value="<?php echo $row['admin_email'] ?>" class="modal-input-box" placeholder="Admin Email">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-footer">
                            <input type="submit" class="btn-update" value="Update">
                        </div>
                        <div class="btn-footer">
                            <!-- <input type="submit" class="btn-delete" value="Delete"> -->
                            <a class="btn-delete" style="text-align: center; text-decoration: none; font-size: 14px;" href="./Process/manageAdmin.php?function=deleteAdmin&&id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to delete')">Delete admin</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <!-- End modal -->
    </div>

    <!-- Start script -->
    <script src="./Assets/js/ModalAdmin.js"></script>
    <script src="./Assets/js/Validation.js"></script>
    <script src="./Assets/js/ManageAdmin.js"> </script>
    <!-- End script -->
</body>