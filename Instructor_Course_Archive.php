<?php
ob_start();
session_start();
?>
<?php
if (!isset($_SESSION["insusernamemarker"])) {
    header("Location: Instructor_Login.php");
}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Educatum Instructor Archives</title>
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

    <div class="container d-flex justify-content-center">

        <div class="container col-md-6">
            <h2 class="tabTitle">Archived Courses</h2>
            <div class="content">
                <div class="row">

                    <?php

                    $sql = "SELECT instructorID FROM instructor WHERE Username = '" . $_SESSION["insusernamemarker"] . "'";
                    $result = $conn->query($sql);
                    $row = mysqli_fetch_array($result);
                    if (!$row) {
                        printf("Error: %s\n", mysqli_error($conn));
                        exit();
                    };

                    $sql = "SELECT * FROM instructor_course_archive WHERE instructorID ='" . $row["instructorID"] . "'";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class=\"col-md-12\">
                                <div class=\"\">
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
                <form action="Instructor_Course_Archive.php" method="post">
                    <select name="courseID">
                        <?php
                        include_once('student.php');
                        //query
                        $sqlins = "select instructorID from instructor where Username = '" . $_SESSION["insusernamemarker"] . "'";
                        $resultins = $conn->query($sqlins);
                        $row = mysqli_fetch_array($resultins);
                        if (!$row) {
                            printf("Error: %s\n", mysqli_error($conn));
                            exit();
                        };
                        $idsearch = $row["instructorID"];
                        $Sql = "SELECT * FROM instructor_course_archive WHERE instructorID =$idsearch";
                        $Result = $conn->query($Sql);
                        while ($row = $Result->fetch_assoc()) {
                            echo "<div class=\"col-md-6\">
                                    <option value=" . $row['courseID'] . ">" . $row['course_Name'] . "</option>
                                    </div>
                                ";
                        }
                        ?>
                    </select>
                    <button type="submit">Restore</button>
                </form>
                <?php
                if (isset($_POST['courseID'])) {
                    $courseID = $_POST['courseID'];
                    $sql = "INSERT INTO instructor_courses SELECT * FROM instructor_course_archive WHERE courseID = $courseID;
            DELETE FROM instructor_course_archive WHERE courseID = $courseID;";
                    $result = $conn->multi_query($sql);
                    header("Location: Instructor_Archive.php");
                }
                ?>
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