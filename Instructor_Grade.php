<?php
    include_once('student.php');
    if(isset($_POST['grade'])){
        $studentID = $_POST['studentID'];
        $workID = $_POST['workID'];
        $grade = $_POST['grades'];
        //$courseID = $_POST[''];

        echo $studentID;
        echo $workID;
        echo $grade;
        
        $sql = "UPDATE student_work SET grade='$grade' WHERE studentID=$studentID AND workID =$workID";
        $result = $conn->query($sql);
        if($result == TRUE) {
            $msg = "New record created successfully";
        } else {
            $msg = "Error: " . $sql . "<br>" . $conn->error;
        }
        
        //header("Location: ./Instructor_Coursework_Check.php");

    }

    
    ?>
<a href="./Instructor_Quest.php"><button>Return</button></a>

<?php
    echo "
    <form action=\"Instructor_Coursework_Check.php\" method=\"post\" id=\"returnForm\">
        <input type=\"hidden\" name=\"wname\" value='".$workID."'>
        <input type=\"submit\">
    </form> 
    ";

    if (isset($_POST['workID']))
    {
?>
    
    <script type="text/javascript">
        document.getElementById('returnForm').submit();
    </script>
    
<?php 
    }
    else
    {
        header("Location: ./Instructor_Coursework.php");
    }
?>
