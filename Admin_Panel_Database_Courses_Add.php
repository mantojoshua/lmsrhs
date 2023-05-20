<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Admin Database Instructors</title>
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
                <h2 class="tabTitle">Database Management - Instructor Database</h2>
                    <div class="content">
                        <div class="row">

                        <div class="col-lg-12">
                            <a href="./Admin_Panel_Database_Courses.php"><button class="btn btn-primary">Back</button></a><br><br>
                        </div>

                        <div class="col-lg-12">
                                <form class="row" action="./Admin_Panel_Database_Courses_Add.php" method="post">
                                    <div class="col-lg-2">
                                    </div>

                                    <div class="col-lg-2">
                                        <label>instructorID:</label><br>
                                        <input class="form-control" type="text" name="instructorID">
                                    </div>

                                    <div class="col-lg-2">
                                        <label>course_Name:</label><br>
                                        <input class="form-control" type="text" name="course_Name">
                                    </div>

                                    <div class="col-lg-2">
                                        <label>course_Description:</label><br>
                                        <input class="form-control" type="text" name="course_Description">
                                    </div>

                                    <div class="col-lg-2">
                                        <label>course_code:</label><br>
                                        <input class="form-control" type="text" name="course_code">
                                    </div>

                                    <div class="col-lg-2">
                                        <br>
                                        <button class="btn btn-success" type="submit" name="addCourse">Add Entry</button>
                                    </div>

                                    <?php
                                        function addB($instructorID,$course_Name,$course_Description,$course_code){
                                            include('student.php');
                                            //If any of the fields are not filled the function to input is not started
                                            if($instructorID == NULL || $course_Name == NULL || $course_Description == NULL || $course_code == NULL){
                                                echo "<br><br>
                                                      <div class=\"col-lg-12\">
                                                            Error: Some of the fields are missing data. Make sure to enter proper data into all fields.
                                                      </div>
                                                ";
                                                exit();
                                            }

                                            $sql = "INSERT INTO instructor_courses ( instructorID, course_Name, course_Description, course_code)
                                            VALUES ('$instructorID', '$course_Name', '$course_Description','$course_code')";
                                            $result = $conn->query($sql);
                                            if($result == TRUE) {
                                                echo "<br><br><br>
                                                <div class=\"col-lg-12\">
                                                      New record created successfully!
                                                </div>";
                                            } else {
                                                echo "<br><br>
                                                <div class=\"col-lg-12\">
                                                    Error: " . $sql . "<br>" . $conn->error."</div>";
                                                    
                                            }
                                            $conn->close();
                                            }
                                            if(isset($_POST['addCourse'])){
                                                echo addB($_POST['instructorID'], $_POST['course_Name'], $_POST['course_Description'],$_POST['course_code']);
                                            }
                                    ?>
                                </form>
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