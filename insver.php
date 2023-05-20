<?php
    include_once('student.php');
    if(isset($_POST['verify'])){
        $instructorID = $_POST['instructorID'];


        
        $sql = "UPDATE instructor SET verified=true WHERE instructorID=$instructorID";
        $result = $conn->query($sql);
        if($result == TRUE) {
            
            $msg = "New record created successfully";
            header("Location: ./Instructor_Verify.php");
        } else {
            $msg = "Error: " . $sql . "<br>" . $conn->error;

        }
    }

    
    ?>
