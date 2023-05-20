<?php
session_start();
unset( $_SESSION["stusernamemarker"]);

echo header("Location: Login_Type.php");
?>