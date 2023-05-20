<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Admin Panel Database - Student</title>
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

                            <div class="col-lg-10">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateModal">Update/Change Item</button>
                                <a href="./Admin_Panel_Database_Students_Add.php"><button class="btn btn-success">Add Item</button></a>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete an Item</button>
                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#deleteRangeModal">Delete Range of Items</button>
                                <button class="btn btn-light"  data-bs-toggle="modal" data-bs-target="#searchModal">Search</button>
                            </div>

                            <div class="col-lg-2">
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#resetModal">Reset Table</button>
                            </div>

                            <div class="col-lg-12">
                                <br>
                            </div>
                            
                            <?php
                                include_once('student.php');
                                $column = $_POST['column'];
                                $SearchValue = $_POST['SearchValue'];
                                 $sql = "SELECT * FROM student WHERE $column = '$SearchValue'";
                                 $result = $conn->query($sql);
                                 echo
                                    "
                                    <div class=\"col-lg-2\">
                                    </div>
                                    <div class=\"col-lg-10\">
                                        <strong>If the field below the labels are blank then you have entered an invalid search item or it doesnt exist</strong>
                                    </div>
                                    
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
                <form class="row" action="Admin_Panel_Database_Students_Delete.php" method="post">
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

    <!--Delete Range Modal-->
    <div class="modal fade" id="deleteRangeModal" tabindex="-1" role="dialog" aria-labelledby="deleteRangeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRangeModalLabel">Delete Entry</h5>
                <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="./Admin_Panel_Database_Students_DeleteRange.php" method="post" class="row">

                        <div class="col-lg-12">
                            <Label>Enter the range of the studentID numbers of the entries you wish to delete:</Label><br><br>
                        </div>

                        <div class="col-lg-6">
                            <label>Range Start:</label><br>
                            <input type="text" class="form-control" name="IDnumber">
                        </div>

                        <div class="col-lg-6">
                            <label>Range Start:</label><br>
                            <input type="text" class="form-control" name="IDnumSecond">
                        </div>

                        <div class="col-lg-12">
                            <br>
                            <input class="btn btn-primary" type="submit" name="deleteRangeEntry">
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

    <!--Search Modal-->
   <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Column Search</h5>
                <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                <form class="row" action="Admin_Panel_Database_Students_Search.php" method="post">
                    <div class="col-lg-12">
                        <Label>Choose a single column to search by</Label>
                        <select name="column">
                            <option value="studentID">studentID</option>
                            <option  value="First_Name">First Name</option>
                            <option value="Last_Name">Last Name</option>
                            <option value="Username">Username</option>
                            <option value="Class">Class</option>
                            <option value="Section">Section</option>
                            <option value="Year_Level">Year Level</option>
                            <option value="XP">XP</option>
                        </select><br><br>
                        
                        <label>Search Value</label><br>
                        <input type="text" name="SearchValue">

                        
                        <br><br>
                    </div>

                    <div class="col-lg-4">
                        <input class="btn btn-secondary" type="submit" name="search" value="Confirm">
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