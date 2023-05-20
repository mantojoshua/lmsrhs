<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Educatum Student Tutorial</title>
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
                        $sql = "SELECT * from coursework inner join instructor on coursework.instructorID = instructor.instructorID inner join  instructor_courses on coursework.courseID = instructor_courses.courseID WHERE coursework.courseID IN (SELECT courseID FROM enrollments WHERE studentID = $idstudentsearch) AND coursework.workID NOT IN (SELECT workID FROM student_work WHERE studentID = $idstudentsearch)";
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
                            echo "<a class=\"active\" href=\"./Assigned_Quest.php\">Assigned Quest</a>";
                        }else{
                            echo "<a id=\"AssignedQuest\" class=\"active\" href=\"./Assigned_Quest.php\">Assigned Quest  <span id=\"sidebarNotif\" class=\"badge border border-warning border-2 rounded-pill badge-notification bg-danger\">".$notif."</span></a>";
                        }

                    
                    ?>
                    <a href="./Student_Guilds.php">Guilds</a>
                    <a href="./Achievements.php">Achievements</a>
                    <a href="./Announcements.php">Announcements</a>
                    <a class="active" href="./tutorial.php">Tutorial</a>
                </div>
            </div>

            <div class="col-lg-9">
                <h2 class="tabTitle">Tutorial / Manual</h2>
                <div class="content">
                    <div class="row">
                        <div class="col-lg-12">
                            Hello and Welcome to Educatum LMS. In this page you will learn how to use and navigate the LMS. You will learn the function of each individual parts and how you can use it.
                            <br><br>
                        </div>

                        <div class="col-lg-4">
                            <img src="./Tutorial_Assets/Navigation_Menu.png" id="tutIMGNavBar" alt="A picture of the Navigation Menu">
                        </div>

                        <!-- Place Holder no design yet -->
                        <div class="col-lg-8">
                            

                            <div class="tutorialBox">
                                 <strong>Navigation Menu</strong> <br>
                                The navigation menu lists all the tabs your account has access to.
                                It is used to move into other parts of the LMS.
                                The available tabs you have are:<br>
                                    <strong><a href="#Library"> Library</a></strong><br>
                                    <strong><a href="#tutAssignedQuest"> Assigned Quests</a></strong><br>
                                    <strong><a href="#Guilds"> Guilds</a></strong><br>
                                    <strong><a href="#Achievements"> Achievements</a></strong><br>
                                    <strong><a href="#Announcements"> Announcements</a></strong><br>
                                    <strong><a href="#Tutorial"> Tutorial</a></strong><br>
                                <br>
                                The lighter colored tab indicates the current tab you are in.
                            </div>
                            
                        </div>

                        <div class="col-lg-12">
                            <br>
                            <strong>Profile Name, Experience Bar and Levels (Status Bar)</strong> <br>
                            This is the status bar. it contains the learner's name, the experience bar which tracks the learners' XP and the current level. <br> 
                        </div>

                        <div class="col-lg-12">
                            <img src="./Tutorial_Assets/Status_Bar.png" id="tutIMGStatusBar" alt="A picture of the status bar">
                        </div>

                        <div class="col-lg-12">
                            In this example the student logged in has a username of Chris and is level 4 according to the status bar. 
                            The Level meter measure only up to 100 XP which means when the student exceeds that amount they level up. 
                            The student in the example has 350 XP, which would exceed the level meter 3 times making him level 4 and the remaining 50 XP fills the level meter halfway.
                        </div>

                        <div class="col-lg-12">
                            <br>
                            <strong id="Library">Library (Student)</strong>
                            <br>
                        </div>

                        <div class="col-lg-12">
                            <img src="./Tutorial_Assets/Library_CourseEnrollment.png" id="tutIMGLibrary" alt="A picture of the Library Tab, highlighting the course enrollment module">
                        </div>

                        <div class="col-lg-12">
                            <strong>Enrollment Module</strong><br>
                            The enrollment module is the feature which lets the learner enroll in their respective class.
                            By pressing the enrollment module a popup window will appear which asks for the code of the class the learner are to be enrolled with.
                            <br><br>
                            <strong>Enrollment Module Popup</strong>
                        </div>

                        <div class="col-lg-6">
                            <img src="./Tutorial_Assets/Library_CourseEnrollmentPopup.png" id="tutIMGLibraryPopup" alt="A picture of the popup window that appears when you click the enrollment module">
                        </div>

                        <div class="col-lg-6">
                            This popup is prompted upon clicking the enrollment module. You then enter a code that will be given to you by your instructors to be able to join the class/subject.
                        </div>

                        <div class="col-lg-12" id="tutAssignedQuest">
                            <br>
                            <strong>Assigned Quest</strong>
                            <br>
                            This is the Assigned Quest tab. It contains all the tasks that the student needs to do based on the subjects he is enrolled with.<br>      
                        </div>

                        <div class="col-lg-12">
                            <strong>Quest Given</strong> <br>
                            The Quest given tab contains all the schoolwork that the students currently have in the subjects they are enrolled with.<br>
                        </div>

                        <div class="col-lg-12">
                            <strong>Types of Quests: (Accompanying Icons)</strong> <br>
                        </div>

                        <div class="col-lg-4 center">
                            <img src="./Tutorial_Assets/Lesson.png" id="tutIMGQuestType" alt="">
                            <strong>Lesson</strong>
                        </div>

                        <div class="col-lg-4 center">
                            <img src="./Tutorial_Assets/Meeting.png" id="tutIMGQuestType" alt="">
                            <strong>Meeting</strong>
                        </div>

                        <div class="col-lg-4 center">
                            <img src="./Tutorial_Assets/Others.png" id="tutIMGQuestType" alt="">
                            <strong>Others</strong>
                        </div>

                        <div class="col-lg-4 center">
                            <img src="./Tutorial_Assets/Quiz.png" id="tutIMGQuestType" alt="">
                            <strong>Quiz</strong>
                        </div>

                        <div class="col-lg-4 center">
                            <img src="./Tutorial_Assets/Assignment.png" id="tutIMGQuestType" alt="">
                            <strong>Assignment</strong>
                        </div> 

                        <div class="col-lg-4 center">
                            <img src="./Tutorial_Assets/Exam.png" id="tutIMGQuestType" alt="">
                            <strong>Exam</strong>
                        </div>

                        <div class="col-lg-12">
                            <br>
                            There are 6 different kinds of quest and are represented by this icons. Quest signify schoolwork. By finishing schoolwork you are completing quests therefore gaining XP in the process
                        </div>

                        <div class="col-lg-12" id="Guilds">
                            <br>
                            <strong>Guilds</strong> <br>
                            Guilds are the students sections. It contains information about a section and a brief overview of each student in that section/guild. <br>       
                        </div>

                        <div class="col-lg-12" id="Achievements">
                            <strong>Achievements</strong> <br>
                            The Achievements tabs is only available for students. It contains the achievements of students that they can obtain by doing their quest. Achievements are obtained based on the amount of XP the student have. <br>         
                        </div>

                        <div class="col-lg-12">
                            <img src="./Tutorial_Assets/Achievements_Unachieved.png" id="tutIMGAchievements" alt="">
                        </div>

                        <div class="col-lg-12 center">
                            <strong><h4>Unachieved</h4></strong>
                        </div>
                        
                        
                        <div class="col-lg-12">
                            <img src="./Tutorial_Assets/Achievements_Achieved.png" id="tutIMGAchievements" alt="">
                        </div>

                        <div class="col-lg-12 center">
                            <strong><h4>Achieved</h4></strong>
                        </div>


                        <div class="col-lg-12" id="Announcements">
                            <strong>Announcements</strong> <br>
                            The announcement tab contains important school-wide announcements and events. It is used to inform both students and instructor on current activities. <br>  
                        </div>

                        
                    </div>
                </div>
            </div>

     <!-- JavaScript Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      
     
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
    </div>

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