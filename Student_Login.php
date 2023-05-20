<?php
ob_start();
session_start();
?>
<DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <title>Educatum Student Archives</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 InstructorLogin text-white" style="background-color: #FFB0B0;">
                    <div class="d-flex justify-content-center">
                        <form class="loginForm" action="Student_Login.php" method="post">
                            <label class="formLabel">Username</label>
                            <br>
                            <input type="text" style="border-radius: 10px;" name="stuname" placeholder="Username">
                            <br>
                            <br>
                            <label class="formLabel">Password</label>
                            <br>
                            <input type="password" style="border-radius: 10px;" name="passwords" required placeholder="Password">
                            <br>
                            <br>
                            <br>
                            <button class="btn btn-success" name="stulog">Login</button>
                            <!-- <button class="btn btn-success"> <a class="loginRegister"
                                    href="./Student_Register.php">Register
                                </a></button> -->
                            <?php
                        if(isset($_POST['stulog'])){
                            include_once('student.php');
                            $stusrname = $_POST['stuname'];
                            $stpasswords = $_POST['passwords'];
                            $stpasswords = md5($stpasswords);
                            $value = mysqli_query($conn,"SELECT Username FROM student WHERE BINARY Username ='$stusrname' && passwords ='$stpasswords'");
                            $num_rows = mysqli_num_rows($value);
                            if($num_rows > 0){
                                $sql = "INSERT INTO user_log (username, userAction,userTimestamp)
                                VALUES ('$stusrname', 'logged in',now())";
                                $result = $conn->query($sql);
                                $_SESSION["stusernamemarker"] = $stusrname;
                                header("Location: Archive.php");
                            }else{
                                echo "<br>";
                                echo "Wrong email/password";
                            }
                        }
                        ?>
                        </form>
                    </div>
                </div>

                <div class="col-md-6 StudentLogin" style="background-color: #D20000;">
                    <img class="loginIMG" src="images/student.png" alt="">
                    <br>
                    <Span style="color:white; font-weight: bold; font-size:large;">Student Login</Span>
                </div>

                <table class="col-md-6">
                    <tr>
                        <td>
                            <img class="float-end" src="images/book1.png" width="100%" alt="">
                        </td>
                    </tr>
                </table>
                <table class="col-md-6">
                    <tr>
                        <td>
                            <img class="float-start" src="images/book2.png" width="100%" alt="">
                        </td>

                    </tr>
                </table>

            </div>
    </body>

    </html>