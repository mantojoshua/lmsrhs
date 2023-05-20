<?php
session_start();
unset($_SESSION["insusernamemarker"]);
header("Location:Login_Type.php");
?>
<a href="logoutins.php">Logout</a>        
