<?php
    include('student.php');
    $output ='';
    $insID=$_POST['insID'];
    $cvalue=$_POST['cvalue'];
    $workID=$_POST['workID'];
    $Sql = "SELECT * FROM instructor_courses WHERE instructorID = $insID";
    $sqlll = "SELECT student.studentID,student.First_Name,student.Last_Name,student_work.submitted_file,student_work.grade FROM student LEFT JOIN student_work ON student.studentID = student_work.studentID WHERE student_work.workID =$workID  AND student.studentID IN (SELECT enrollments.studentID FROM enrollments WHERE enrollments.courseID=$cvalue)";
    $result = $conn->query($sqlll);
    if ($result->num_rows > 0) {
        $output .='
        <table class=\"table table-bordered\">
        <tr>
            <th>
                <h4>First Name</h4>
            </th>
            <th>
                <h4>Last Name</h4>
            </th>
            <th>
                <h4>Submitted File</h4>
            </th>
            <th>
                <h4>Grade</h4>
            </th> 
        ';
        while($row = $result->fetch_assoc()) {
            $output .='
            <tr>
                <td>'.$row['First_Name'].'</td>
                <td>'.$row['Last_Name'].'</td>
                <td>'.$row['submitted_file'].'</td>
                <td>'.$row['grade'].'</td>
            </tr>
            ';
        }

        $sql= "SELECT Title FROM coursework WHERE courseID ='$cvalue' AND workID = '$workID'";
        $Title = "";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $Title = $row['Title'];
        }

        $sql= "SELECT course_Name FROM instructor_courses WHERE courseID ='$cvalue'";
        $Course = "";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
            $Course = $row['course_Name'];
        }



        
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename='.$Course.' - '.$Title.'.xls');
        echo $output;
    }
?>
<!-- <a href="./Instructor_Quest.php"><button>Return</button></a> -->
