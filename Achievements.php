<?php
session_start();
?>


<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Educatum Student Achievements</title>
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
            <?php
                include_once('student.php');
                $stulogin = $_SESSION["stusernamemarker"];
                //query
                $sql = "SELECT * FROM student WHERE Username ='$stulogin'";
                $result = $conn->query($sql);
                //   prints the information
                while($row = $result->fetch_assoc()) {
                    $studentID = $row['studentID'];
                    $xp = $row['XP'];
                    echo "
                    <div class=\"col-lg-1\">
                    <img src=\"./Avatars/".$row['Class'].".png\" class=\"avatar\">
                    </div>
                    ";

                    echo "
                    <div class=\"col-lg-3\"><br>
                    <label> Learner's Name: <strong>".$row['First_Name']." </strong></label>
                    </div>
                    ";
                }
                    ?>

            <div class="col-lg-5 col-12 stats">
                <label> Learner's Level</label>
                <span id = "level">{ Level }</span>
                <div class="level">
                    <div class="fillLevel" id = "fill"></div>
                </div>
            </div>

            <div class="col-lg-1 logout_btn" style="display:inline; float:right;">
                <br>
                <a class="loginRegister btn btn-dark" href="./logout.php ">Logout</a>
            </div>

            <?php


    $sql = "select studentID, XP from student where Username = '".$_SESSION["stusernamemarker"]."'" ;
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
    if (!$row) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    };
    $a1 = $a2 = $a3 = $a4 = $a5 = $a6 = $a7 = $a8 = $a9 = $a10 = $a11 = $a12 = $a13 = $a14 = $a15 = $a16 = 0;
    $XP = $row['XP'];

    //Achievement Completion Code (XP based version)
    if($XP >= 50){
        $a1 = 1;
    }else{
        $a1 = 0;
    }

    if($XP >= 100){
        $a2 = 1;
    }else{
        $a2 = 0;
    }

    if($XP >= 200){
        $a3 = 1;
    }else{
        $a3 = 0;
    }

    if($XP >= 250){
        $a4 = 1;
    }else{
        $a4 = 0;
    }

    if($XP >= 300){
        $a5 = 1;
    }else{
        $a5 = 0;
    }

    if($XP >= 350){
        $a6 = 1;
    }else{
        $a6 = 0;
    }

    if($XP >= 400){
        $a7 = 1;
    }else{
        $a7 = 0;
    }

    if($XP >= 450){
        $a8 = 1;
    }else{
        $a8 = 0;
    }

    if($XP >= 500){
        $a9 = 1;
    }else{
        $a9 = 0;
    }

    if($XP >= 550){
        $a10 = 1;
    }else{
        $a10 = 0;
    }

    if($XP >= 650){
        $a11 = 1;
    }else{
        $a11 = 0;
    }

    if($XP >= 750){
        $a12 = 1;
    }else{
        $a12 = 0;
    }

    if($XP >= 850){
        $a13 = 1;
    }else{
        $a13 = 0;
    }

    if($XP >= 950){
        $a14 = 1;
    }else{
        $a14 = 0;
    }

    if($XP >= 1500){
        $a15 = 1;
    }else{
        $a15 = 0;
    }

    if($XP >= 1500){
        $a16 = 1;
    }else{
        $a16 = 0;
    }

    $sql = "UPDATE achievements SET a1='$a1', a2='$a2', a3='$a3', a4='$a4', a5='$a5', a6='$a6', a7='$a7', a8='$a8', a9='$a9', a10='$a10', a11='$a11', a12='$a12', a13='$a13', a14='$a14', a15='$a15', a16='$a16' WHERE studentID=".$row["studentID"]."";

    if (mysqli_query($conn, $sql)) {
        echo "<div class=\"col-lg-2 col-12\">Achievement Updated successfully</div>";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    
?>
            
        </div>
        
       
    </div>

    <!--Main Body-->
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar">
                    <a href="./Archive.php">Library</a>
                    <?php
                        $idstudentsearch = $studentID;
                        include_once('student.php');
                        $sql = "SELECT * from coursework WHERE courseID IN (SELECT courseID FROM enrollments WHERE studentID = $idstudentsearch) AND coursework.workID NOT IN (SELECT workID FROM student_work WHERE studentID = $idstudentsearch)";
                        $result = $conn->query($sql);
                        if(!$result){
                            echo "Query Error";
                            exit();
                        }
                        $num = mysqli_num_rows($result);
                        
                        if($num > 99){
                            $notif = "99+";
                        }else{
                            $notif = $num;
                        }

                        if($notif <= 0){
                            echo "<a href=\"./Assigned_Quest.php\">Assigned Quest</a>";
                        }else{
                            echo "<a id=\"AssignedQuest\" href=\"./Assigned_Quest.php\">Assigned Quest  <span id=\"sidebarNotif\" class=\"badge border border-warning border-2 rounded-pill badge-notification bg-danger\">".$notif."</span></a>";
                        }

                    
                    ?>
                    <a href="./Student_Guilds.php">Guilds</a>
                    <a class="active" href="./Achievements.php">Achievements</a>
                    <a href="./Announcements.php">Announcements</a>
                    <a href="./tutorial.php">Tutorial</a>
                </div>
            </div>

            <div class="col-lg-9">
                <h2 class="tabTitle">My Achievements</h2>
                <div class="content">
                    <div class="row">
                    <?php
                        $studentID = $_SESSION["stusernamemarker"];
                        $sql = "SELECT * from student where Username = '$studentID'" ;
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_array($result);
                        if (!$row) {
                            printf("Error: %s\n", mysqli_error($conn));
                            exit();
                        }; 

                        include_once('student.php');
                        // reminder make it so that the sql statements determine/outputs the current users achievements
                        $sql = "SELECT * FROM achievements where studentID = '".$row['studentID']."'";
                        $result = $conn->query($sql);
                        $row = mysqli_fetch_array($result);
                            if (!$row) {
                                printf("Error: %s\n", mysqli_error($conn));
                                exit();
                            };   
                        
                        if($row['a1'] == 1){
                            $buccaneer = "Buccaneer.png";
                            $status1 = "achievement1";
                        }else{
                            $buccaneer = "Buccaneer_na.png";
                            $status1 = "achievement0";
                        }

                        if($row['a2'] == 1){
                            $knight = "Knight.png";
                            $status2 = "achievement1";
                        }else{
                            $knight = "Knight_na.png";
                            $status2 = "achievement0";
                        }

                        if($row['a3'] == 1){
                            $spartan = "Spartan.png";
                            $status3 = "achievement1";
                            
                        }else{
                            $spartan = "Spartan_na.png";
                            $status3 = "achievement0";
                            
                        }

                        if($row['a4'] == 1){
                            $king = "King.png";
                            $status4 = "achievement1";
                        }else{
                            $king = "King_na.png";
                            $status4 = "achievement0";
                        }

                        if($row['a5'] == 1){
                            $perseus = "Perseus.png";
                            $status5 = "achievement1";
                        }else{
                            $perseus = "Perseus_na.png";
                            $status5 = "achievement0";
                        }

                        if($row['a6'] == 1){
                            $hercules = "Hercules.png";
                            $status6 = "achievement1";
                        }else{
                            $hercules = "Hercules_na.png";
                            $status6 = "achievement0";
                        }

                        if($row['a7'] == 1){
                            $hermes = "Hermes.png";
                            $status7 = "achievement1";
                        }else{
                            $hermes = "Hermes_na.png";
                            $status7 = "achievement0";
                        }

                        if($row['a8'] == 1){
                            $hephaestus = "Hephaestus.png";
                            $status8 = "achievement1";
                        }else{
                            $hephaestus = "Hephaestus_na.png";
                            $status8 = "achievement0";
                        }

                        if($row['a9'] == 1){
                            $prometheus = "Prometheus.png";
                            $status9 = "achievement1";
                        }else{
                            $prometheus = "Prometheus_na.png";
                            $status9 = "achievement0";
                        }

                        if($row['a10'] == 1){
                            $atlas = "Atlas.png";
                            $status10 = "achievement1";
                        }else{
                            $atlas = "Atlas_na.png";
                            $status10 = "achievement0";
                        }

                        if($row['a11'] == 1){
                            $ares = "Ares.png";
                            $status11 = "achievement1";
                        }else{
                            $ares = "Ares_na.png";
                            $status11 = "achievement0";
                        }

                        if($row['a12'] == 1){
                            $athena = "Athena.png";
                            $status12 = "achievement1";
                        }else{
                            $athena = "Athena_na.png";
                            $status12 = "achievement0";
                        }

                        if($row['a13'] == 1){
                            $death = "Death.png";
                            $status13 = "achievement1";
                        }else{
                            $death = "Death_na.png";
                            $status13 = "achievement0";
                            
                        }

                        if($row['a14'] == 1){
                            $hades = "Hades.png";
                            $status14 = "achievement1";
                        }else{
                            $hades = "Hades_na.png";
                            $status14 = "achievement0";
                        }

                        if($row['a15'] == 1){
                            $zeus = "Zeus.png";
                            $status15 = "achievement1";
                        }else{
                            $zeus = "Zeus_na.png";
                            $status15 = "achievement0";
                        }

                        if($row['a16'] == 1){
                            $greekpantheon = "Greek_Pantheon.png";
                            $status16 = "achievement1";
                        }else{
                            $greekpantheon = "Greek_Pantheon_na.png";
                            $status16 = "achievement0";
                        }

                        echo "
                        <div class=\"col-lg-3 $status1\">
                            <img class=\"achieveIMG\" src=\"./Achievements/$buccaneer\" alt=\"Hermes Award Not Achieved\">
                            <span class=\"achieveText\">Buccaneer Award</span>
                        </div>
                        <div class=\"col-lg-3 $status2\">
                            <img class=\"achieveIMG\" src=\"./Achievements/$knight\" alt=\"Deathwatch Award Not Acheived\">
                            <span class=\"achieveText\">Knight Award</span>
                        </div>
                        <div class=\"col-lg-3 $status3\">
                            <img class=\"achieveIMG\" src=\"./Achievements/$spartan\" alt=\"Athena Award Not Achieved\">
                            <span class=\"achieveText\">Spartan Award</span>
                        </div>
                        <div class=\"col-lg-3 $status4\">
                            <img class=\"achieveIMG\" src=\"./Achievements/$king\" alt=\"Spartan Award Not Achieved\">
                            <span class=\"achieveText\">King Award</span>
                        </div>
                        <!--1st Row-->

                        <div class=\"col-lg-3 $status5\">
                            <img class=\"achieveIMG\" src=\"./Achievements/$perseus\" alt=\" Award\">
                            <span class=\"achieveText\">Perseus Award</span>
                        </div>
                        <div class=\"col-lg-3 $status6\">
                            <img class=\"achieveIMG\" src=\"./Achievements/$hercules\" alt=\" Award\">
                            <span class=\"achieveText\">Hercules Award</span>
                        </div>
                        <div class=\"col-lg-3 $status7\">
                            <img class=\"achieveIMG\" src=\"./Achievements/$hermes\" alt=\" Award\">
                            <span class=\"achieveText\">Hermes Award</span>
                        </div>
                        <div class=\"col-lg-3 $status8\">
                            <img class=\"achieveIMG\" src=\"./Achievements/$hephaestus\" alt=\" Award\">
                            <span class=\"achieveText\">Hephaestus Award</span>
                        </div>
                        <!--2nd Row-->

                        <div class=\"col-lg-3 $status9\">
                            <img class=\"achieveIMG\" src=\"./Achievements/$prometheus\" alt=\" Award\">
                            <span class=\"achieveText\">Prometheus Award</span>
                        </div>
                        <div class=\"col-lg-3 $status10\">
                            <img class=\"achieveIMG\" src=\"./Achievements/$atlas\" alt=\" Award\">
                            <span class=\"achieveText\">Atlas Award</span>
                        </div>
                        <div class=\"col-lg-3 $status11\">
                            <img class=\"achieveIMG\" src=\"./Achievements/$ares\" alt=\" Award\">
                            <span class=\"achieveText\">Ares Award</span>
                        </div>
                        <div class=\"col-lg-3 $status12\">
                            <img class=\"achieveIMG\" src=\"./Achievements/$athena\" alt=\" Award\">
                            <span class=\"achieveText\">Athena Award</span>
                        </div>
                        <!--3rd Row-->

                        <div class=\"col-lg-3 $status13\">
                            <img class=\"achieveIMG\" src=\"./Achievements/$death\" alt=\" Award\">
                            <span class=\"achieveText\">Thanatos Award</span>
                        </div>
                        <div class=\"col-lg-3 $status14\">
                            <img class=\"achieveIMG\" src=\"./Achievements/$hades\" alt=\" Award\">
                            <span class=\"achieveText\">Hades Award</span>
                        </div>
                        <div class=\"col-lg-3 $status15\">
                            <img class=\"achieveIMG\" src=\"./Achievements/$zeus\" alt=\" Award\">
                            <span class=\"achieveText\">Zeus Award</span>
                        </div>
                        <div class=\"col-lg-3 $status16\">
                            <img class=\"achieveIMG\" src=\"./Achievements/$greekpantheon\" alt=\" Award\">
                            <span class=\"achieveText\">Pantheon Completion</span>
                        </div>
                        <!--4th Row-->
                        "; 
                        ?>
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