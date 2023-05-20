<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Admin Database Courses</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!--Header-->
    <div class="container header">
        <h1> <img src="./EducataumLogo.png" class="logo">Educatum Archives</h1>
    </div>

    <!--Status Tab-->
    <div class="container statTab">
        <div class="row">
        <h1 class="tabTitle">Admin Panel</h2>
        </div>
       
    </div>

    <!--Main Body-->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="tabTitle">Database Management - Courses Database</h2>
                    <div class="content">
                        <div class="row">

                            <div class="col-lg-10">

                            </div>


                            <div class="col-lg-12">
                                <br>
                            </div>

                           <div class="col-lg-12">
                                <a href="./Admin_Panel_Database_Courses.php"><button class="btn btn-primary">Back</button></a>
                            </div>



                            <div class="col-lg-12">
                                <br>
                            </div>
                            
                            <?php

                                    function addb($instructorID, $course_Name, $course_Description, $course_code){
                                        include('student.php');
                                        $sql = "SELECT * from temp WHERE tempID = (SELECT MAX(tempID) from temp)";
                                        $result = $conn->query($sql);
                                        while($row = $result->fetch_assoc()){
                                            $currentID = $row['IDnumber'];
                                        }
                                        echo "   ";
                                        
                                        $sql="SELECT * from instructor_courses WHERE courseID = $currentID";
                                        $result = $conn->query($sql);
                                        
                                        //If the update field is empty it fills it with the previous data on the original entry
                                        while($row = $result->fetch_assoc()){
                                            if($instructorID == NULL){
                                                $instructorID = $row['instructorID'];
                                            }
                                            if($course_Name == NULL){
                                                $course_Name = $row['course_Name'];
                                            }
                                            if($course_Description == NULL){
                                                $course_Description = $row['course_Description'];
                                            }
                                            if($course_code == NULL){
                                                $course_code = $row['course_code'];
                                            }
                                            
                                        }

                                        $sql = "UPDATE instructor_courses SET `instructorID`='$instructorID',`course_Name`='$course_Name',`course_Description`='$course_Description',`course_code`='$course_code' WHERE courseID = '$currentID'";
                                        $result = $conn->query($sql);
                                        if($result == TRUE) {
                                            $msg = "Record updated successfully";
                                        } else {
                                            $msg = "Error: " . $sql . "<br>" . $conn->error;
                                        }
                                        $conn->close();
                                        return $msg;
                                        }
                                        
                                        if(isset($_POST['updateCourses'])){
                                            echo addb($_POST['instructorID'],$_POST['course_Name'],$_POST['course_Description'],$_POST['course_code']);
                                        }

                                        resetTemp();
                                        function resetTemp(){
                                            include('student.php');
                                            $sql = "TRUNCATE temp";
                                            $result = $conn->query($sql);
                                            $sql = "ALTER TABLE temp AUTO_Increment = 1";
                                            $result = $conn->query($sql);
                                            $conn->close();
                                        }

                                ?>

                            </div>
                            
                        </div>
                    </div>
                        
            </div>
        </div>
    </div>
        



     <!-- JavaScript Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      
     

    <div class="container footer fixed-bottom position-sticky">
        
        <div class="attribution row">
            <div class="col-lg-2">
                <span>Educatum LMS 2021</span>
            </div>

            <div class="col-lg-6">

            </div>

            <div class="col-lg-4">
                Icons made by <strong><a href="https://www.flaticon.com/authors/maxicons" title="max.icons">max.icons</a></strong> from <strong><a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></strong>
            </div>
        </div>
     </div>
</body>

</html>