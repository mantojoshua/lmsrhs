<?php
ob_start();
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
                                <a href="./Admin_Panel_Database_Students.php"><button class="btn btn-primary">Back</button></a><br>
                            </div>

                            <div class="col-lg-1">

                            </div>

                            <div class="col-lg-11">
                                <br>
                                <strong><span>You are about to truncate the table of students. Press the button to confirm again.</span></strong><br><br>
                                <?php
                                    include('student.php');
                                    $sql = "SELECT COUNT(studentID) FROM student";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc()){
                                        echo "There are <strong>".$row['COUNT(studentID)']."</strong> entries about to be permanently deleted.";
                                    }
                                ?>

                            </div>

                            <div class="col-lg-1">

                            </div>

                            <div class="col-lg-11">
                                <form method="post">
                                    <br>
                                    <input type="submit" name="resetStudent" class="btn btn-danger" value="TRUNCATE Student Table" />
                                </form>
                                <?php
                                    include_once('student.php');

                                    if(array_key_exists('resetStudent', $_POST)) {
                                        resetStudent();
                                    }
                                    
                                    function resetStudent(){
                                        include('student.php');
                                        $sql = "TRUNCATE student";
                                        $result = $conn->query($sql);
                                        $sql = "ALTER TABLE student AUTO_Increment = 1";
                                        $result = $conn->query($sql);
                                        $conn->close();
                                        echo " <br> Deletion Confirmed, Press the back button to return";
                                    }

                                ?>
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