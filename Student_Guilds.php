<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Educatum Student Guilds</title>
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
                    <div class=\"col-lg-3 col-12\"><br>
                    <label> Learner's Name: <strong>".$row['First_Name']." </strong></label>
                    </div>
                    ";
                }
            ?>
            

            <div class="col-lg-6 col-12 stats">
                <label> Learner's Level</label>
                <span id = "level">{ Level }</span>
                <div class="level">
                    <div class="fillLevel" id = "fill"></div>
                </div>
                
            </div>
            <div class="col-lg-2 logout_btn" style="display:inline; float:right;">
                <br>
                <a class="loginRegister btn btn-dark" href="./logout.php ">Logout</a>
            </div>
            
        </div>
    </div>


    <!--Main Body-->
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
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
                    <a class="active"  href="./Student_Guilds.php">Guilds</a>
                    <a href="./Achievements.php">Achievements</a>
                    <a href="./Announcements.php">Announcements</a>
                    <a href="./tutorial.php">Tutorial</a>
                </div>
            </div>

            <div class="col-lg-9 col-12">
                <h2 class="tabTitle">Guilds List</h2>

                    <div class="row">
                        <div class="col-12">
                            <div class="guildTab">
                            
                            <?php
                                include_once('student.php');                            

                                // Record Output/Echo
                                $sql = "SELECT * FROM student ORDER BY Section";
                                $section = '';
                                $result = $conn->query($sql);

                                while($row = $result->fetch_assoc()){
                                    
                                    
                                    if($section != $row['Section']) { 
                                        $section = $row['Section']; 
                                        echo '<div class="guildTitle">
                                                <h1> Guild: '.$section.'</h1>
                                                <form method="post" action="./Student_Guilds_MoreInfo.php">
                                                    <input type="hidden" name="Section" value="'.$section.'">
                                                    <input class="btn btn-primary" type="submit" value="More Info">
                                                </form>
                                            </div>';  
                                    } 
                                     


                                }
                                
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
<script>
    console.log("hello");
    var xp = '<?php echo $xp;?>';
    console.log(xp);
    console.log("hello");
    var xpCapPerLevel = 100;
    var levelFill = xp%xpCapPerLevel;
    var level = Math.floor(xp / 100 + 1);
    document.getElementById("fill").style.width = levelFill + "%";
    document.getElementById("level").textContent = Math.floor(xp / 100 + 1);
</script>



</html>