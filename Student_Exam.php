<?php
session_start();
// error_reporting(0);
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Educatum Student Quests</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style3.css">
</head>

<body>
    <!--Header-->


    <!--Status Tab-->
    <div class="container statTab">
        <div class="row">
            <div class="col-md-12">

                <?php
                include_once('student.php');
                $stulogin = $_SESSION["stusernamemarker"];
                //query
                $sql = "SELECT * FROM student WHERE Username ='$stulogin'";
                $result = $conn->query($sql);
                //   prints the information
                while ($row = $result->fetch_assoc()) {
                    $studentID = $row['studentID'];
                    $xp = $row['XP'];

                    echo "
                    <div class=\"row\">
                    <div class=\"col-md-12\">
                    <label class=\"text-white\"> Students's Name: <strong>" . $row['First_Name'] ." ". $row['Last_Name'] . " </strong></label>
                    <label class=\"text-white float-end\"> Section: <strong>" . $row['Section'] . " </strong></label>
                    </div>
                    </div>
                    ";
                }
                ?>
            </div>
        </div>

    </div>

    <!--Main Body-->
    <nav class="shadow">
        <div class="logo">
            <i class="bx bx-menu menu-icon"></i>
            <a href="./Instructor_Archive.php"><img src="../public_html/images/logo.PNG" alt="" width="300px" height="100%"></a>
        </div>
        <div class="sidebar">
            <div class="logo">
                <i class="bx bx-menu menu-icon"></i>
                <img src="../public_html/images/logo.PNG" alt="" height="45%">
            </div>

            <div class="sidebar-content">
                <ul class="lists">
                    <li class="list">
                        <a href="./Archive.php" class="nav-link">
                            <i class="bx bx-bar-chart-alt-2 icon"></i>
                            <span class="link">Courses</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="Student_Lesson_Course.php" class="nav-link">
                            <i class="bx bx-bell icon"></i>
                            <span class="link">Lessons</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="Student_Assignment_Course.php" class="nav-link">
                            <i class="bx bx-message-rounded icon"></i>
                            <span class="link">Assignments</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="Student_Quiz_Course.php" class="nav-link">
                            <i class="bx bx-pie-chart-alt-2 icon"></i>
                            <span class="link">Quizzes</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="Student_Exam_Course.php" class="nav-link">
                            <i class="bx bx-heart icon"></i>
                            <span class="link">Examination</span>
                        </a>
                    </li>
                </ul>

                <div class="bottom-cotent">
                    <li class="list">
                        <a href="./logout.php" class="nav-link">
                            <i class="bx bx-log-out icon"></i>
                            <span class="link">Logout</span>
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">

        <div class="col-md-12">

            <h2 class="tabTitle">Exam</h2>
            <div class="content">
                <div class="row">

                    <div class="col-md-12">
                        <?php
                        include('student.php');
                        $sql = "SELECT studentID from student where Username = '" . $_SESSION["stusernamemarker"] . "'";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_array($result);
                        if (!$row) {
                            printf("Error: %s\n", mysqli_error($conn));
                            exit();
                        };
                        $idstudentsearch = $row["studentID"];

                        $sql = "SELECT CURRENT_DATE";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_array($result);
                        if (!$row) {
                            printf("Error2: %s\n", mysqli_error($conn));
                            exit();
                        };
                        $CurDate = "'" . $row['CURRENT_DATE'] . "'";
                        $value = $_POST['courseID'];
                        //$sql = "SELECT * FROM coursework inner join instructor_courses on coursework.courseID = instructor_courses.courseID inner join instructor on coursework.instructorID = instructor.instructorID inner join enrollments on coursework.courseID = enrollments.courseID where studentID = $idstudentsearchc AND coursework.workID NOT IN (SELECT workID FROM student_work WHERE studentID = $idstudentsearchc AND done=1); ";

                        $sql = "SELECT * from coursework inner join instructor on coursework.instructorID = instructor.instructorID inner join  instructor_courses on coursework.courseID = instructor_courses.courseID WHERE workType = 'Exam' AND coursework.courseID IN (SELECT courseID FROM enrollments WHERE studentID = $idstudentsearch) AND coursework.workID NOT IN (SELECT workID FROM student_work WHERE studentID = $idstudentsearch) AND coursework.courseID = $value";
                        $result = $conn->query($sql);
                        if (!$result) {
                            echo "Query Error";
                            exit();
                        }
                        $num = mysqli_num_rows($result);

                        $bool = 0;
                        $nofile = 0;

                        echo "There are <strong>" . $num . "</strong> current Exam to do";
                        if (!empty($result) && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                if ($row['workType'] == "Lesson" || $row['workType'] == "Meeting") {
                                    $bool = 1;
                                }

                                if ($row['instructor_file'] == NULL) {
                                    $nofile = 1;
                                }

                                echo
                                "
                        <div class=\"quest col-md-12 text-center\">
                         <div class=\"questTitle row\">
                             <span class=\"questElements col-md-4\" id=\"Cname\">Course Name: <br>" . $row['course_Name'] . " </span>
                             <span class=\"questElements col-md-4\" id=\"Iname\">Instructor Name: " . $row['First_Name'] . " " . $row['Last_Name'] . "</span>
                             <span class=\"questElements col-md-4\" id=\"Deadline\">Deadline: " . $row['deadline'] . "</span> <br>
                         </div>
                         <div class=\"row\">
                             <h4 id=\"questTitle\" class=\"questElements2 col-md-12\" ><strong>" . $row['Title'] . "</strong></h4>
                         
                             <div class=\"questElements2 col-md-6\">
                                <strong>Quest Descriptions</strong> <br>
                                " . $row['descriptions'] . "
                             </div>";

                                if ($nofile == 1) {
                                    echo " <div class=\"questElements2 col-md-6\"><strong>No File attached</strong></div>";
                                    $nofile = 0;
                                } else {
                                    // file download button
                                    echo "
                                <div class=\"questElements2 col-md-6\">
                                   <strong>File Download</strong> <br>
                                   <div class=\"questFileName\">" . $row['instructor_file'] . "</div>
                                   <form action=\"Student_Download.php\" method=\"post\"><input type=\"hidden\" name=\"workID\" value=\"" . $row['workID'] . "\"><button type=\"submit\" class=\"btn btn-primary\"name=\"download\">Download</button></form>
                                </div>";
                                }

                                if ($bool == 1) {

                                    echo " 
                                <br><br>
                                </div>
                                </div>
                       
                                ";
                                    $bool = 0;
                                    continue;
                                }
                                echo
                                "

                             <div class=\"col-md-12 d-flex justify-content-center\">
                                <form action=\"Student_Upload_Exam.php\" enctype=\"multipart/form-data\" method=\"post\">
                                    <input type=\"text\" name=\"studentID\" value=\"" . $idstudentsearch . "\" hidden>
                                    <input type=\"text\" name=\"xp_reward\" value=\"" . $row['xp_reward'] . "\" hidden>
                                    <input type=\"text\" name=\"workID\" value=\"" . $row['workID'] . "\" hidden>
                                    <input type=\"text\" name=\"date_submitted\" value=\"" . $CurDate . "\" hidden>

                                    <div class=\"input-group mb-3\">
                                        
                                        <input type=\"file\" class=\"form-control\" name=\"submitted_file\">
                                        <button class=\"btn btn-success\" type=\"submit\" name=\"submit\" >Submit</button>
                                    </div>
                                </form>

                                 <br> <br>
                
                             </div>

                         </div>
             
                                </div>
                
                            ";
                            }
                        } else {
                            echo "You dont have any assigned quest";
                        }


                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>

    </div>

    <?php

    ?>
    <script>
        const navBar = document.querySelector("nav"),
            menuBtns = document.querySelectorAll(".menu-icon"),
            overlay = document.querySelector(".overlay");

        menuBtns.forEach((menuBtn) => {
            menuBtn.addEventListener("click", () => {
                navBar.classList.toggle("open");
            });
        });

        overlay.addEventListener("click", () => {
            navBar.classList.remove("open");
        });
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- SELECT firsttable.name,thirdtable.cost FROM firsttable LEFT JOIN thirdtable ON firsttable.id=thirdtable.id;  -->
</body>


</html>