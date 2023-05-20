<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Admin Panel Announcement View</title>
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
                <h2 class="tabTitle">Announcement View</h2>
                    <div class="content">
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="./Admin_Panel_Announcements.php"><button class="btn btn-primary">Back</button></a>
                            </div>

                            <div class="col-lg-2">

                            </div>

                            <div class="col-lg-10">
                                <strong>Update Form</strong>
                            </div>

                            <div class="col-lg-12">
                                <form class="row" action="Admin_Panel_Announcements_Update.php" method="post">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-1">
                                        <label>PostID</label><br>
                                        <select type="text" name="PostID">
                                            <?php
                                                include_once('student.php');
                                                $sql = "SELECT PostID FROM announcements";
                                                $result = $conn->query($sql);
                                                while($row = $result->fetch_assoc()){
                                                    echo
                                                    "
                                                    <option value=\"".$row['PostID']."\">".$row['PostID']."<option>
                                                    ";
                                                }

                                            ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-lg-2">
                                        <label>Post Title</label><br>
                                        <input type="text" name="PostTitle">
                                    </div>

                                    <div class="col-lg-2">
                                        <label>Post Text</label><br>
                                        <input type="text" name="PostText">
                                    </div>

                                    <div class="col-lg-2">
                                        <label>AdminID</label><br>
                                        <input type="text" name="AdminID">
                                    </div>

                                    <div class="col-lg-2">
                                        <label>Post Date</label><br>
                                        <input type="date" name="PostDate">
                                    </div>
                                    
                                    <div class="col-lg-1">
                                        <br><input type="submit" class="btn btn-warning" name="updateAnnouncement" value="Update"><br><br>
                                    </div>

                                    
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
                                function update(){
                                    include('student.php');
                                    //Gets the input from the forms and store them in a local variable
                                    $PostID=$_POST['PostID'];
                                    $PostTitle=$_POST['PostTitle'];
                                    $PostText=$_POST['PostText'];
                                    $AdminID=$_POST['AdminID'];
                                    $PostDate=$_POST['PostDate'];


                                    $sql = "SELECT * FROM announcements WHERE PostID = '$PostID'";
                                    $result = $conn->query($sql);
                                    // This will keep the original data of the entry if the relevant fields is left blank
                                    while($row = $result->fetch_assoc()){
                                        if($PostTitle == NULL){
                                            $PostTitle = $row['PostTitle'];
                                        }

                                        if($PostText == NULL){
                                            $PostText = $row['PostText'];
                                        }

                                        if($AdminID == NULL){
                                            $AdminID = $row['AdminID'];
                                        }

                                        if($PostDate == NULL){
                                            $PostDate = $row['PostDate'];
                                        }

                                    }
                                   

                                    $sql = "UPDATE `announcements` SET `PostTitle`='$PostTitle',`PostText`='$PostText',`AdminID`='$AdminID',`PostDate`='$PostDate' WHERE PostID = '$PostID'";
                                    $result = $conn->query($sql);
                                    echo "<br>Entry Update confirmed. The page will refresh to update the view";
                                    //Page Refresh for the view to update
                                    echo "<meta http-equiv=\"refresh\" content=\"3\">";
                                }

                                if(array_key_exists('updateAnnouncement',$_POST)){
                                    update();
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