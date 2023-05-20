<?php
ob_start();
    include_once('student.php');
    $wID=$_POST['workID'];
    $sql = "SELECT * FROM coursework WHERE workID = $wID";
    $result = $conn->query($sql);
    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/'.$file['instructor_file'];
     
         header('Content-Description: File Transfer');
         header('Content-Type: application/octet-stream');
         header('Content-Disposition: attachment; filename='.basename($filepath));
         header('Expires: 0');
         header('Cache-Control: must-revalidate');
         header('Pragma: public');
         header('Content-Length: ' . filesize('uploads/'.$file['instructor_file']));
         if(ob_get_length() > 0) {
    ob_clean();
}
         readfile('uploads/'.$file['instructor_file']);
         exit;
    
    session_start();
?>