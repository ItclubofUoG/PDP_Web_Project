<?php
session_unset();
session_destroy();
echo "<script> location.href='./index.php?page=login'</script>";
exit;