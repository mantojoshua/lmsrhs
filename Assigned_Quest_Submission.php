<?php
ob_start();
    session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Educatum Student Quests</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
            <div class="col-lg-3 col-12">
                <?php
                include_once('student.php');
                $stulogin = $_SESSION["stusernamemarker"];
                //query
                $sql = "SELECT * FROM student WHERE Username ='$stulogin'";
                $result = $conn->query($sql);
                //   prints the information
                while($row = $result->fetch_assoc()) {
                    $xp = $row['XP'];
                    echo "<img src=\"./Avatars/".$row['Class'].".png\" class=\"avatar\">";
                    echo "<label> Learner's Name: ".$row['First_Name']."</label>";
                }
                    ?>
            </div>

            <div class="col-lg-6 col-12 stats">
                <label> Learner's Level</label>
                <span id = "level">{ Level }</span>
                <div class="level">
                    <div class="fillLevel" id = "fill"></div>
                </div>
                
            </div>
            
        </div>
    </div>

    <!--Main Body-->
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="sidebar">
                    <a href="./Archive.php">Archive</a>
                    <a class="active" href="./Assigned_Quest.php">Assigned Quest</a>
                    <a href="./Student_Guilds.php">Guilds</a>
                    <a href="./Achievements.php">Achievements</a>
                    <a href="./Discussions.php">Discussions</a>
                </div>
            </div>
            <div class="col-lg-9 col-12">
 <h2 class="tabTitle">Assigned Quest</h2>
 <div class="content">
     <div class="row">
         <form action="Assigned_Quest_Submission.php" method="post">
             <div class="col-lg-12">
                <?php
                include_once('student.php');
                $sqlsss = "SELECT studentID from student where Username = '".$_SESSION["stusernamemarker"]."'" ;
                $resultsss = $conn->query($sqlsss);
                $row = mysqli_fetch_array($resultsss);
                if (!$row) {
                    printf("Error: %s\n", mysqli_error($conn));
                    exit();
                };
                $idstudentsearchc=$row["studentID"];
                $sql = "SELECT * FROM coursework inner join instructor_courses on coursework.courseID = instructor_courses.courseID inner join instructor on coursework.instructorID = instructor.instructorID inner join enrollments on coursework.courseID = enrollments.courseID where studentID = $idstudentsearchc";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                echo
                "
                     <div class=\"quest\">
                         <div class=\"questTitle row\">
                             <span class=\"questElements col-lg-4 col-12\" id=\"Cname\">Course Name: <br>".$row['course_Name']." </span>
                             <span class=\"questElements col-lg-3 col-12\" id=\"Iname\">Instructor Name: ".$row['First_Name']." ".$row['Last_Name']."</span>
                             <span class=\"questElements col-lg-3 col-12\" id=\"Deadline\">Deadline: ".$row['deadline']."</span> <br>
                         </div>
                         <div class=\"row\">
                             <span class=\"questElements col-lg-12 col-12\" ><strong>".$row['Title']." | ".$row['workType']."</strong></span>
                         </div>
                         <div class=\"row\">
                             <div class=\"col-lg-3 col-12\"><img class=\"questImage\" src=\"./General_Use_Asset/Apollo.png\" ></div>
                             <div class=\"questElements col-lg-4 col-12\">
                                <strong>Quest Descriptions</strong> <br>
                                ".$row['descriptions']."
                             </div>
             
                             <span class=\"questElements col-lg-3 col-12\"><strong>Reward:</strong> ".$row['xp_reward']." xp </span>
                             //create a form
                             <form action=\"Assigned_Quest_Submission.php\" method=\"post\" enctype=\"multipart/form-data\">
                             <div class=\"col-lg-3 col-12\">
             
                                 <input type=\"text\" name=\"studentID\" value=\"".$row['studentID']."\" hidden>
             
                                 <input type=\"text\" name=\"workID\" value=\"".$row['workID']."\" hidden>
             
                                 <input type=\"text\" name=\"submitted_file\"  >
                                 <td><button name=\"submit\" >Submit</button></td>
                             </div>
                             </form>
                         </div>
                         <div>
             
                         </div>
             
                                 </div>
                
             ";
             }
             // if(isset($_POST['submit'])){
             //     $file = $_FILES['myfile'];
             //     $fileName = $_FILES['myfile']['name'];
             //     $fileTmpName = $_FILES['myfile']['tmp_name'];
             //     $fileSize = $_FILES['myfile']['size'];
             //     $fileError = $_FILES['myfile']['error'];
             //     $fileType = $_FILES['myfile']['type'];
             //     $fileExt = explode('.', $fileName);
             //     $fileActualExt = strtolower(end($fileExt));
             //     $allowed = array('jpg', 'jpeg', 'png', 'pdf');
             //     if (in_array($fileActualExt, $allowed)) {
             //         if ($fileError === 0) {
             //             if ($fileSize < 1000000) {
             //                 $fileNameNew = uniqid('', true).".".$fileActualExt;
             //                 $fileDestination = 'uploads/'.$fileNameNew;
             //                 move_uploaded_file($fileTmpName, $fileDestination);
             //                 $sql = "INSERT INTO upload (filename, filepath) VALUES ('$fileName', '$fileDestination')";
             //                 mysqli_query($conn, $sql);
             //                 header("Location: Assigned_Quest_Submission.php?uploadsuccess");
             //             } else {
             //                 echo "Your file is too big!";
             //             }
             //         } else {
             //             echo "There was an error uploading your file!";
             //         }
             //     } else {
             //         echo "You cannot upload files of this type!";
             //     }
             // }
             function addB($studentID, $workID, $submitted_file){
                 include('student.php');
                     $sql = "INSERT INTO student_work ( studentID, workID,  submitted_file )
                     VALUES ('$studentID','$workID','$submitted_file')";
                     $result = $conn->query($sql);
                     if($result == TRUE) {
                $msg = "New record created successfully";
                     } else {
                $msg = "Error: " . $sql . "<br>" . $conn->error;
                     }
                     $conn->close();
                     return $msg;
                     }
             if(isset($_POST['submit'])){
                 echo addB($_POST['studentID'], $_POST['workID'], $_POST['submitted_file']);
             }
             ?>
              </div>
             </div>
         </form>

                        
                    </div>
                </div>
            </div>
        </div>
        <div class="container footer fixed-bottom position-sticky">
        
        <div class="attribution row">
            <div class="col-2">
                <span>Educatum LMS 2021</span>
            </div>

            <div class="col-6">

            </div>

            <div class="col-4">
                Icons made by <strong><a href="https://www.flaticon.com/authors/maxicons" title="max.icons">max.icons</a></strong> from <strong><a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></strong>
            </div>
        </div>
     </div>
    </div>

    <?php
        
    ?>
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- SELECT firsttable.name,thirdtable.cost FROM firsttable LEFT JOIN thirdtable ON firsttable.id=thirdtable.id;  -->
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