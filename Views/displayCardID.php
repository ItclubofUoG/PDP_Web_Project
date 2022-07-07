<!-- display card_uid -->
<?php
if (isset($_SESSION["card_uid"]) && !empty($_SESSION["card_uid"])) {
    $card_uid = $_SESSION["card_uid"];
    echo $card_uid;
    echo '<script language="javascript">alert("CardID: ' . $card_uid . '"); </script>';
    unset($_SESSION["card_uid"]);
    echo "<script> location.href='./admin.php?page=student'</script>";
    exit;
} elseif (isset($_SESSION["card_exits"]) && !empty($_SESSION["card_exits"])) {
    $card_uid = $_SESSION["card_exits"];
    echo '<script language="javascript">alert("CardID: ' . $card_uid . ' exits"); </script>';
    unset($_SESSION["card_exits"]);
    echo "<script> location.href='./admin.php?page=student'</script>";
    exit;
}
?>
<script>
    console.log(1)
</script>