<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Educatum Student Dashboard</title>
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
                    <div class=\"col-lg-3\"><br>
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


    <?php
        include_once('student.php');
        $stulogin = $_SESSION["stusernamemarker"];
        //query
        $sql = "SELECT * FROM student WHERE Username ='$stulogin' AND verified = 0";
        $result = $conn->query($sql);
        if ($result->num_rows < 0) {
            header("Location: Not_Verified.php");
        }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar">
                    <a class="active" href="./Not_Verified.php">Library</a>
                    <a href="./tutorial.php">Tutorial</a>
                </div>
            </div>

            <div class="col-lg-9">
                <h2 class="tabTitle">Pending Verification</h2>
                <div class="content">
                <div class="row">

                <div class="col-lg-12">
                    <a class="course enrollCourse" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <div  class="course">
                            <div class="courseheader">
                                <strong><span id="ctitle">Account not Verified with School Admin yet</span></strong> <br>
                                <span>Please wait for the school admin to verify your account</span>
                            </div>

                                    
                        </div>
                    </a>
                </div>

                <div class="col-lg-2">
                </div>

                <div class="col-lg-12">
                    When first registering you will encounter this page because you are not verified. This is a security measure to ensure that you are 
                    an actual student/personnel of the school that are authorized to use this LMS. Please wait for the school admins to admit you and allow you full access
                     to the LMS. thank you! 
                </div>

                      
        </div>
        </div>
        </div>
</div>

        
  
  <!-- Modal -->




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