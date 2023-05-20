<?php
ob_start();
session_start();
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Educatum Quest Creation</title>
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
            <div class="col-md-6">

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
<!-- 
    <div class="container">
        <div class="row d-flex justify-content-center">

            <div class="col-md-8">
                <h2 class="tabTitle">Create Post</h2>
                <div class="content">
                    <form action="Instructor_Quest_Create.php" enctype="multipart/form-data" method="post">
                        <div class="row">

                            <div class="col-md-6">
                                <label for="">Post Name: </label><br>
                                <input class="form-control" type="text" name="title">
                            </div>


                            <div class="col-md-6">
                                <label for="">Select Course: </label><br>
                                <select class="form-control" name="courseID">

                                    <?php
                                    include('student.php');
                                    $sql = "select instructorID from instructor where Username = '" . $_SESSION["insusernamemarker"] . "'";
                                    $result = $conn->query($sql);
                                    $row = mysqli_fetch_array($result);
                                    if (!$row) {
                                        printf("Error: %s\n", mysqli_error($conn));
                                        exit();
                                    };
                                    $idsearch = $row["instructorID"];
                                    $Sql = "SELECT * FROM instructor_courses WHERE instructorID = $idsearch";

                                    $Result = $conn->query($Sql);
                                    while ($row = $Result->fetch_assoc()) {
                                        echo "
                                    <option value=" . $row['courseID'] . ">" . $row['course_Name'] . "</option>
                                    ";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="">Deadline: </label> <br>
                                <input class="form-control" type="date" name="deadline">
                            </div>

                            <div class="col-md-6">
                                <label for="">Post Type: </label><br>
                                <select class="form-control" name="workType">
                                    <option value="Lesson">Lesson</option>
                                    <option value="Assignment">Assignment</option>
                                    <option value="Quiz">Quiz</option>
                                    <option value="Exam">Exam</option>
                                </select>
                            </div>

                            <div class="col-lg-12 col-12">
                                <br>
                            </div>

                            <div class="col-md-6">

                                <input class="form-control" type="number" name="xp_reward">
                            </div>

                            <div class="form-group col-lg-12 col-12">
                                <label for="">Description: </label> <br>
                                <textarea name="desctiptions" class="form-control"></textarea>
                            </div>

                            <div class="form-group col-lg-12 col-12">
                                <label for="">Attach File: </label> <br>
                                <input type="file" name="submitted_file_lesson">
                            </div>

                            <div class="col-lg-12 col-12">
                                <br>
                            </div>

                            <div class="">
                                <input class="btn btn-success text-white float-end btn-outline-dark btn-lg" type="submit" name="createQuest">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <?php

        include('student.php');
        if (isset($_POST['update'])) {
            $courseID = $_POST['courseID'];
            $title = $_POST['title'];
            $descriptions = $_POST['desctiptions'];
            $deadline = $_POST['deadline'];
            $xp_reward = $_POST['xp_reward'];
            $workType = $_POST['workType'];
            $valueID = $_SESSION['workID'];
            $instructorID = $idsearch;
            $file = $_FILES['submitted_file_lesson'];
            $filename = $_FILES['submitted_file_lesson']['name'];

            $fileSize = $_FILES['submitted_file_lesson']['size'];

            if ($fileSize < 100000000) {
                move_uploaded_file($file["tmp_name"], "uploads/" . $file["name"]);
                $sql = "UPDATE coursework SET 
                courseID = '$courseID', 
                Title = '$title', 
                descriptions = '$descriptions', 
                deadline = '$deadline', 
                xp_reward = '$xp_reward', 
                workType = '$workType', 
                instructor_file = '$filename'
            WHERE workID = $valueID";
                $result = $conn->query($sql);
                if ($result == TRUE) {
                    $inslogin = $_SESSION["insusernamemarker"];
                    $sql = "INSERT INTO user_log (username, userAction,userTimestamp)
                VALUES ('$inslogin', 'created a quest:$title',now())";
                    $result = $conn->query($sql);
                    // header("Location: ".$_SERVER['PHP_SELF']);
                    $msg = "New record created successfully";
                } else {
                    $msg = "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                $msg = "File size is too big";
            }
        }
        ?>

    </div> -->
    <?php
    // Fetch data from database
    include('student.php');
    $sql = "select instructorID from instructor where Username = '" . $_SESSION["insusernamemarker"] . "'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    if (!$row) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    };
    $value = $_SESSION['workID'];
    // echo $value;
    $idsearch = $row["instructorID"];
    $sql = "SELECT * FROM coursework WHERE instructorID = $idsearch AND workID=$value";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);

    // Assign data to variables
    $postName = $row['Title'];
    $courseID = $row['courseID'];
    $deadline = $row['deadline'];
    $workType = $row['workType'];
    $xpRewards = $row['xp_reward'];
    $description = $row['descriptions'];
    
?>


    <div class="container">
        <a class="btn btn-primary" href="Instructor_Quest.php">Back</a>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <h2 class="tabTitle">Update Post</h2>
            <div class="content">
                <form action="Instructor_Post_Update.php" enctype="multipart/form-data" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="title">Post Name: </label><br>
                            <input class="form-control" type="text" name="title" value="<?php echo $row['Title']; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="courseID">Select Course: </label><br>
                            <select class="form-control" name="courseID">
                                <?php
                                include('student.php');
                                $sql = "select instructorID from instructor where Username = '" . $_SESSION["insusernamemarker"] . "'";
                                $result = $conn->query($sql);
                                $row = mysqli_fetch_array($result);
                                if (!$row) {
                                    printf("Error: %s\n", mysqli_error($conn));
                                    exit();
                                };
                                $idsearch = $row["instructorID"];
                                $Sql = "SELECT * FROM instructor_courses WHERE instructorID = $idsearch";

                                $Result = $conn->query($Sql);
                                while ($courseRow = $Result->fetch_assoc()) {
                                    $selected = ($courseRow['courseID'] == $row['courseID']) ? 'selected' : '';
                                    echo "<option value='" . $courseRow['courseID'] . "' " . $selected . ">" . $courseRow['course_Name'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="deadline">Deadline: </label> <br>
                            <input class="form-control" type="date" name="deadline" value="<?php echo $deadline; ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="workType">Post Type: </label><br>
                            <select class="form-control" name="workType">
                                <option value="Lesson" <?php if ($workType == 'Lesson') echo 'selected'; ?>>Lesson</option>
                                <option value="Assignment" <?php if ($workType == 'Assignment') echo 'selected'; ?>>Assignment</option>
                                <option value="Quiz" <?php if ($workType == 'Quiz') echo 'selected'; ?>>Quiz</option>
                                <option value="Exam" <?php if ($workType == 'Exam') echo 'selected'; ?>>Exam</option>
                            </select>
                        </div>
                        <div class="col-lg-12 col-12">
                            <br>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="number" name="xp_reward" value="10" hidden>
                        </div>
                        <div class="form-group col-lg-12 col-12">
                            <label for="desctiptions">Description: </label> <br>
                            <textarea name="desctiptions" class="form-control"><?php echo $description; ?></textarea>
                        </div>
                        <div class="form-group col-lg-12 col-12">
                            <label for="submitted_file_lesson">Attach File: </label> <br>
                            <input type="file" name="submitted_file_lesson">
                        </div>
                        <div class="col-lg-12 col-12">
                            <br>
                        </div>
                        <div class="">
                            <input class="btn btn-success text-white float-end btn-outline-dark btn-lg" type="submit" name="update">
                        </div>
                    </div>
                </form>
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