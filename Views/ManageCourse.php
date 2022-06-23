<?php
include_once('./Libs/index.php');
include_once('./connectDB.php');
?>

<body>

    <div class="course-container">
        <h1 class="mn-title">Manage Courses</h1>
        <hr class="orange-line">

        <!-- Search box -->
        <div class="table-function">
            <input type="submit" class="btn-add-right js-add-course" value="Add New Course">
        </div>
        <!-- End Search box -->

        <!-- Begin Table -->
        <div class="main-table">
            <table class="table-admin">
                <tr class="table-head">
                    <th class="head-row">No. </th>
                    <th class="head-row">Course Name</th>
                </tr>
                <?php

                $sql = "SELECT * FROM course order by course_id desc";
                $result = mysqli_query($conn, $sql);
                $no = 1;
                while ($row = mysqli_fetch_array($result,  MYSQLI_ASSOC)) {
                    if ($row['course_id'] != 0) {
                ?>
                        <tr class="table-body">
                            <td class="body-row"><?php echo $no ?></td>
                            <td class="body-row"><a href="?page=course&&id=<?php echo $row["course_id"]; ?>" style="color: blue; font-weight: bold; text-decoration: none" class="choose-user js-update-course"><?php echo $row["course_name"]; ?></a></td>

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
            function open_course_modal() {
                const UpdateMajors = document.querySelectorAll('.js-update-course') //sellect the class used to use js
                const modalclose = document.querySelector('.js-modal-close-update-course')
                const ModalContent = document.querySelector('.js-modal-content-update')
                const modal = document.querySelector('.js-modal')
                modal.classList.add('open')
            }
        </script>
        <!-- Modal add Course -->
        <div class="modal-add-container js-modal-add">
            <div class="modal-content js-modal-content-add">
                <div class="modal-head">
                    <h2 class="modal-label">Add New Course</h2>
                    <a class="modal-close js-modal-close-add-course">X</a>
                </div>
                <form action="./Process/course.php?function=addCourse" class="modal-body" id="addcourse" method="POST">
                    <div class="modal-input">
                        <input type="text" id="addcoursename" name="addcoursename" class="modal-input-box" placeholder="Course Name">
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

        <!--End modal add Course  -->

        <!-- Start modal update and delete -->
        <div class="modal-container js-modal">
            <div class="modal-content js-modal-content-update">
                <div class="modal-head">
                    <h2 class="modal-label">Update Course Information</h2>
                    <a class="modal-close js-modal-close-update-course">X</a>
                </div>
                <form action="./Process/course.php?function=updateCourse" class="modal-body" id="updatecourse" method="POST">
                    <div class="modal-input">
                        <?php
                        if (isset($_GET['id'])) {
                            echo '<script type="text/javascript">',
                            'open_course_modal();',
                            '</script>';
                            $id = $_GET['id'];
                            $result = mysqli_query($conn, "SELECT * FROM course where course_id='$id'");
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        }
                        ?>
                        <input type="hidden" id="updatecourseid" name="updatecourseid" class="modal-input-box" value="<?php echo $row['course_id'] ?>">
                        <input type="text" id="updatecoursename" name="updatecoursename" class="modal-input-box" placeholder="Course Name" value="<?php echo $row['course_name'] ?>">
                        <span class="alert-error-modal"></span>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-footer">
                            <input type="submit" class="btn-update" value="Update">
                        </div>
                        <div class="btn-footer">
                            <!-- <input type="submit" class="btn-delete" value="Delete"> -->
                            <a href="./Process/course.php?function=deleteCourse&&id=<?php echo $row['course_id'] ?>" class="btn-delete" style="text-align: center; text-decoration: none; font-size: 14px;" onclick="return confirm('Students info related to this course will also be deleted. Are you sure?')">Delete</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End modal -->
    </div>
    <!-- Script modal add -->
    <script src="./Assets/js/ModalCourse.js"> </script>
    <script src="./Assets/js/Validation.js"></script>
    <script src="./Assets/js/ManageAdmin.js"></script>
    <!-- End Script modal update -->

</body>
