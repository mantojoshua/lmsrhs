<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Educatum Student Archives</title>
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
                <h2 class="tabTitle">Student Database - Add Entry</h2>
                    <div class="content">
                        <div class="row">

                            <div class="col-lg-12">
                                <a href="./Admin_Panel_Database_Students.php"><button class="btn btn-primary">Back</button></a><br><br>
                            </div>

                            <div class="col-lg-12">
                                <br>
                            </div>
                            
                            <div class="col-lg-12">
                                <form class="row" action="./Admin_Panel_Database_Students_Add.php" method="post">
                                    <div class="col-lg-2">
                                        <label>First Name:</label><br>
                                        <input class="form-control" type="text" name="First_Name">
                                    </div>

                                    <div class="col-lg-2">
                                        <label>Last Name:</label><br>
                                        <input class="form-control" type="text" name="Last_Name">
                                    </div>

                                    <div class="col-lg-2">
                                        <label>Userame:</label><br>
                                        <input class="form-control" type="text" name="Username">
                                    </div>

                                    <div class="col-lg-2">
                                        <label>Password:</label><br>
                                        <input class="form-control" type="text" name="passwords">
                                    </div>

                                    <div class="col-lg-2">
                                        <label>Class:</label><br>
                                        <select class="form-control" name="Class">
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
                                        <label>Section:</label><br>
                                        <input class="form-control" type="text" name="Section"> 
                                    </div>

                                    <div class="col-lg-1">
                                        <label>Year Level:</label>
                                        <input class="form-control" type="text" name="Year_Level">
                                    </div>

                                    <div class="col-lg-2">
                                        <br>
                                        <button class="btn btn-success" type="submit" name="addStudent">Add Entry</button>
                                    </div>

                                    <?php
                                        function addB($First_Name, $Last_Name, $Username,$passwords, $Class, $Section, $Year_Level){
                                            include('student.php');
                                            //If any of the fields are not filled the function to input is not started
                                            if($First_Name == NULL || $Last_Name == NULL || $Username == NULL || $passwords == NULL || $Class == NULL || $Section == NULL || $Year_Level == NULL){
                                                echo "<br><br>
                                                      <div class=\"col-lg-12\">
                                                            Error: Some of the fields are missing data. Make sure to enter proper data into all fields.
                                                      </div>
                                                ";
                                                exit();
                                            }

                                            $sql = "INSERT INTO student ( First_Name, Last_Name, Username,passwords, Class, Section, Year_Level)
                                            VALUES ('$First_Name', '$Last_Name', '$Username','$passwords', '$Class', '$Section', '$Year_Level')";
                                            $result = $conn->query($sql);
                                            if($result == TRUE) {
                                                echo "<br><br><br>
                                                <div class=\"col-lg-12\">
                                                      New record created successfully!
                                                </div>";
                                            } else {
                                                echo "<br><br>
                                                <div class=\"col-lg-12\">
                                                    Error: " . $sql . "<br>" . $conn->error."</div>";
                                                    
                                            }
                                            $conn->close();
                                            }
                                            if(isset($_POST['addStudent'])){
                                                echo addB($_POST['First_Name'], $_POST['Last_Name'], $_POST['Username'],$_POST['passwords'], $_POST['Class'], $_POST['Section'], $_POST['Year_Level']);
                                            }
                                    ?>
                                </form>
                            </div>
                           
                            
                        </div>
                    </div>
                        
            </div>
        </div>
    </div>
    
    <!--Modals Area-->


    <!--Update Modal-->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Entry</h5>
                <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                <form class="row" action="Admin_Panel_Database_Students_Update.php" method="post">
                    <div class="col-lg-12">
                        <Label>Enter the studentID number of the entry you wish to change:</Label><br>
                        <input type="text" name="IDnumber" class="form-control"><br>
                    </div>

                    <div class="col-lg-4">
                        <input class="btn btn-secondary" type="submit" name="updateEntry">
                    </div>
                </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>

    <!--Reset Database Modal-->
    <div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="resetModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetModalLabel">Database Deletion</h5>
                <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form class="row" action="Admin_Panel_Database_Students_Truncate.php" method="post">
                        <div class="col-lg-12">
                            <Label>Are you sure you want to delete all files from this table?</Label><br>
                            <br>
                        </div>

                        <div class="col-lg-4">
                            <input class="btn btn-danger" type="submit" name="resetTable" value="Confirm">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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