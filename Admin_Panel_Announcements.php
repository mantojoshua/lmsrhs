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
                <h2 class="tabTitle">Announcement Management</h2>
                    <div class="content">
                        <div class="row">

                            <div class="col-lg-4">
                                <a href="./Admin_Panel_Announcements_Create.php" >
                                    <div class="course">
                                        <div class="courseheader">
                                            <strong><span id="ctitle">Create Announcement</span></strong> <br>
                                        </div>
                                        <div class="enrollbox">
                                            <img class="imgFit" src="./General_Use_Asset/CreateAnnouncement.png"><br>
                                            <a href="https://www.flaticon.com/free-icons/mail" title="mail icons">Mail icons created by Freepik - Flaticon</a>   
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-4">
                                <a href="./Admin_Panel_Announcements_View.php" >
                                    <div class="course">
                                        <div class="courseheader">
                                            <strong><span id="ctitle">View Announcements</span></strong> <br>
                                        </div>
                                        <div class="enrollbox">
                                        <img class="imgFit" src="./General_Use_Asset/ViewAnnouncement.png"><br>
                                        <a href="https://www.flaticon.com/free-icons/search" title="search icons">Search icons created by Freepik - Flaticon</a>   
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-4">
                                <a href="./Admin_Panel_Announcements_Delete.php" >
                                    <div class="course">
                                        <div class="courseheader">
                                            <strong><span id="ctitle">Delete Announcement</span></strong> <br>
                                        </div>
                                        <div class="enrollbox">
                                            <img class="imgFit" src="./General_Use_Asset/DeleteAnnouncement.png"><br>
                                            <a href="https://www.flaticon.com/free-icons/delete" title="delete icons">Delete icons created by Freepik - Flaticon</a>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-4"></div>

                            <div class="col-lg-4">
                                <a href="./Admin_Panel_Announcements_Update.php" >
                                    <div class="course">
                                        <div class="courseheader">
                                            <strong><span id="ctitle">Edit Announcement</span></strong> <br>
                                        </div>
                                        <div class="enrollbox">
                                            <img class="imgFit" src="./General_Use_Asset/EditAnnouncement.png"><br>
                                            <a href="https://www.flaticon.com/free-icons/edit" title="edit icons">Edit icons created by Freepik - Flaticon</a>                                        </div>
                                    </div>
                                </a>
                            </div>

                            <a href="./Admin_Panel.php"><button class="btn btn-primary">Main Menu</button></a>
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