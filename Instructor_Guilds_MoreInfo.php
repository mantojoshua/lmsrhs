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
            <div class="col-lg-3">
            <img src="./Avatars/wizard.png" class="avatar">
            <label> Instructor's Name:</label>
            <?php
                include_once('student.php');
                $inslogin = $_SESSION["insusernamemarker"];
                //query
                $sql = "SELECT * FROM instructor WHERE Username ='$inslogin'";
                $result = $conn->query($sql);
                //   prints the information
                while($row = $result->fetch_assoc()) {
                    echo "<span><b>".$row['First_Name']."</b></span>";
                }
                    ?>
            </div>
            
            <div class="col-lg-6">
            </div>

            <div class="col-lg-2 logout_btn" style="display:inline; float:right;">
                <br>
                <a class="loginRegister btn btn-dark" href="./logoutins.php ">Logout</a>
            </div>
        </div>
        
       
    </div>

    <!--Main Body-->
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="sidebar">
                    <a href="./Instructor_Archive.php">Archive</a>
                    <a href="./Instructor_Quest.php">Quest Given</a>
                    <a class="active"  href="./Instructor_Guilds.php">Guilds</a>
                    <a href="./Instructor_Training.php">Training</a>
                    <a href="./Instructor_Discussions.php">Discussions</a>
                </div>
            </div>

            <div class="col-lg-9 col-12">
                <h2 class="tabTitle">Guilds</h2>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="guildTab">
                            
                            <?php
                                include('student.php');                            
                                $SectionSelected = $_POST['Section'];
                                $totalXP = 0;
                                $totalMembers = 0;
                                $AverageXP = 0;

                                $sql = "SELECT COUNT(studentID) FROM student WHERE Section = '$SectionSelected'";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                    $totalMembers = $row['COUNT(studentID)'];
                                }

                                $sql = "SELECT SUM(XP) FROM student WHERE Section = '$SectionSelected'";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()){
                                    $totalXP = $row['SUM(XP)'];
                                }

                                $AverageXP = $totalXP/$totalMembers;

                                $sql = "SELECT * FROM student WHERE Section ='$SectionSelected'";
                                $result = $conn->query($sql);
                                    echo 
                                            "
                                            <div class=\"content\">
                                                <div class=\"row\">
                                                    <div class=\"col-lg-12\">
                                                        <h3>Guild: ".$SectionSelected."</h3><br>
                                                        Total Students: ".$totalMembers." <br>
                                                        Combined XP: ".$totalXP." <br>
                                                        Average XP: ".$AverageXP."
                                                    </div>
                                                </div>
                                            </div>
                                            ";

                                while($row = $result->fetch_assoc()){
                                    echo " 
                                        <div class=\"content\">
                                            <div class=\"row\">
                                                <div class='col-lg-4 col-md-6 col-12'>
                                                    <img src='./Avatars/".$row['Class'].".png' class=\"listavatar\">
                                                </div>
                                                <div class=\"col-lg-8 col-md-6 col-12\">
                                                    <h4>ID ".$row['studentID']."</h4>
                                                    <h4>Name: ".$row['First_Name']." ".$row['Last_Name']."</h4>
                                                    <h4>Class: ".$row['Class']."</h4>
                                                    <h4>Section: ".$row['Section']."</h4>
                                                    <h4> Year Level: ".$row['Year_Level']."</h4>
                                                </div>
                                            </div>
                                        </div>
                                                ";
                                }
                                exit();
                            ?>       
                            </div>
                        </div>
                    </div>

            </div>
        </div>
        



        

        <div class="container footer fixed-bottom position-sticky">
        
        <div class="attribution row">
            <div class="col-lg-2 col-3">
                <span>Educatum LMS 2021</span>
            </div>

            <div class="col-lg-6 col-1">

            </div>

            <div class="col-lg-4 col-8">
                Icons made by <strong><a href="https://www.flaticon.com/authors/maxicons" title="max.icons">max.icons</a></strong> from <strong><a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></strong>
            </div>
        </div>
     </div>
    </div>

</body>

</html>