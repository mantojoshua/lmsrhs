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
                <h2 class="tabTitle">Admin Login Form</h2>
                    <div class="content">
                        <div class="registerForm ">
                            <form class="row" action="" method="post">

                                <div class="col-lg-3">
                                </div>

                                <div class="form-group col-lg-6 col-12 nameSect">
                                    <label>Username: </label>
                                    <input class="form-control" type="text" name="Username">
                                </div>

                                <div class="col-lg-12">
                                    <br>
                                </div>
                                
                                <div class="col-lg-3">
                                </div>

                                <div class="form-group col-lg-6 col-12 nameSect">
                                    <label>Password: </label>
                                    <input class="form-control" type="password" name="AdminPassword">
                                </div>

                                <div class="col-lg-12">
                                    <br>
                                </div>

                                <div class="col-lg-3">
                                </div>

                                <button class="btn btn-dark col-lg-6" name ="adminlog">Login</button>

                                    <?php
                                        if(isset($_POST['adminlog'])){
                                        include_once('student.php');
                                        $AdminUsername = $_POST['Username'];
                                        $AdminPassword = $_POST['AdminPassword'];
                                        $value = mysqli_query($conn,"SELECT Username FROM schooladmin WHERE Username ='$AdminUsername'&& AdminPassword = '$AdminPassword'");
                                        $num_rows = mysqli_num_rows($value);
                                        if($num_rows > 0){
                                                                                        $sql = "INSERT INTO user_log (username, userAction,userTimestamp)
                                            VALUES ('Admin', 'logged in',now())";
                                            $result = $conn->query($sql);
                                            $_SESSION["adminMarker"] = $AdminUsername;
                                            header("Location: Admin_Panel.php");
                                        }else{
                                            echo "<br>";
                                            echo "Wrong email/password";
                                        }
                                    }
                                    ?>
                            </form>
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