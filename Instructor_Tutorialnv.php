<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Educatum Instructor Tutorial</title>
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
            <div class="col-lg-5 col-12">
            <img src="./Avatars/wizard.png" class="avatar">
                
                <!-- ######## -->
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

            
            
        </div>
        
       
    </div>

    <!--Main Body-->
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar">
                    <a href="./Not_Verified_Instructor.php">Library</a>
                    <a class="active" href="./Instructor_Tutorialnv.php">Tutorial</a>
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
                            <img src="./Tutorial_Assets/Navigation_Menu2.png" id="tutIMGNavBar" alt="A picture of the Navigation Menu">
                        </div>

                        <div class="col-lg-8">
                            

                            <div class="tutorialBox">
                                 <strong>Navigation Menu</strong> <br>
                                The navigation menu lists all the tabs your account has access to.
                                It is used to move into other parts of the LMS.
                                The available tabs you have are:<br>
                                    <strong><a href="#Library"> Library</a></strong><br>
                                    <strong><a href="#tutAssignedQuest"> Quest Given</a></strong><br>
                                    <strong><a href="#Guilds"> Guilds</a></strong><br>
                                    <strong><a href="#Announcements"> Announcements</a></strong><br>
                                    <strong><a href="#Tutorial"> Tutorial</a></strong><br>
                                <br>
                                The lighter colored tab indicates the current tab you are in.
                            </div>
                            
                        </div>

                        <div class="col-lg-12">
                            <br>
                            <strong>Quest Given</strong>
                        </div>

                        <div class="col-lg-8">
                            <img src="./Tutorial_Assets/Quest_Given.png" id="tutIMGQuestGiven" alt="">
                        </div>

                        <div class="col-lg-4">
                            This is the Quest Given Tab. Here you will see your created courses/subjects. You can then select one of them to check 
                            quests on those subjects. 
                        </div>

                        <div class="col-lg-8">
                            <img src="./Tutorial_Assets/Quest_Given_Coursework.png" id="tutIMGQuestGiven" alt="">
                        </div>

                        <div class="col-lg-4">
                            After selecting a subject this is what the menu looks like. You can see a table of all your quests. The table is arranged 
                            based on the time you made it and any succeeding quest is listed below the previous one. If the quest requires a file to be passed
                             then there would be a VIEW WORKS button to proceed in grading and checking that quest.
                        </div>

                        <div class="col-lg-8">
                            <img src="./Tutorial_Assets/Quest_Given_Coursework_Grading.png" id="tutIMGQuestGiven" alt="">
                        </div>

                        <div class="col-lg-4">
                            This is the checking tab where you can access the files the student has sent you if available. The download button downloads the file the student has sent.
                            When grading a student you can input his/her grade in the grade value field (The white text box), then click the pass grade button. keep in mind you can only grade 1 
                            student at a time so entering in multiple fields would not work and only the entry in the button you click will record the grade                   
                        </div>

                        <div class="col-lg-12">
                            <br>
                            <strong>Training</strong>
                        </div>

                        <div class="col-lg-4">
                            This is the training tab. In the training tab it will list all students that have a low amount of XP. Since XP points are rewarded on students 
                            who do their quests you will be able to identify students who are not doing well to better facilitate them.
                        </div>

                        <div class="col-lg-8">
                            <img src="./Tutorial_Assets/Training.png" id="tutIMGTraining" alt="">
                        </div>

                        <div class="col-lg-12">
                            <br>
                            <strong>Course Management (Library Tab)</strong>
                        </div>

                        <div class="col-lg-8">
                            <img src="./Tutorial_Assets/Course_Module.png" id="tutIMGCourse" alt="">
                        </div>

                        <div class="col-lg-4">
                            This is the library tab where you can create and manage your subjects. There 3 course modules: Create Course, Delete Course and Create Quest.
                        </div>

                        <div class="col-lg-12">
                            <br>
                        </div>

                        <div class="col-lg-4">
                            <img src="./Tutorial_Assets/Course_Module_Create_Course.png" id="tutIMGCourseModules" alt="">
                        </div>

                        <div class="col-lg-4">
                            <img src="./Tutorial_Assets/Course_Module_Delete_Course.png" id="tutIMGCourseModules" alt="">
                        </div>

                        <div class="col-lg-4">
                            <img src="./Tutorial_Assets/Course_Module_Quest_Create.png" id="tutIMGCourseModules" alt="">
                        </div>

                        <div class="col-lg-4">
                            <strong>Create Course</strong><br>
                            This is the module to create course and will redirect you to the Course Create Form. 
                        </div>

                        <div class="col-lg-4">
                            <strong>Delete Course</strong> <br>
                            This is where you can delete/archive courses that are made by mistake or is not needed anymore.
                        </div>

                        <div class="col-lg-4">
                            <strong>Create Quest</strong><br>
                            This is the module that lets you be able to create quest/schoolworks for your students.
                            The types of quest available are Lessons, Meetings, Quiz, Assignments, Exams and Others.
                        </div>

                        <div class="col-lg-12">
                            <hr>
                        </div>

                        <div class="col-lg-12">
                            <strong>Create Course (Course Create Form)</strong>
                        </div>

                        <div class="col-lg-8">
                            <img src="./Tutorial_Assets/Course_Create_Form.png" id="tutIMGCourseCreateForm" alt="">
                        </div>

                        <div class="col-lg-4">
                            This is the course create form. This is how you will create your course/subject. There are 3 fields needed to create a course.
                            First is the course/subject's name which is important for identification and labelling, then you will need a description to 
                            briefly explain what the subject is about. Lastly you will need a code which is what the students will use to be able to join your 
                            course.
                        </div>

                        <div class="col-lg-12">
                            <hr>
                        </div>

                        <div class="col-lg-12">
                            <strong>Delete Course</strong>
                        </div>

                        <div class="col-lg-8">
                            <img src="./Tutorial_Assets/Course_Delete.png" id="tutIMGCourseCreateForm" alt="">
                        </div>

                        <div class="col-lg-4">
                            This is the course delete form. You can select from a dropdown and choose the course to be archived.
                        </div>

                        <div class="col-lg-4">
                            <br><strong>Deleted Courses (Archived)</strong><br>
                            This is the course archive. This is where deleted courses go instead of just being permanently deleted. The archive acts as a 
                            backup if ever the data in the courses needs to be accessed again. <br> <br>
                            To restore a course just access the dropdown at the bottom of the page and enter the appropriate course you want to restore.
                        </div>

                        <div class="col-lg-8">
                            <img src="./Tutorial_Assets/Archived_Courses.png" id="tutIMGCourseCreateForm" alt="">
                        </div>

                        <div class="col-lg-12">
                            <hr>
                        </div>

                        <div class="col-lg-12">
                            <strong>Quest Create</strong>
                        </div>

                        <div class="col-lg-8">
                            <img src="./Tutorial_Assets/Quest_Create.png" id="tutIMGCourseCreateForm" alt="">
                        </div>

                        <div class="col-lg-4">
                            <img src="./Tutorial_Assets/Quest_Create_Post_Type.png" alt="">
                        </div>

                        <div class="col-lg-12">
                            This is the quest create form to create various schoolwork and lessons. It is listed on the right image all the types of quests you can assign.
                            The quest create form requires input in multiple fields to create. First you will select the course you want to create a quest from. You would only be able to create
                             quest from courses you made. Then you input the name and choose what type of quest you wanted to create. The next part then asks for a date (a calendar menu will appeear) to set a deadline for 
                             the submission of the quest. Then you input an XP reward for the RPG gamification aspect of the LMS to encourage students and finally the description which is used to 
                             describe what the quest instructions are and any details and caveats you want to include in the quest. 
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