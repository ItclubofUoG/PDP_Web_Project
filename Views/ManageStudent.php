<body>
    <!-- body -->
    <div class="user-container">
        <h1 class="mn-title">Manage User</h1>
        <hr class="orange-line">
        <!-- search box -->
        <div class="table-function">
            <form action="" class="search" method="POST">
                <div class="search-cover">
                    <input type="text" id="search" name="search" class="search-box" placeholder="Search">
                </div>
                <input class="btn-search" id="btn-search" name="btn-search" type="submit" value="Search">
            </form>
        </div>
        <!-- End search box -->

        <!--Start Table Manage User -->
        <div class="main-table">
            <table class="table-admin">
                <tr class="table-head">
                    <th class="head-row">Student ID</th>
                    <th class="head-row">Full name</th>
                    <th class="head-row">Email</th>
                    <th class="head-row">Gender</th>
                    <th class="head-row">Date of Birth</th>
                    <th class="head-row">Phone</th>
                    <th class="head-row">Major</th>
                    <th class="head-row">Course</th>
                    <th class="head-row">Card Number</th>
                    <th class="head-row">Score</th>
                </tr>
                <?php
                include("./connectDB.php");
                //find the total records
                $result = mysqli_query($conn, 'select count(student_id) as total from user');
                $row = mysqli_fetch_assoc($result);
                $total_records = $row['total'];
                //find limit and current page
                $current_page = isset($_GET['pages']) ? $_GET['pages'] : 1;
                $limit = 15;  // set the limit of line in page
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
                if (isset($_POST['btn-search'])) {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM user a, major b, course c WHERE a.student_id LIKE '%$search%' and a.major_id=b.major_id and a.course_id=c.course_id OR a.fullname LIKE '%$search%' and a.major_id=b.major_id and a.course_id=c.course_id  LIMIT $start, $limit";
                } else {
                    $sql = "SELECT * FROM user a, major b, course c WHERE a.major_id=b.major_id and a.course_id=c.course_id LIMIT $start, $limit";
                }
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $student_id = $row['student_id'];
                    $res = mysqli_query($conn, "SELECT SUM(scores) as scores FROM `user_log` WHERE student_id='$student_id'");
                    $rowscores = mysqli_fetch_array($res, MYSQLI_ASSOC);
                ?>
                    <tr class="table-body">
                        <td class="body-row">
                            <a style="font-weight: bold; color: blue;" class="choose-user js-update-user" href="?page=student&&stuid=<?php echo $row['student_id'] ?>"><?php echo $row['student_id'] ?></a>
                        </td>
                        <td class="body-row"><?php echo $row['fullname'] ?></td>
                        <td class="body-row"><?php echo $row['email'] ?></td>
                        <td class="body-row"><?php echo $row['gender'] ?></td>
                        <td class="body-row"><?php echo $row['dob'] ?></td>
                        <td class="body-row"><?php echo $row['phone'] ?></td>
                        <td class="body-row"><?php echo $row['major_name'] ?></td>
                        <td class="body-row"><?php echo $row['course_name'] ?></td>
                        <td class="body-row"><?php echo $row['card_uid'] ?></td>
                        <td class="body-row"><?php echo $rowscores['scores'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <!-- End table -->

        <script>
            function open_modal() {
                const UpdateUsers = document.querySelectorAll('.js-update-user') //sellect the class use to use js
                const modalclose = document.querySelector('.js-modal-close-update-user')
                const ModalContent = document.querySelector('.js-modal-content-update-user')
                const modal = document.querySelector('.js-modal')
                modal.classList.add('open')
            }
        </script>

        <!-- Start Modal Update/Delete-->
        <div class="modal-container js-modal">
            <div class="modal-content js-modal-content-update-user">
                <div class="modal-head">
                    <h2 class="modal-label">Update User</h2>
                    <a class="modal-close js-modal-close-update-user">X</a>
                </div>
                <form method= "POST" action="./Process/student.php" class="modal-body" id="updateuser">
                    <?php if (isset($_GET['stuid'])) {
                        echo '<script type="text/javascript">',
                        'open_modal();',
                        '</script>';
                        $student_id = $_GET['stuid'];
                        $result_update = mysqli_query($conn, "SELECT * FROM user WHERE student_id='$student_id'");
                        $row_update = mysqli_fetch_array($result_update, MYSQLI_ASSOC);
                        $res = mysqli_query($conn, "SELECT SUM(scores) as scores FROM `user_log` WHERE student_id='$student_id'");
                        $rowscores = mysqli_fetch_array($res, MYSQLI_ASSOC);
                    } ?>
                    <div class="modal-input">
                        <input type="text" value="<?php echo $row_update['student_id'] ?>" id="student_id" name="student_id" class="modal-input-box" placeholder="Student ID">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="text" value="<?php echo $row_update['fullname'] ?>" id="fullname" name="fullname" class="modal-input-box" placeholder="Fullname">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="text" class="modal-input-box" value="<?php echo $row_update['email'] ?>" id="email" name="email" placeholder="Email">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <p class="gender-label">Gender:</p>
                        <?php if (strtolower($row_update['gender']) == 'male') { ?>
                            <div class="gender">
                                <input type="radio" checked value="male" name="gender" id="gender"> <span class="type-gender">Male</span>
                                <input type="radio" value="female" name="gender" id="gender"> <span class="type-gender">Female</span>
                            </div>
                        <?php } else { ?>
                            <div class="gender">
                                <input type="radio" value="male" name="gender" id="gender"> <span class="type-gender">Male</span>
                                <input type="radio" value="female" checked name="gender" id="gender"> <span class="type-gender">Female</span>
                            </div>
                        <?php } ?>

                    </div>
                    <div class="modal-input">
                        <input type="date" id="dob" name="dob" value="<?php echo $row_update['dob'] ?>" class="modal-input-box" placeholder="Date of Birth">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="text" id="phone" name="phone" value="<?php echo $row_update['phone'] ?>" class="modal-input-box" placeholder="Phone">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input type="text" id="card_uid" name="card_uid" value="<?php echo $row_update['card_uid'] ?>" class="modal-input-box" placeholder="Card Number">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-input">
                        <input readonly type="text" value="<?php echo $rowscores['scores'] ?>" class="modal-input-box" placeholder="Score">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-footer">
                            <input type="submit" value="Update" name="btn_update" id="btn_update" class="btn-update">
                        </div>
                        <div class="btn-footer">
                            <input type="reset" value="Delete" class="btn-delete">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Modal -->

    </div>
    <!-- Script Modal Update -->
    <script src="./Assets/js/ModalManageUser.js"></script>
    <script src="./Assets/js/Validation.js"></script>
    <script src="./Assets/js/ManageAdmin.js"></script>
    <!-- End Script modal update -->


    <!-- pagination page started here -->
    <div class="pag-outline">
        <div class="pag-block">
            <!-- display prev when not stay in page 1 -->
            <?php if ($current_page > 1 && $total_page > 1) {
                echo '   <a href="admin.php?page=student&&pages=' . ($current_page - 1) . '">Prev |</a>';
            } ?>
            <div class="pag-item">
                <?php
                //loop the between 
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($i == $current_page) {
                        echo '<span class="pag-number" style="border: 2px solid blue; background-color:#ccc;">' . $i . '</span> | ';
                    } else {
                        echo '<a class="pag-hplink" href="admin.php?page=student&&pages=' . $i . '"><div class="pag-number">' . $i . '</div></a> |';
                    }
                }
                ?>
            </div>
            <?php
            //display btn next when it not be the end page
            if ($current_page < $total_page && $total_page > 1) {
                echo '<a href="admin.php?page=student&&pages=' . ($current_page + 1) . '">Next</a>';
            } ?>
        </div>
    </div>

</body>