<?php
//Connect to database
include_once("./connectDB.php");
//Import function in Libs
include("./Libs/index.php");
//date_default_timezone_set('Asia/Damascus');
date_default_timezone_set('Asia/Ho_Chi_Minh');
$d = date("Y-m-d");
$t = date("H:i:sa");
if (isset($_GET['card_uid']) && isset($_GET['device_token'])) {
    $card_uid = $_GET['card_uid'];
    $device_uid = $_GET['device_token'];

    $sql = "SELECT * FROM device WHERE device_uid=?";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo "SQL_Error_Select_device";
        exit();
    } else {
        mysqli_stmt_bind_param($result, "s", $device_uid);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        if ($row = mysqli_fetch_assoc($resultl)) {
            $device_mode = $row['device_mode'];
            if ($device_mode == 1) {
                $sql = "SELECT * FROM user WHERE card_uid=?";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_Select_card";
                    exit();
                } else {
                    mysqli_stmt_bind_param($result, "s", $card_uid);
                    mysqli_stmt_execute($result);
                    $resultl = mysqli_stmt_get_result($result);
                    if ($row = mysqli_fetch_assoc($resultl)) {
                        //*****************************************************
                        //An existed Card has been detected for Login or Logout
                        if ($row['add_card'] == 1) {
                            if (true) {
                                $Uname = $row['fullname'];
                                $event_id = Get_Current_Event();
                                if ($event_id == 0) {
                                    echo 'None event';
                                    exit();
                                }
                                $sql = "SELECT * FROM user_log WHERE student_id=? AND event_id='$event_id' AND checkin_date='$d' AND card_out=0";
                                $result = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($result, $sql)) {
                                    echo "SQL_Error_Select_logs";
                                    exit();
                                } else {
                                    $studentID = $row['student_id'];
                                    mysqli_stmt_bind_param($result, "s", $studentID);
                                    mysqli_stmt_execute($result) or die(mysqli_error($conn));
                                    $resultl = mysqli_stmt_get_result($result);
                                    //*****************************************************
                                    //Login
                                    if (!$row1 = mysqli_fetch_assoc($resultl)) {
                                        $res = mysqli_query($conn, "SELECT * FROM `event` WHERE event_id='$event_id'");
                                        $rowevent = mysqli_fetch_array($res, MYSQLI_ASSOC);
                                        $timeStart = $rowevent['time_start'];
                                        //plus time
                                        $minutes_to_add = 30;
                                        $currentDateTime = date('Y-m-d H:i:s');
                                        $time = new DateTime($currentDateTime);
                                        $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));
                                        $currentTimeStart = $time->format('Y-m-d H:i');
                                        if ($timeStart <= $currentTimeStart) {
                                            $checkStudent = mysqli_query($conn, "SELECT * FROM user_log WHERE student_id='$studentID' and event_id='$event_id'");
                                            if (mysqli_num_rows($checkStudent) > 0) {
                                                echo "Login exits";
                                                exit();
                                            }
                                            $event_id = Get_Current_Event();
                                            $timeout = "00:00:00";
                                            $stid = $row['student_id'];
                                            $sql = "INSERT INTO user_log (student_id,checkin_date,time_in, time_out,event_id,card_out,scores) VALUES ('$stid', '$d', '$t', '$timeout', '$event_id', 0, 0)";
                                            mysqli_query($conn, $sql) or die(mysqli_error($conn));
                                            echo "login" . $Uname;
                                            exit();
                                        } else {
                                            echo "Time in late";
                                            exit();
                                        }
                                    }
                                    //*****************************************************
                                    //Logout
                                    else {
                                        $res = mysqli_query($conn, "SELECT * FROM `event` WHERE event_id='$event_id'");
                                        $rowevent = mysqli_fetch_array($res, MYSQLI_ASSOC);
                                        $timeEnd = $rowevent['time_end'];
                                        $scores = $rowevent['score'];
                                        if ($timeEnd < $t) {
                                            $sql = "UPDATE user_log SET time_out=?, card_out=1,scores='$scores' WHERE student_id=? AND checkin_date=? AND card_out=0";
                                            $result = mysqli_stmt_init($conn);
                                            if (!mysqli_stmt_prepare($result, $sql)) {
                                                echo "SQL_Error_insert_logout1";
                                                exit();
                                            } else {
                                                $studentID = $row['student_id'];
                                                mysqli_stmt_bind_param($result, "sss", $t, $studentID, $d);
                                                mysqli_stmt_execute($result);

                                                echo "logout" . $Uname;
                                                exit();
                                            }
                                        } else {
                                            echo "Time_out soon";
                                            exit();
                                        }
                                    }
                                }
                            } else {
                                echo "Not Allowed!";
                                exit();
                            }
                        } else if ($row['add_card'] == 0) {
                            echo "Not registerd!";
                            exit();
                        }
                    } else {
                        echo "Not found!";
                        exit();
                    }
                }
            } else if ($device_mode == 0) {
                //New Card has been added
                $sql = "SELECT * FROM user WHERE card_uid=?";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_Select_card";
                    exit();
                } else {
                    mysqli_stmt_bind_param($result, "s", $card_uid);
                    mysqli_stmt_execute($result);
                    $resultl = mysqli_stmt_get_result($result);
                    //The Card is available
                    if ($row = mysqli_fetch_assoc($resultl)) {
                        $sql = "SELECT card_select FROM user WHERE card_select=1";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error_Select";
                            exit();
                        } else {
                            mysqli_stmt_execute($result);
                            $resultl = mysqli_stmt_get_result($result);
                            session_start();
                            $_SESSION["card_exits"] = $card_uid;
                            if ($row = mysqli_fetch_assoc($resultl)) {
                                $sql = "UPDATE user SET card_select=0";
                                $result = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($result, $sql)) {
                                    echo "SQL_Error_insert";
                                    exit();
                                } else {
                                    mysqli_stmt_execute($result);

                                    $sql = "UPDATE user SET card_select=1 WHERE card_uid=?";
                                    $result = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($result, $sql)) {
                                        echo "SQL_Error_insert_An_available_card";
                                        exit();
                                    } else {
                                        mysqli_stmt_bind_param($result, "s", $card_uid);
                                        mysqli_stmt_execute($result);

                                        echo "available";
                                        exit();
                                    }
                                }
                            } else {
                                $sql = "UPDATE user SET card_select=1 WHERE card_uid=?";
                                $result = mysqli_stmt_init($conn);
                                if (!mysqli_stmt_prepare($result, $sql)) {
                                    echo "SQL_Error_insert_An_available_card";
                                    exit();
                                } else {
                                    mysqli_stmt_bind_param($result, "s", $card_uid);
                                    mysqli_stmt_execute($result);

                                    echo "available";
                                    exit();
                                }
                            }
                        }
                    }
                    //The Card is new
                    else {
                        $sql = "UPDATE user SET card_select=0";
                        $result = mysqli_stmt_init($conn);
                        $res = mysqli_query($conn, "SELECT * FROM user WHERE card_uid='$card_uid'");
                        if (mysqli_num_rows($res) <= 0) {
                            session_start();
                            $_SESSION["card_uid"] = $card_uid;
                            echo  $_SESSION["card_uid"];
                            echo ' add successful';
                        }
                        // if (!mysqli_stmt_prepare($result, $sql)) {
                        //     echo "SQL_Error_insert";
                        //     exit();
                        // } else {
                        //     mysqli_stmt_execute($result);
                        //     $d = date("Y-m-d");
                        //     $t = date("H:i:sa");
                        //     $m = substr(microtime(), 0, 3);
                        //     $studentID = $d . $t . $m;
                        //     $pass = md5(12345678);

                        //     $sql = "INSERT INTO user (student_id,card_uid, card_select, dob, add_card,`password`,major_id,course_id) VALUES ('$studentID', '$card_uid', 1,CURDATE(),1,'$pass',0,0)";
                        //     mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        //     echo "succesful";
                        //     exit();
                        // }
                    }
                }
            }
        } else {
            echo "Invalid Device!";
            exit();
        }
    }
}
//http://10.26.5.19:4343//PDPAttendance//Model//getdata.php?card_uid="57859686"&device_token="34234234234fsd"
//http://172.168.39.189:4343//PDPAttendance/getdata.php?card_uid=57859686&device_token= b8e1e3fb7bab8b35
