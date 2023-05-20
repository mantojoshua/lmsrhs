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
                <h2 class="tabTitle">Create Announcement Form</h2>
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-2">
                            </div>

                            <div class="col-lg-8">
                                
                                <form class="row" action="Admin_Panel_Announcements_Create.php" method="post">
                                    <div class="col-lg-12">
                                        <br>
                                        <label for="">Title</label><br>
                                        <input class="form-control" type="text" name="PostTitle" id="">
                                    </div>

                                    <div class="col-lg-12">
                                        <br>
                                        <label for="">Text</label><br>
                                        <textarea class="form-control" name="PostText" id=""></textarea><br>
                                    </div>
                                    
                                    <div class="col-lg-12">
                                        <label for="">Date: (Automatically gets current date)</label><br>
                                        <?php
                                            include_once('student.php');
                                            $sql = "SELECT CURRENT_DATE";
                                            $result = $conn->query($sql);

                                            while($row = $result->fetch_assoc()){
                                                echo"<strong><span>".$row['CURRENT_DATE']."</span></strong>";
                                            }
                                        ?>
                                    </div>

                                    <div class="col-lg-12">
                                        <input type="submit" class="btn btn-success" name="createAnnouncement">
                                    </div>

                                        <?php
                                            
                                            include_once('student.php');
                                            $adlogin = $_SESSION["adminMarker"];
                                            $sql = "SELECT AdminID from schooladmin where Username ='$adlogin'";
                                            $result = $conn->query($sql);
                                            $row = mysqli_fetch_array($result);
                                            if (!$row) {
                                                printf("Error1: %s\n", mysqli_error($conn));
                                                exit();
                                            };
                                            $AdminID = $row['AdminID'];
                                            
                                            include_once('student.php');
                                            $sql = "SELECT CURRENT_DATE";
                                            $result = $conn->query($sql);
                                            $row = mysqli_fetch_array($result);
                                            if (!$row) {
                                                printf("Error2: %s\n", mysqli_error($conn));
                                                exit();
                                            };
                                            $PostDate = $row['CURRENT_DATE'];

                                           
                                            function addB( $PostTitle,$PostText,$AdminID,$PostDate){
                                                include('student.php');
                                               
                                                $fixPostText =  mysqli_real_escape_string($conn,$PostText);
                                               
                                                $sql = "INSERT INTO announcements( `PostTitle`, `PostText`, `AdminID`, `PostDate`) VALUES ('$PostTitle','$fixPostText','$AdminID','$PostDate')";
                                                $result = $conn->query($sql);
                                                if($result == TRUE) {
                                                                                                $sql = "INSERT INTO user_log (username, userAction,userTimestamp)
                                            VALUES ('Admin', 'created an announcement',now())";
                                            $result = $conn->query($sql);
                                                    $msg = "New record created successfully";
                                                } else {
                                                    $msg = "Error: " . $sql . "<br>" . $conn->error;
                                                }
                                                $conn->close();
                                                return $msg;
                                                }
                                                
                                                if(isset($_POST['createAnnouncement'])){
                                                    echo addB($_POST['PostTitle'],$_POST['PostText'],$AdminID,$PostDate);
                                                }
                                            
                                        ?>
                                    
                                </form>
                            </div>
                            

                            <a href="./Admin_Panel_Announcements.php"><button class="btn btn-primary">Back</button></a>
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