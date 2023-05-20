<?php
ob_start();
    include_once('student.php');
           
            if(isset($_POST['submit'])){
                $studentID = $_POST['studentID'];
                $workID = $_POST['workID'];
                $submitted_file = $_FILES['submitted_file']["name"];
                $file = $_FILES['submitted_file'];
                $fileSize = $_FILES['submitted_file']['size'];
                $date = $_POST['date_submitted'];

                if ($fileSize < 100000000) {
                
               move_uploaded_file($file["tmp_name"],"./uploads/".$file["name"]);
                $sql = "INSERT INTO student_work ( studentID, workID,  submitted_file ,done, date_submitted)
                VALUES ('$studentID','$workID','$submitted_file',true, $date)";
                $result = $conn->query($sql);
                if($result == TRUE) {
                    $msg = "New record created successfully";
                } else {
                    $msg = "Error: " . $sql . "<br>" . $conn->error;
                }
                
                
            }
            else{
                echo "Your file is too big!";
            }
            $sqlup = "UPDATE student SET XP = XP + ".$_POST['xp_reward']." WHERE studentID = $studentID";
            $result = $conn->query($sqlup);
            echo $_POST['xp_reward'];

           

        }
        
?>
            <a href="./Student_Exam.php"><button>Return</button></a>
            
            <?php
                header("Location: ./Student_Exam_Course.php");
            ?>

            