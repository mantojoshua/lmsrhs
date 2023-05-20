<?php
session_start();

if (isset($_POST['workID'])) {
    $_SESSION['workID'] = $_POST['workID'];
    echo "Session updated successfully";
} else {
    echo "Invalid request";
}
?>
