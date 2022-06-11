
<?php 
include_once("../Model/connectDB.php");
include("../Libs/index.php");
// FIllter with Month to Month, Major and Course 
if(isset($_POST['btn_fillter'])){

   ?>
        <div>
            <table class = "table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Day of birth</th>
                        <th>Major</th>
                        <th>Course</th>
                        <th>Scores</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $resArray = Get_result_querry();
                        $res = mysqli_query($conn,(String)$resArray[0]);
                        $month_begin = $resArray[1];
                        $month_end = $resArray[2];
                        while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
                            $student_id = $row['student_id'];
                            $res_sum = mysqli_query($conn,"SELECT SUM(scores) FROM user_log Where student_id = '$student_id' 
                            && MONTH(checkin_date) >='$month_begin'  && MONTH(checkin_date) <= '$month_end'");
                    ?>
                        <tr>
                                <td><?php echo $row['student_id'] ?></td>
                                <td><?php echo $row['fullname'] ?></td>
                                <td><?php echo $row['phone'] ?></td>
                                <td><?php echo $row['gender'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['dob'] ?></td>
                                <td><?php echo $row['major_id'] ?></td>
                                <td><?php echo $row['course_id'] ?></td>
                                 <!-- Show Total Scores -->
                                <?php while($row = mysqli_fetch_array($res_sum,MYSQLI_ASSOC)){ ?>
                                <td><?php echo $row['SUM(scores)'] ?></td>
                               <?php } ?>
                        </tr>
                    <?php } ?> 
                </tbody>
            </table>
        </div>
 
   
<?php } 
    $out = "";
    if(isset($_POST['btn_ToExel'])){
        $resArray = Get_result_querry();
        $res = mysqli_query($conn,(String)$resArray[0]);
         $month_begin = $resArray[1];
         $month_end = $resArray[2];
        if((mysqli_num_rows($res)) > 0){
            $out.=' <table class="table" border="1">
            <thead>
                <tr>

                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Day of birth</th>
                    <th>Major</th>
                    <th>Course</th>
                    <th>Scores</th>
                </tr>
            </thead>';
            while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){
                $student_id = $row['student_id'];
                $res_sum = mysqli_query($conn,"SELECT SUM(scores) FROM user_log Where student_id = '$student_id' 
                && MONTH(checkin_date) >='$month_begin'  && MONTH(checkin_date) <= '$month_end'");
                $out .=' 
                        <tbody>
                            <tr>
                                    <td>' . $row['student_id'] .'</td>
                                    <td>'. $row['fullname'] .'</td>
                                    <td>'. $row['phone'] .'</td>
                                    <td>'.$row['gender'] .'</td>
                                    <td>'. $row['email'] .'</td>
                                    <td>'.$row['dob'] .'</td>
                                    <td>'. $row['major_id'] .'</td>
                                    <td>'. $row['course_id'] .'</td>
                    ';
                while($row = mysqli_fetch_array($res_sum,MYSQLI_ASSOC)){
                    $out.='
                                <td>'. $row['SUM(scores)'] .'</td>
                               
                    ';
                }
                $out.='
                </tr>
             </tbody>';
                
            }
            header('Content-Type: application/xls');
            header('Content-Disposition: attachment; filename=User.xls');
            echo $out;
        }
    }
    
?>
<?php
    if(isset($_POST['btn_search'])){
        $month = isset($_POST['date']) ? date("m",strtotime($_POST['date'])) : "1";
        echo $month;
 ?>

         <div>
            <table class = "table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Event Name</th>
                        <th>Time in</th>
                        <th>Time Out</th>
                        <th>Scores</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sum = 0;
                        $res = mysqli_query($conn,"SELECT * FROM user_log WHERE Month(checkin_date) >='$month' && student_id ='GCC200002'");
                        
                        while($row = mysqli_fetch_array($res,MYSQLI_ASSOC)){

                              $event_id =$row['event_id'];
                              $sum += $row['scores'];
                              $res_name = mysqli_query($conn,"SELECT fullname FROM user WHERE student_id = 'GCC200002' ");
                              $res_eventname = mysqli_query($conn,"SELECT event_title FROM event WHERE event_id = '$event_id'");
                              echo $row['checkin_date'];
                    ?>  
                        <tr>
                                <?php
                                    $rowStudent = mysqli_fetch_array($res_name,MYSQLI_ASSOC)
                                ?>
                                    <td><?php echo $rowStudent['fullname'] ?></td>
                                <?php        
                                    
                                ?>
                                
                                
                                    <td><?php echo $row['checkin_date'] ?></td>
                               
                                <?php
                                    $rowEvent = mysqli_fetch_array($res_eventname,MYSQLI_ASSOC)
                                ?>
                                    <td><?php echo $rowEvent['event_title'] ?></td>
                               
                                    <td><?php echo $row['time_in'] ?></td>
                                    <td><?php echo $row['time_out'] ?></td>
                                    <td><?php echo $row['scores'] ?></td>
            
                            </tr>
                        <?php } ?>
                                <td><?php echo $sum ?></td>
                        
                </tbody>
            </table>
        </div>
 <?php
    }
?>
