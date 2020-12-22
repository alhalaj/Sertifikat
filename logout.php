<?php
session_start();
unset($_SESSION['USERNAME']);
session_destroy();
header ('location:./login.php');
// echo'<META HTTP-EQUIV="Refresh" Content="0; URL=../../login.php">';
exit();
?>