<?php
session_start();
session_destroy();
header("Location:spreadsheet.php");
exit();
?>