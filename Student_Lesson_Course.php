<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Educatum Instructor Guilds</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style1.css">
</head>

<body>

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
        <!--Status Tab-->
        <div class="statTab">
            <div class="row">
                <div class="col-md-1">
                    <img src="./Avatars/wizard.png" class="avatar">
                </div>
                <div class="col-md-6">

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
                <!-- <div class="col-md-5">
                <a class="loginRegister btn btn-dark float-end" href="./logoutins.php ">Logout</a>

            </div> -->
            </div>

        </div>
        <div class="container d-flex justify-content-center">
            <div class="col-md-10">
                <h2 class="tabTitle">Select Course</h2>
                <div class="content">
                    <div class="row">
                        <h1>Select Course:</h1>
                        <div>
                            <?php
                            include('student.php');
                            $stulogin = $_SESSION["stusernamemarker"];
                            $sql = "select studentID from student where Username = '$stulogin'";
                            $result = $conn->query($sql);
                            $row = mysqli_fetch_array($result);
                            if (!$row) {
                                printf("Error: %s\n", mysqli_error($conn));
                                exit();
                            };
                            $idsearch = $row["studentID"];

                            $sql = "SELECT * FROM instructor_courses INNER JOIN instructor on instructor_courses.instructorID = instructor.instructorID WHERE courseID IN(SELECT courseID FROM enrollments WHERE studentID = $idsearch)";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "
                                        <div class=\"col-lg-12 questGiven rounded border border-2\">
                                            <form class=\"row\" action=\"Assigned_Quest.php\" method=\"post\">
                                                <h2 class=\"col-lg-8\">" . $row['course_Name'] . "</h2>
                                                <input type=\"hidden\" name=\"courseID\" value=\"" . $row['courseID'] . "\" >
                                                <input type=\"submit\" class=\"btn btn-primary col-lg-3\" value=\"Select\">
                                            </form>
                                        </div>
                                        ";
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

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

</body>

</html>