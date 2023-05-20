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
            <div class="col-3">
                <img src="./Avatars/wizard.png" class="avatar">
                <label> Learner's Name:</label>
                <span>Name</span>
            </div>

            <div class="col-4">
                <label> Learner's Level</label>
                <span>{ Level }</span> <br>
                <div class="level">
                    <div class="fillLevel"></div>
                </div>
            </div>
            
        </div>
        
       
    </div>

    <!--Main Body-->
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="sidebar">
                    <a href="./Archive.php">Archive</a>
                    <a href="./Assigned Quest.php">Assigned Quest</a>
                    <a href="./Guilds.php">Guilds</a>
                    <a class="active" href="./Training.php">Training</a>
                    <a href="./Achievements.php">Achievements</a>
                </div>
            </div>

            <div class="col-9">
                <h2 class="tabTitle">Training</h2>
                <div class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="">
                                <!--Sorted by studentID for now but will be replaced with XP probably-->
                            <?php
            include_once('student.php');
            $sql = "SELECT * FROM student ORDER BY studentID Desc";
            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()){
            echo "<div class='content'>";
              echo "<div class='row'> 
                        <div class='col-2'>
                        <span>Student ID:</span>
                        "
                            .$row['studentID'].
                        "</div>";
              echo      "<div class='col-3'>
                        <span>Name:</span>"
                            .$row['First_Name']." "
                            .$row['Last_Name'].
                        "</div>";
              
              echo      "<div class='col-2'>"
                        .   $row['Class'].
                        "</div>";
              echo      "<div class='col-2'>"
                            .$row['Section'].
                        "</div>";
              echo      "<div class='col-2'>
                        <span>Year Level:</span>"
                            .$row['Year_Level']." <span>year</span>
                        </div>";

              echo  "</div></div>";
              echo "<div/>";
            }
            $conn->close();
             ?>
                            </div>
                        </div>
                    </div>
                </div>
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
     
    

</body>

</html>