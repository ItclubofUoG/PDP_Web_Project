    <body>
        <?php 
        //connect db
        $conn = mysqli_connect('localhost', 'root', '', 'pdp_itclub');
        //find the total records
        $result = mysqli_query($conn, 'select count(student_id) as total from user');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        //find limit and curent page
        $current_page = isset($_GET['pages']) ? $_GET['pages'] : 1;
        $limit = 1;// set the limit of line
        //calculate total page and start page
        $total_page = ceil($total_records / $limit);
        //limit the page from 1 to end
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        //find start page
        $start = ($current_page - 1) * $limit;
        //query and display
        $result = mysqli_query($conn, "SELECT * FROM user LIMIT $start, $limit");
        ?>
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
                    <th class="head-row">Score</th>
                </tr>
            <?php 
            while ($row = mysqli_fetch_assoc($result)){
                ?>
                <tr class="table-body">
                <td class="body-row"><?php echo $row['student_id'] ?></td>
                <td class="body-row"><?php echo $row['fullname'] ?></td>
                <td class="body-row"><?php echo $row['email'] ?></td>
                <td class="body-row"><?php echo $row['gender'] ?></td>
                <td class="body-row"><?php echo $row['dob'] ?></td>
                <td class="body-row"><?php echo $row['phone'] ?></td>
                <td class="body-row"><?php echo $row['major_name'] ?></td>
                <td class="body-row"><?php echo $row['course_name'] ?></td>
                <td class="body-row"><?php echo $rowscores['scores'] ?></td>
            </tr>
            <?php 
            }
            ?>
        </table>
        </div>
        <div class="pag-outline">
            <div class="pag-block">
           
                <!-- display prev when not stay in page 1 -->
                <?php if ($current_page > 1 && $total_page > 1){
                    echo '   <a href="admin.php?page=page&&pages='.($current_page-1).'">Prev</a> |';
                }?>
                <div class="pag-item">
                <?php 
                //loop the between 
                for ($i = 1; $i <= $total_page; $i++){
                    if ($i == $current_page){
                        echo '<span class="pag-number" style="border: 2px solid blue; background-color:#ccc;">'.$i.'</span> | ';
                    }
                    else{
                        echo '<a class="pag-hplink" href="admin.php?page=page&&pages='.$i.'"><div class="pag-number">'.$i.'</div></a> |';
                    }
                }
                ?>
                </div>
                <?php 
                //display btn next when it not be the end page
                if ($current_page < $total_page && $total_page > 1){
                    echo '<a href="admin.php?page=page&&pages='.($current_page+1).'">Next</a> |';
                }?>
            </div>
        </div>
    </body>

