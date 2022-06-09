<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("location: index.php?page=login");
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == 'user') {
        include_once("user.php");
    }
} else {
    include("userlist.php");
}
