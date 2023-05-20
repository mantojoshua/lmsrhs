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

                            <div class="col-lg-2">

                            </div>

                            <div class="col-lg-10">
                                <span>If the field below the Bold labels are blank. This means you have entered an invalid id to update.</span><br>
                                If you only wish to change a single field/column, leave the other fields empty.
                            </div>


                            <div class="col-lg-12">
                                <br>
                            </div>
                            
                            <?php
                                function addB($IDnumber){
                                    include_once('student.php');
                                    $command = "UPDATE";
                                    $sql = "INSERT INTO `temp`(`IDnumber`, `command`) VALUES ('$IDnumber', '$command')";
                                    $result = $conn->query($sql);
                                    $conn->close();
                                }
                                            
                                if(isset($_POST['updateEntry'])){
                                    echo addB($_POST['IDnumber']);
                                    $courseID = $_POST['IDnumber'];
                                }


                                include('student.php');
                                 $sql = "SELECT * FROM instructor_courses where courseID = '$courseID'";
                                 $result = $conn->query($sql);
                                 
                                 echo"
                                    <div class=\"col-lg-2\">
                                    </div>

                                    <div class=\"col-lg-1\">
                                        <strong><span>instructorID</span></strong>
                                    </div>

                                    <div class=\"col-lg-1\">
                                        <strong><span>courseID</span></strong>
                                    </div>

                                    <div class=\"col-lg-2\">
                                        <strong><span>course_Name</span></strong>
                                    </div>

                                    <div class=\"col-lg-5\">
                                        <strong><span>course_Description</span></strong>
                                    </div>

                                    <div class=\"col-lg-1\">
                                        <strong><span>course_code</span></strong>
                                    </div>
                                ";

                                while($row = $result->fetch_assoc()){
                                    echo"
                                    <div class=\"col-lg-2\">
                                    </div>

                                    <div class=\"col-lg-1\">
                                        <span>".$row['instructorID']."</span>
                                    </div>

                                    <div class=\"col-lg-1\">
                                        <span>".$row['courseID']."</span>
                                    </div>

                                    <div class=\"col-lg-2\">
                                        <span>".$row['course_Name']."</span>
                                    </div>

                                    <div class=\"col-lg-5\">
                                        <span>".$row['course_Description']."</span>
                                    </div>

                                    <div class=\"col-lg-1\">
                                        <span>".$row['course_code']."</span>
                                    </div>
                                    <br><br>
                                    ";
                                }
                                
                            ?>

                            <div class="col-lg-12">
                                <form action="./Admin_Panel_Database_Courses_Update_Done.php" class="row" method="post">
                                    <div class="col-lg-2">
                                    </div>

                                    <div class="col-lg-1">
                                        <label>instructorID</label>
                                        <input type="text" class="form-control" name="instructorID">
                                    </div>

                                    <div class="col-lg-1">
                                        
                                    </div>

                                    <div class="col-lg-2">
                                        <label>course_Name</label>
                                        <input type="text" class="form-control" name="course_Name">
                                    </div>

                                    <div class="col-lg-5">
                                        <label>course_Description</label>
                                        <textarea type="text" class="form-control" name="course_Description"></textarea>
                                    </div>

                                    <div class="col-lg-1">
                                        <label>course_code</label>
                                        <input type="text" class="form-control" name="course_code">
                                    </div>

                                    <div class="col-lg-12">
                                        <input type="submit" class="btn btn-success" name="updateCourses">
                                    </div>
                                </form>
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