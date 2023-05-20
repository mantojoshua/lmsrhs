<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Admin Panel Database Students</title>
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
        <h1 class="tabTitle">Admin Panel</h2>
        </div>
       
    </div>

    <!--Main Body-->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="tabTitle">Database Management - Student Database</h2>
                    <div class="content">
                        <div class="row">

                            <div class="col-lg-12">
                                <a href="./Admin_Panel_Database_Students.php"><button class="btn btn-primary">Back</button></a>
                            </div>

                            <div class="col-lg-2">

                            </div>

                            <div class="col-lg-10">
                            <span>If the field below the Bold labels are blank. This means you have entered an invalid id to update.</span><br>
                                If you only wish to change a single field/column, leave the other fields empty.
                            </div>


                            <div class="col-lg-12">
                                <br>
                            </div>
                            
                            <?php
                                function addB($IDnumber){
                                    include_once('student.php');
                                    $command = "UPDATE";
                                    $sql = "INSERT INTO `temp`(`IDnumber`, `command`) VALUES ('$IDnumber', '$command')";
                                    $result = $conn->query($sql);
                                    $conn->close();
                                }
                                            
                                if(isset($_POST['updateEntry'])){
                                    echo addB($_POST['IDnumber']);
                                    $studentID = $_POST['IDnumber'];
                                }


                                include('student.php');
                                 $sql = "SELECT * FROM student where studentID = '$studentID'";
                                 $result = $conn->query($sql);
                                 
                                 
                                 echo
                                    "
                                    <div class=\"col-lg-2\">
                                    </div>

                                    <div class=\"col-lg-1\">
                                        <strong><span>studentID</span></strong>
                                    </div>

                                    <div class=\"col-lg-2\">
                                        <strong><span>First_Name</span> </strong>
                                    </div>

                                    <div class=\"col-lg-2\">
                                        <strong><span>Last_Name</span> </strong>
                                    </div>

                                    <div class=\"col-lg-1\">
                                        <strong><span>Username</span> </strong>
                                    </div>

                                    <div class=\"col-lg-1\">
                                        <strong><span>Class</span> </strong>
                                    </div>

                                    <div class=\"col-lg-1\">
                                        <strong><span>Section</span> </strong>
                                    </div>

                                    <div class=\"col-lg-1\">
                                         <strong><span>Year_Level</span> </strong>
                                    </div>

                                    <div class=\"col-lg-1\">
                                         <strong><span>XP</span> </strong>
                                    </div>

                                    <br>
                                    <br>
                                    ";
                                 while($row = $result->fetch_assoc()){
                                    if($row['studentID'] == NULL){
                                        echo "Invalid ID input!";
                                        exit();
                                     }
    
                                    echo"
                                    <div class=\"col-lg-2\">
                                    </div>

                                    <div class=\"col-lg-1\">
                                        <span>".$row['studentID']."</span>
                                    </div>

                                    <div class=\"col-lg-2\">
                                        <span>".$row['First_Name']."</span>
                                    </div>

                                    <div class=\"col-lg-2\">
                                        <span>".$row['Last_Name']."</span>
                                    </div>

                                    <div class=\"col-lg-1\">
                                        <span>".$row['Username']."</span>
                                    </div>

                                    <div class=\"col-lg-1\">
                                        <span>".$row['Class']."</span>
                                    </div>

                                    <div class=\"col-lg-1\">
                                        <span>".$row['Section']."</span>
                                    </div>

                                    <div class=\"col-lg-1\">
                                         <span>".$row['Year_Level']."</span>
                                    </div>

                                    <div class=\"col-lg-1\">
                                         <span>".$row['XP']."</span>
                                    </div>
                                    ";
                                 };
                                
                            ?>

                            <div class="col-lg-12">
                                <form class="row" action="Admin_Panel_Database_Students_Update_Done.php" method="post">
                                    <div class="col-lg-2">
                                    </div>
                                    <div class="col-lg-2">
                                        <br>
                                        <label>First Name:</label><br>
                                        <input type="text" class="form-control" name="First_Name">
                                    </div>

                                    <div class="col-lg-2">
                                        <br>
                                        <label>Last Name:</label>
                                        <input type="text" class="form-control" name="Last_Name">
                                    </div>

                                    <div class="col-lg-2">
                                        <br>
                                        <label>Username:</label>
                                        <input type="text" class="form-control" name="Username">
                                    </div>

                                    <div class="col-lg-1">
                                        <br>
                                        <label>Class:</label>
                                        <select class="form-control" name="Class" id="class">
                                        <option value="Adventurer">Adventurer</option>
                                        <option value="Alchemist">Alchemist</option>
                                        <option value="Assassin">Assassin</option>
                                        <option value="Barbarian">Barbarian</option>
                                        <option value="Bow">Bow Archer</option>
                                        <option value="Cleric">Cleric</option>
                                        <option value="Druid">Druid</option>
                                        <option value="Explorer">Explorer</option>
                                        <option value="Gunner">Gunner</option>
                                        <option value="Knight">Knight</option>
                                        <option value="Magician">Magician</option>
                                        <option value="Martial Fighter">Martial Fighter</option>
                                        <option value="Monk">Monk</option>
                                        <option value="Ninja">Ninja</option>
                                        <option value="Samurai">Samurai</option>
                                        <option value="Skirmisher">Skirmisher</option>
                                        <option value="Spearman">Spearman</option>
                                        <option value="Swordsman">Swordsman</option>
                                        <option value="Thief">Thief</option>
                                        <option value="Wizard">Wizard</option>
                                    </select>
                                    </div>

                                    <div class="col-lg-1">
                                        <br>
                                        <label>Section:</label>
                                        <input type="text" class="form-control" name="Section">
                                    </div>

                                    <div class="col-lg-1">
                                        <br>
                                        <label>Year Level:</label>
                                        <input type="text" class="form-control" name="Year_Level">
                                    </div>

                                    <div class="col-lg-1">
                                        <br>
                                        <label>XP:</label>
                                        <input type="text" class="form-control" name="XP">
                                    </div>

                                    <div class="col-lg-12">
                                        <input type="submit" class="btn btn-success" name="updateStudent">
                                    </div>
                                </form>
                            </div>

                           
                           

                        </div>


                    </div>
                        
            </div>
        </div>
    </div>
        



     <!-- JavaScript Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      
     

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