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
                <h2 class="tabTitle">Database Management - Instructor Database</h2>
                    <div class="content">
                        <div class="row">

                            <div class="col-lg-12">
                                <a href="./Admin_Panel_Database_Students.php"><button class="btn btn-primary">Back</button></a><br><br>
                            </div>

                            
                            <div class="col-lg-2">
                            </div>

                            <div class="col-lg-10">
                                <span>Are you sure you want to delete these items?</span><br>
                                <br>
                            </div>

                            <div class="col-lg-2">
                            </div>

                            <div class="col-lg-10">
                                <form action="Admin_Panel_Database_Instructors_DeleteRange_Done.php" method="post">
                                    <input class="btn btn-danger" type="submit" name="deleteRangeEntry" value="Confirm"><br><br>
                                </form>
                            </div>
                                
  
                            <?php
                                //put this function in the done page
                                function addB($IDnumber, $IDnumSecond){
                                    include_once('student.php');
                                    $command = "DELETE_RANGE";
                                   
                                    if($IDnumber <= 0 || $IDnumSecond <= 0){
                                        echo "<div class=\"col-lg-2\"></div>";
                                        echo "<div class=\"col-lg-10\">Invalid Range Entered!</div>";
                                        exit();
                                    }
                                    $sql = "INSERT INTO `temp`(`IDnumber`, `IDnumSecond`,`command`) VALUES ('$IDnumber', '$IDnumSecond', '$command')";
                                    $result = $conn->query($sql);
                                    $conn->close();
                                }

                                if(isset($_POST['deleteRangeEntry'])){
                                    echo addB($_POST['IDnumber'], $_POST['IDnumSecond']);
                                    $IDnumber = $_POST['IDnumber'];
                                    $IDnumSecond = $_POST['IDnumSecond'];
                                }

                            
                               include('student.php');
                                $sql = "SELECT * FROM instructor where instructorID BETWEEN '$IDnumber' AND '$IDnumSecond'";
                                $result = $conn->query($sql);
                                
                                
                                echo"
                                <div class=\"col-lg-2\">
                                </div>
    
                                <div class=\"col-lg-2\">
                                    <strong><span>instructorID</span></strong>
                                </div>
    
                                <div class=\"col-lg-2\">
                                    <strong><span>First_Name</span></strong>
                                </div>
    
                                <div class=\"col-lg-2\">
                                    <strong><span>Last_Name</span></strong>
                                </div>
    
                                <div class=\"col-lg-2\">
                                    <strong><span>Username</span></strong>
                                </div>
    
                                <div class=\"col-lg-2\">
                                </div>
                                ";

                                while($row = $result->fetch_assoc()){
                                   if($row['instructorID'] == NULL){
                                        echo "<div class=\"col-lg-2\"></div>";
                                       echo "<div class=\"col-lg-10\">Invalid ID input!</div>";
                                       exit();
                                    }
   
                                    echo"
                                    <div class=\"col-lg-2\">
                                    </div>

                                    <div class=\"col-lg-2\">
                                        <span>".$row['instructorID']."</span>
                                    </div>

                                    <div class=\"col-lg-2\">
                                        <span>".$row['First_Name']."</span>
                                    </div>

                                    <div class=\"col-lg-2\">
                                        <span>".$row['Last_Name']."</span>
                                    </div>

                                    <div class=\"col-lg-2\">
                                        <span>".$row['Username']."</span>
                                    </div>

                                    <div class=\"col-lg-2\">
                                    </div>
                                ";
                                };

                               
                           ?>
                           
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