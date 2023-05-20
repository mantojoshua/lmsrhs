<?php
session_start();
include_once('student.php');
$stulogin = $_SESSION["stusernamemarker"];
//query
// $sql = "SELECT * FROM student WHERE Username ='$stulogin' AND verified = 0";
// $result = $conn->query($sql);
// if ($result->num_rows > 0) {
//     header("Location: Not_Verified.php");
// }
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Educatum Student Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style3.css">
    <link rel="stylesheet" href="style2.css">
</head>

<body style="background-color:#E3E3E3;
;">
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
            <!-- <div class="col-lg-6 col-12 stats">
                <label> Learner's Level</label>
                <span id = "level">{ Level }</span>
                <div class="level">
                    <div class="fillLevel" id = "fill"></div>
                </div>
                
            </div> -->
        </div>

    </div>

    <!--Main Body-->
    <nav class="shadow">
        <div class="logo">
            <i class="bx bx-menu menu-icon"></i>
            <a href="./Archive.php"><img src="../public_html/images/logo.PNG" alt="" width="300px" height="100%"></a>
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
        <div class="row">
            <!-- <div class="col-lg-3">
                    <div class="sidebar" style="background-color: aliceblue;">
                        <a class="active" href="./Archive.php">Courses</a>
                        <?php
                        $idstudentsearch = $studentID;
                        include_once('student.php');
                        $sql = "SELECT * from coursework inner join instructor on coursework.instructorID = instructor.instructorID inner join  instructor_courses on coursework.courseID = instructor_courses.courseID WHERE coursework.courseID IN (SELECT courseID FROM enrollments WHERE studentID = $idstudentsearch) AND coursework.workID NOT IN (SELECT workID FROM student_work WHERE studentID = $idstudentsearch)";
                        $result = $conn->query($sql);

                        if (!$result) {
                            echo "Query Error";
                            exit();
                        }
                        $num = mysqli_num_rows($result);

                        if ($num > 99) {
                            $notif = "99+";
                        } else {
                            $notif = $num;
                        }

                        if ($notif <= 0) {
                            echo "<a href=\"./Assigned_Quest.php\">Lesson and Assignments</a>";
                        } else {
                            echo "<a id=\"AssignedQuest\" href=\"./Assigned_Quest.php\">Lesson and Assignments  <span id=\"sidebarNotif\" class=\"badge border border-warning border-2 rounded-pill badge-notification bg-danger\">" . $notif . "</span></a>";
                        }


                        ?>




                    </div>
                </div> -->

            <div class="col-md-12">
                <h2 class="tabTitle">Course Content</h2>
                <div class="content" style="background-color: aliceblue;">
                    <div class="row">

                        <div class="col-md-12">
                            <a class="course enrollCourse" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="course">
                                    <div class="courseheader" style="background-color: rgb(221, 125, 195);">
                                        <strong><span id="ctitle">Course Enrollment</span></strong> <br>
                                        <span>Click This Box to Enroll</span>
                                    </div>


                                    <div class="enrollbox " style="background-color: rgb(233, 106, 133);">
                                        <div class="enrollIcon">
                                            <img src="./General_Use_Asset/Enroll.png">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <?php
                        include('student.php');
                        $sql = "SELECT studentID from student where Username = '" . $_SESSION["stusernamemarker"] . "'";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_array($result);
                        if (!$row) {
                            printf("Error: %s\n", mysqli_error($conn));
                            exit();
                        };

                        $idstudentsearchc = $row["studentID"];

                        $sql = "SELECT * FROM instructor_courses INNER JOIN instructor on instructor_courses.instructorID = instructor.instructorID WHERE courseID IN(SELECT courseID FROM enrollments WHERE studentID = $idstudentsearchc)";
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()) {
                            echo "

                            <div class=\"col-lg-6\">
                                <!--href link missing, find a way to link the approriate course?-->
                                <a class=\"viewCourse\">
                                <div class=\"course\">
                                    <div class=\"courseheader\">
                                        <strong><span id=\"ctitle\">Course Title: " . $row['course_Name'] . "</span></strong> <br>
                                        <span id=\"Iname\">Instructor Name: </span>
                                        <strong>" . $row['First_Name'] . " " . $row["Last_Name"] . "</strong> <br>
                                    </div>

                                    <div class=\"courseDesc\">
                                        <p>" . $row['course_Description'] . "</p>
                                    </div>
                                </div>
                                </a>
                            </div>             
                            ";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal -->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header courseheader">
                        <h5 class="modal-title" id="exampleModalLabel">Course Enrollment</h5>
                        <button type="button" class="close btn btn-light" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="Archive.php" method="post">
                        <div class="modal-body courseModal">
                            <label for="">Enter Class Code:</label>
                            <input name="course_code" type="text">

                        </div>
                        <div class="modal-footer courseModal">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit" name="enroll" id="button">Join</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        include('student.php');
        $sqls = "SELECT studentID from student where Username = '" . $_SESSION["stusernamemarker"] . "'";
        $results = $conn->query($sqls);
        $row = mysqli_fetch_array($results);
        if (!$row) {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
        };

        function addB($studentID, $courseID)
        {
            include('student.php');
            $sql = "INSERT IGNORE INTO enrollments ( studentID, courseID )
            VALUES ('$studentID','$courseID')";
            $result = $conn->query($sql);
            if ($result == TRUE) {
                $stulogin = $_SESSION["stusernamemarker"];
                $sql = "INSERT INTO user_log (username, userAction,userTimestamp)
                VALUES ('$stulogin', 'enrolled a course',now())";
                $result = $conn->query($sql);
                $msg = "New record created successfully";
            } else {
                $msg = "Error: " . $sql . "<br>" . $conn->error;
            }
            return $msg;
        }
        if (isset($_POST['enroll'])) {
            $course = $_POST["course_code"];
            $search = "SELECT * FROM instructor_courses WHERE course_code = '$course'";
            $content_show = $conn->query($search) or die($conn->error);
            $tbl = $content_show->fetch_assoc();
            echo addB($row["studentID"], $tbl["courseID"]);
            echo "<meta http-equiv='refresh' content='0'>";
        }
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



    </div>


</body>
<script>
    console.log("hello");
    var xp = '<?php echo $xp;?>';
    console.log(xp);
    console.log("hello");
    var xpCapPerLevel = 100;
    var levelFill = xp%xpCapPerLevel;
    var level = Math.floor(xp / 100 + 1);
    document.getElementById("fill").style.width = levelFill + "%";
    document.getElementById("level").textContent = Math.floor(xp / 100 + 1);;
</script>  
</html>