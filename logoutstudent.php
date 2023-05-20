<?php
session_start();
unset($_SESSION["stusernamemarker"]);
header("Location:Login_Type.php");
?>
<a href="logoutstudent.php">Logout</a>        