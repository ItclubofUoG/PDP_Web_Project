<?php
    include_once("../Model/connectDB.php");
  $err ="";

  // add and check if the value is exist
  if(isset($_POST["btn_add_course"])){
    $name = isset($_POST["inputName"])?$_POST['inputName']:"";

    if($name ==""){
      $err .="<li>Enter Category Name </li>"; 
    }
    if(empty($err)){
      $sql = "SELECT * FROM course WHERE course_name ='$name'";
      $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)== 0){
          $sql = "INSERT INTO `course`(`course_name`) VALUES ('$name')";
          mysqli_query($conn,$sql);
          echo '<script type="text/javascript">window.alert("Add success");</script>';
        }
        } else{
          $err .= "<li>Duplicate</li>";
          echo '<script type="text/javascript">window.alert("Duplicate");</script>';
          }
  }
  

  // delete the course and related student
  if(isset($_POST["btn_delete_course"])){
    $name = isset($_POST["inputName"])?$_POST['inputName']:"";
    $sql = "SELECT * FROM `course` WHERE `course_name` = '$name'";

    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $id = mysqli_fetch_array($result);
    $course_id = $id['course_id'];
    $sql = "SELECT * FROM `user` WHERE `course_id` = '$course_id'";
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    
    while($row = mysqli_fetch_array($result)) {
        $student_id = $row['student_id'];
        $sql = "DELETE FROM `user_log` WHERE student_id = '$student_id'";
        mysqli_query($conn,$sql);
    }
    $sql = "DELETE FROM `user` WHERE `course_id` = '$course_id'";
    mysqli_query($conn,$sql);
    $sql = "DELETE FROM `course` WHERE `course_id` = '$course_id'";
    mysqli_query($conn,$sql);
    }

    

    if(isset($_POST["btn_update_course"])){
      $name = isset($_POST["inputName"])?$_POST['inputName']:"";
      $sql = "SELECT * FROM course WHERE course_name ='$name'";
      $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
      if(mysqli_num_rows($result)== 0){
        
          $sql = "UPDATE `course` SET `course_name`='$name' WHERE `course_name` = $name";
          mysqli_query($conn,$sql);
          echo '<script type="text/javascript">window.alert("Update success");</script>';
      } else{
          $err .= "<li>Duplicate</li>";
          echo '<script type="text/javascript">window.alert("Duplicate");</script>';
        }
      }
?>