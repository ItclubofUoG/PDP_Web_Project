<body>
    <div class="list-container">
        <h1 class="mn-title">List Of Students</h1>
        <hr class="orange-line">
        <div class="table-function">
            <form action="" class="search" method="POST">
                <div class="search-cover">
                    <input type="text" id="search" name="search" class="search-box" placeholder="Search">
                </div>
                <input class="btn-search" type="submit" id="btn-search" name="btn-search" value="Search">
            </form>
            <input class="btn-add-right js-filter" type="button" value="Filter">
        </div>

        <div class="main-table-mn">
            <table class="table-admin-mn">
                <tr class="table-head-mn">
                    <!-- <th class="head-row-mn">No.</th> -->
                    <th class="head-row-mn">Student ID</th>
                    <th class="head-row-mn">Full name</th>
                    <th class="head-row-mn">Major</th>
                    <th class="head-row-mn">Course</th>
                    <th class="head-row-mn">Score</th>
                </tr>
                <?php
                include("./connectDB.php");
                include('./Libs/index.php');
                // $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                //find the total records
                if (isset($_GET['func']) && $_GET['func'] == 'filter') {
                    $sql = $_GET['sql'];
                    if ($sql == '0') {
                        $total_records = 0;
                    } else {
                        $result = mysqli_query($conn, $sql);
                        $total_records = mysqli_num_rows($result);
                    }
                } else {
                    $result = mysqli_query($conn, 'select count(student_id) as total from user');
                    $row = mysqli_fetch_assoc($result);
                    $total_records = $row['total'];
                }
                //find the total records
                //find limit and current page
                $current_page = isset($_GET['pages']) ? $_GET['pages'] : 1;
                $limit = 25;  // set the limit of line in page
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
                    if ($_POST['search'] == "") {
                        echo "<script>window.location='admin.php?page=home'</script>";
                    } else {
                        $search = $_POST['search'];
                        $sql = "SELECT * FROM user a, major b, course c WHERE a.student_id LIKE '%$search%' and a.major_id=b.major_id and a.course_id=c.course_id OR a.fullname LIKE '%$search%' and a.major_id=b.major_id and a.course_id=c.course_id LIMIT $start, $limit ";
                        $result = mysqli_query($conn, $sql);
                        $total_records = mysqli_num_rows($result);
                    }
                } elseif (isset($_GET['func']) && $_GET['func'] == 'filter') {
                    if ($_GET['sql'] == '0') {
                        $sql = '0';
                    } else {
                        $sql = $_GET['sql'] . " LIMIT $start, $limit";
                        // echo $sql;
                    }
                } else {
                    $sql = "SELECT * FROM user a, major b, course c WHERE a.major_id = b.major_id and a.course_id = c.course_id LIMIT $start, $limit";
                }
                // echo $sql;
                // check condition
                // echo $sql;
                if ($sql != '0') {
                    $res_student = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                    //query and display
                    if (mysqli_num_rows($res_student) > 0) {
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $student_id = $row['student_id'];
                            if (!empty($_GET['startDate']) && empty($_GET['endDate'])) {
                                $startDate = $_GET['startDate'];
                                $sql = "SELECT SUM(scores) as scores FROM `user_log` WHERE student_id='$student_id' AND checkin_date >='$startDate'";
                            } elseif (empty($_GET['startDate']) && !empty($_GET['endDate'])) {
                                $endDate = $_GET['endDate'];
                                $sql = "SELECT SUM(scores) as scores FROM `user_log` WHERE student_id='$student_id' AND checkin_date <='$endDate'";
                            } elseif (!empty($_GET['startDate']) && !empty($_GET['endDate'])) {
                                $endDate = $_GET['endDate'];
                                $startDate = $_GET['startDate'];
                                $sql = "SELECT SUM(scores) as scores FROM `user_log` WHERE student_id='$student_id' AND checkin_date >='$startDate' AND checkin_date <='$endDate'";
                            } else {
                                $sql = "SELECT SUM(scores) as scores FROM `user_log` WHERE student_id='$student_id'";
                            }
                            $res = mysqli_query($conn, $sql);
                            $resCourseAndMajor = mysqli_query($conn, "SELECT * FROM `user` INNER JOIN `major` ON user.major_id=major.major_id INNER JOIN `course` ON user.course_id=course.course_id WHERE student_id='$student_id'");
                            $cowCourseAndMajor = mysqli_fetch_array($resCourseAndMajor, MYSQLI_ASSOC);
                            $rowscores = mysqli_fetch_array($res, MYSQLI_ASSOC);
                ?>
                            <tr class="table-body-mn">
                                <td class="body-row-mn"><?php echo $row['student_id'] ?></td>
                                <td class="body-row-mn"><?php echo $row['fullname'] ?></td>
                                <td class="body-row-mn"><?php echo $cowCourseAndMajor['major_name'] ?></td>
                                <td class="body-row-mn"><?php echo $cowCourseAndMajor['course_name'] ?></td>
                                <td class="body-row-mn"><?php echo !empty($rowscores['scores']) ? $rowscores['scores'] : 0 ?></td>
                            </tr>
                        <?php
                        } ?>
                    <?php } else { ?>
                    <?php
                    } ?>
                <?php
                } ?>


            </table>
        </div>
        <!--End Table-->

        <!--Start Modal Filer Student-->
        <div class="modal-container-list js-modal-filter">
            <div class="modal-content js-modal-content-filter">
                <div class="modal-head">
                    <h2 class="modal-label"> Filter Student</h2>
                    <a class="modal-close js-modal-close-filter">X</a>
                </div>
                <form action="./Process/members.php" class="modal-body" method="POST">
                    <span class="filter-label"> Filter By Month:</span>
                    <div class="filter-bymonth">
                        <div class="modal-input-month">
                            <input type="date" class="modal-input-box" name="startMonth" id="startMonth" placeholder="Start Month" title="Start month">
                        </div>
                        <p class="filter-label">to</p>
                        <div class="modal-input-month">
                            <input type="date" class="modal-input-box" name="endMonth" id="endMonth" placeholder="End Month" title="End month">
                        </div>
                    </div>
                    <span class="filter-label" for="course">Filter By Course and Major: </span>
                    <div class="filter-bymajor">
                        <div class="choose-course-major">
                            <?php Course_List($conn) ?>
                        </div>
                        <div class="choose-course-major">
                            <?php Major_List($conn) ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="btn-footer">
                            <input class="btn-filter" type="submit" value="Filter" name="btn_filter" id="btn_filter">
                            <input class="btn-export" name="btn_export" id="btn_export" type="submit" value="Export">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Start script -->
    <script>
        const Filters = document.querySelectorAll('.js-filter') //sellect the class used to use js
        const modalcloseFilter = document.querySelector('.js-modal-close-filter')
        const ModalContentFilter = document.querySelector('.js-modal-content-filter')
        const modalfilter = document.querySelector('.js-modal-filter')

        function showModalAdd() {
            modalfilter.classList.add('open')
        }

        for (const Filter of Filters) {
            Filter.addEventListener('click', showModalAdd)
        }

        function hideModalAdd() {
            modalfilter.classList.remove('open')
        }
        modalcloseFilter.addEventListener('click', hideModalAdd)

        ModalContentFilter.addEventListener('click', function(event) {
            event.stopPropagation() //stop nổi bọt
        })
    </script>
    <!-- End script -->

    <!-- pagination page started here -->
    <div class="pag-outline">
        <div class="pag-block">
            <?php if ($total_records >= 25) { ?>
                <!-- display prev when not stay in page 1 -->
                <?php if ($current_page > 1 && $total_page > 1) {
                    echo '   <a href="admin.php?page=student&&pages=' . ($current_page - 1) . '" class="pag-number"><i class="fa-solid fa-angles-left"></i></a>';
                } ?>
                <div class="pag-item">
                    <?php
                    //loop the between 
                    $pageplus = $current_page + 1;
                    if ($total_page > $pageplus) {
                        for ($i = 1; $i <= $pageplus; $i++) {
                            if ($i == $current_page) {
                                echo '<span class="pag-number" style="background-color:orange; color: white;">' . $i . '</span>';
                            } else {
                                echo '<a class="pag-hplink" href="admin.php?page=student&&pages=' . $i . '"><div class="pag-number">' . $i . '</div></a>';
                            }
                        }
                        echo '<a class="pag-hplink" "><div class="pag-number"> ... </div></a>';
                        echo '<a class="pag-hplink" href="admin.php?page=student&&pages=' . $total_page . '"><div class="pag-number">' . $total_page . '</div></a>';
                    } else {
                        for ($i = 1; $i <= $pageplus; $i++) {
                            if ($i == $current_page) {
                                echo '<span class="pag-number" style="background-color:orange; color: white;">' . $i . '</span>';
                            } else {
                                echo '<a class="pag-hplink" href="admin.php?page=student&&pages=' . $i . '"><div class="pag-number">' . $i . '</div></a>';
                            }
                        }
                    }
                    ?>
                </div>
                <?php
                //display btn next when it not be the end page
                if ($current_page < $total_page && $total_page > 1) {
                    echo '<a href="admin.php?page=student&&pages=' . ($current_page + 1) . '" class="pag-number"><i class="fa-solid fa-angles-right"></i></a>';
                } ?>
            <?php } ?>
        </div>
    </div>
</body>

</html>