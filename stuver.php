<?php
    include_once('student.php');
    if(isset($_POST['verify'])){
        $studentID = $_POST['studentID'];


        
        $sql = "UPDATE student SET verified=true WHERE studentID=$studentID";
        $result = $conn->query($sql);
        if($result == TRUE) {
            
            $msg = "New record created successfully";
            header("Location: ./Student_Verify.php");
        } else {
            $msg = "Error: " . $sql . "<br>" . $conn->error;

        }
    }

    
    ?>
