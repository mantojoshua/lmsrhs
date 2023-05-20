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
                <h2 class="tabTitle">Database Management - Student Database</h2>
                    <div class="content">
                        <div class="row">

                            <div class="col-lg-12">
                                <a href="./Admin_Panel_Database_Students.php"><button class="btn btn-primary">Back</button></a><br><br>
                            </div>


                            <div class="col-lg-12">
                                <br>
                                <span>Are you sure you want to delete this entry?</span>
                            </div>
                            
                            <?php
                                function addB($IDnumber){
                                    include_once('student.php');
                                    $command = "DELETE";
                                    $sql = "INSERT INTO `temp`(`IDnumber`, `command`) VALUES ('$IDnumber', '$command')";
                                    $result = $conn->query($sql);
                                    $conn->close();
                                }

                                if(isset($_POST['deleteEntry'])){
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
                                <form action="Admin_Panel_Database_Students_Delete_Done.php" method="post">
                                    <input class="btn btn-secondary" type="submit" name="deleteEntry" value="Confirm">
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

    <!--Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Entry</h5>
                <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                <form class="row" action="Admin_Panel_Database_Students_Update.php" method="post">
                    <div class="col-lg-12">
                        <Label>Enter the studentID number of the entry you wish to delete:</Label><br>
                        <input type="text" name="IDnumber" class="form-control"><br>
                    </div>

                    <div class="col-lg-4">
                        <input class="btn btn-secondary" type="submit" name="deleteEntry">
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