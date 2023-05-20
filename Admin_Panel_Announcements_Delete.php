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
                <h2 class="tabTitle">Announcement Delete</h2>
                    <div class="content">
                        <div class="row">
                            
                            <div class="col-lg-2">
                                <a href="./Admin_Panel_Announcements.php"><button class="btn btn-primary">Back</button></a>
                            </div>

                            <div class="col-lg-10">
                                <form action="Admin_Panel_Announcements_Delete.php" method="post">
                                    <label>AnnouncementID to Delete</label><br>
                                    <input type="text" name="PostID">

                                    <input type="submit" class="btn btn-danger" name="deleteAnnouncement" value="Delete"><br><br>
                                </form>
                            </div>
                            

                            <?php
                                include_once('student.php');
                                $sql = "SELECT * FROM announcements";
                                $result = $conn->query($sql);
                                echo 
                                "
                                <div class=\"col-lg-2\">
                                </div>

                                <div class=\"col-lg-1\">
                                    <strong><span>PostID</span></strong>
                                </div>

                                <div class=\"col-lg-2\">
                                    <strong><span>PostTitle</span></strong>
                                </div>

                                <div class=\"col-lg-4\">
                                    <strong><span>PostText</span></strong>
                                </div>

                                <div class=\"col-lg-1\">
                                    <strong><span>AdminID</span></strong>
                                </div>

                                <div class=\"col-lg-1\">
                                    <strong><span>PostDate</span></strong>
                                </div>
                                ";
                                while($row = $result->fetch_assoc()){
                                    echo 
                                    "
                                    <div class=\"col-lg-2\">
                                    </div>

                                    <div class=\"col-lg-1\">
                                        <span>".$row['PostID']."</span>
                                    </div>

                                    <div class=\"col-lg-2\">
                                        <span>".$row['PostTitle']."</span>
                                    </div>

                                    <div class=\"col-lg-4\">
                                        <span>".$row['PostText']."</span>
                                    </div>

                                    <div class=\"col-lg-1\">
                                        <span>".$row['AdminID']."</span>
                                    </div>

                                    <div class=\"col-lg-2\">
                                        <span>".$row['PostDate']."</span>
                                    </div>

                                    <hr>
                                    ";
                                }
                            ?>

                            <?php
                                function delete(){
                                    include('student.php');
                                    $PostID=$_POST['PostID'];
                                    $sql = "DELETE FROM `announcements` WHERE PostID = $PostID";
                                    $result = $conn->query($sql);
                                    echo "<br>Entry deletion confirmed. The page will refresh to update the view";
                                    //Page Refresh for the view to update
                                    echo "<meta http-equiv=\"refresh\" content=\"3\">";
                                }

                                if(array_key_exists('deleteAnnouncement',$_POST)){
                                    delete();
                                }
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