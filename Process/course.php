<?php
include_once("../connectDB.php");
$err = "";

// add and check if the value is exist
// if(isset($_POST["btn_add_course"])){
//   $name = isset($_POST["inputName"])?$_POST['inputName']:"";

//   if($name ==""){
//     $err .="<li>Enter Category Name </li>"; 
//   }
//   if(empty($err)){
//     $sql = "SELECT * FROM course WHERE course_name ='$name'";
//     $result = mysqli_query($conn,$sql);
//       if(mysqli_num_rows($result)== 0){
//         $sql = "INSERT INTO `course`(`course_name`) VALUES ('$name')";
//         mysqli_query($conn,$sql);
//         echo '<script type="text/javascript">window.alert("Add success");</script>';
//       }
//       } else{
//         $err .= "<li>Duplicate</li>";
//         echo '<script type="text/javascript">window.alert("Duplicate");</script>';
//         }
// }


//add course function
if (isset($_GET['function']) && $_GET['function'] == 'addCourse') {
  $course = $_POST['addcoursename'];
  $res = mysqli_query($conn, "SELECT * FROM course WHERE course_name='$course'") or die(mysqli_error($conn));
  if (mysqli_num_rows($res) >= 1) {
    echo "<script type='text/javascript'>alert('Course name already exists');</script>";
    echo "<script> location.href='../admin.php?page=course'</script>";
    exit;
  } else {
    mysqli_query($conn, "INSERT INTO `course`(`course_name`) VALUES ('$course')") or die(mysqli_error($conn));
    echo "<script type='text/javascript'>alert('Add successfully');</script>";
    echo "<script> location.href='../admin.php?page=course'</script>";
    exit;
  }
}


// delete the course and related student
if (isset($_GET['function']) && $_GET['function'] == 'deleteCourse') {
  $name = $_GET['id'];
  $sql = "SELECT * FROM `course` WHERE `course_id` = '$name'";

  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
  $id = mysqli_fetch_array($result);
  $course_id = $id['course_id'];
  $sql = "SELECT * FROM `user` WHERE `course_id` = '$course_id'";
  $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  while ($row = mysqli_fetch_array($result)) {
    $student_id = $row['student_id'];
    $sql = "DELETE FROM `user_log` WHERE student_id = '$student_id'";
    mysqli_query($conn, $sql);
  }
  $sql = "DELETE FROM `user` WHERE `course_id` = '$course_id'";
  mysqli_query($conn, $sql);
  $sql = "DELETE FROM `course` WHERE `course_id` = '$course_id'";
  mysqli_query($conn, $sql);
  echo "<script type='text/javascript'>alert('Delete successfully');</script>";
  echo "<script> location.href='../admin.php?page=course'</script>";
}



if (isset($_GET['function']) && $_GET['function'] == 'updateCourse') {

  // echo 'aaaaaaaaaaaaaaaaaaaaa';
  // $name = isset($_POST["updatecoursename"])?$_POST['updatecoursename']:"";
  // $sql = "SELECT * FROM course WHERE course_name ='$name'";
  // $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
  // if(mysqli_num_rows($result)== 0){

  //     $sql = "UPDATE `course` SET `course_name`='$name' WHERE `course_name` = '$name'";
  //     mysqli_query($conn,$sql);
  //     echo '<script type="text/javascript">alert("Update success");</script>';
  //     echo "<script> location.href='../admin.php?page=course'</script>";
  // } else{
  //     // $err .= "<li>Duplicate</li>";
  //     echo '<script type="text/javascript">window.alert("Duplicate");</script>';
  //   }


  $id = $_POST['updatecourseid'];
  $course = $_POST['updatecoursename'];

  $res = mysqli_query($conn, "SELECT * FROM course") or die(mysqli_error($conn));
  while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
    $course1 = $row['course_name'];
  }
  if ($course == $course1) {
    echo "<script type='text/javascript'>alert('Course name already exists');</script>";
    echo "<script> location.href='../admin.php?page=course'</script>";
    exit;
  } else {
    mysqli_query($conn, "UPDATE `course` SET `course_name`='$course' WHERE course_id='$id'") or die(mysqli_error($conn));
    echo "<script type='text/javascript'>alert('Update successfully');</script>";
    echo "<script> location.href='../admin.php?page=course'</script>";
    exit;
  }
}
