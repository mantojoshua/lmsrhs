<?php
    ob_start();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    hello
</body>
</html>

                <?php
            include_once('student.php');
            //query

            
            $stwork=$_POST['workID'];
            $stID=$_POST['studentID'];

            echo $stwork;
            echo $stID;
           
            
            $sql = "SELECT * FROM student_work WHERE workID = $stwork AND studentID = $stID";
            $result = $conn->query($sql);
            $file = mysqli_fetch_assoc($result);
            $filepath = 'uploads/'.$file['submitted_file'];
            echo $filepath;
             if (file_exists($filepath)) {
                 header('Content-Description: File Transfer');
                 header('Content-Type: application/octet-stream');
                 header('Content-Disposition: attachment; filename='.basename($filepath));
                 header('Expires: 0');
                 header('Cache-Control: must-revalidate');
                 header('Pragma: public');
                 header('Content-Length: ' . filesize('uploads/'.$file['submitted_file']));
                 ob_clean();
                 readfile('uploads/'.$file['submitted_file']);
                 exit;
             }


  
            
            ?>
