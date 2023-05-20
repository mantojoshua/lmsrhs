<?php
session_start();
include_once('student.php');
$inslogin = $_SESSION["insusernamemarker"];
$sql = "SELECT * FROM instructor WHERE Username ='$inslogin' AND verified = 0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    header("Location: Not_Verified_Instructor.php");
}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Courses</title>
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
                        <a href="./Instructor_Quest_Create.php" class="nav-link">
                            <i class="bx bx-folder-open icon"></i>
                            <span class="link">Create Post</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="./Instructor_Archive.php" class="nav-link">
                            <i class="bx bx-bar-chart-alt-2 icon"></i>
                            <span class="link">Courses</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="./Instructor_Quest.php" class="nav-link">
                            <i class="bx bx-bell icon"></i>
                            <span class="link">Lessons</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="./Instructor_Assignment_View.php" class="nav-link">
                            <i class="bx bx-message-rounded icon"></i>
                            <span class="link">Assignments</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="./Instructor_Quiz_View.php" class="nav-link">
                            <i class="bx bx-pie-chart-alt-2 icon"></i>
                            <span class="link">Quizzes</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="./Instructor_Exam_View.php" class="nav-link">
                            <i class="bx bx-heart icon"></i>
                            <span class="link">Examination</span>
                        </a>
                    </li>
                </ul>

                <div class="bottom-cotent">
                    <li class="list">
                        <a href="./logoutins.php " class="nav-link">
                            <i class="bx bx-log-out icon"></i>
                            <span class="link">Logout</span>
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </nav>

    <!--Status Tab-->
    <div class="container statTab">
        <div class="row">
            <div class="col-md-1">
                <img src="./Avatars/wizard.png" class="avatar">
            </div>
            <div class="col-md-7">

                <?php
                include_once('student.php');
                $inslogin = $_SESSION["insusernamemarker"];
                //query
                $sql = "SELECT * FROM instructor WHERE Username ='$inslogin'";
                $result = $conn->query($sql);
                //   prints the information
                if ($row = $result->fetch_assoc()) {
                    echo "<span class='text-white'><b>Instructor's Name: </b>" . $row['First_Name'] . " " . $row['Last_Name'] . "</span>";
                }
                ?>
            </div>
            <!-- <div class="col-md-5">
                <a class="loginRegister btn btn-dark float-end" href="./logoutins.php ">Logout</a>

            </div> -->
        </div>

    </div>

    <div class="container">

        <h2 class="tabTitle">Class Courses</h2>
        <div class="content">
            <div class="row">
                <div class="col-md-4 courseCreate">
                    <a href="./Instructor_Course_Create.php">
                        <div class="course">
                            <div class="courseheader">
                                <strong><span id="ctitle">Add Course</span></strong> <br>
                            </div>
                            <div class="enrollbox">
                                <img src="./General_Use_Asset/Enroll.png">
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 courseCreate">
                    <a href="./Instructor_Course_Delete.php">
                        <div class="course">
                            <div class="courseheader">
                                <strong><span id="ctitle">Delete Course</span></strong> <br>
                            </div>
                            <div class="enrollbox">
                                <img src="./General_Use_Asset/Delete.png">
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 courseCreate">
                    <a href="./Instructor_Course_Archive.php">
                        <div class="course">
                            <div class="courseheader">
                                <strong><span id="ctitle">View Archive</span></strong> <br>
                            </div>
                            <div class="enrollbox">
                                <img src="./General_Use_Asset/Enroll.png">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <h2>My Courses</h2>
                </div>

                <?php


                $sql = "SELECT instructorID FROM instructor WHERE Username = '" . $_SESSION["insusernamemarker"] . "'";
                $result = $conn->query($sql);
                $row = mysqli_fetch_array($result);
                if (!$row) {
                    printf("Error: %s\n", mysqli_error($conn));
                    exit();
                };

                $sql = "SELECT * FROM instructor_courses WHERE instructorID ='" . $row["instructorID"] . "'";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<div class=\"courseCreate col-lg-6 col-12\">
                                        <div class=\"course\">
                                          <div class=\"courseheader\">
                                             <strong><span id=\"ctitle\"> Course: " . $row["course_Name"] . " </span></strong><br>
                                             <span>Course code: " . $row["course_code"] . "</span>
                                          </div>

                                          <div class=\"courseDesc\">
                                            " . $row["course_Description"] . "
                                          </div>

                                        </div>
                                     </div> ";
                }
                ?>
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