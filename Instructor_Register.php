<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Educatum Register (Instructor)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>

<body style="background-color: #e8dfdf;">
    <!--Header-->


    <!--Status Tab-->


    <!--Main Body-->
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="content" style="background-color: #FFB0B0;">
                    <div class="col-md-2">
                        <button style=" background-color: #484848; " class="btn btn-success"> <a class="loginRegister" style="color: white" href="Instructor_Login.php"> Back
                            </a></button>
                    </div>
                    <div>
                        <div class="registerTitle">
                            <img src="images/teacher.png" alt="" width="10%">
                            Teacher Registration Form
                        </div>
                    </div>
                    <div class="registerForm ">
                        <center>
                            <form action="Instructor_Register.php" method="post">

                                <div class="col-md-3">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" name="First_Name" id="fname">
                                </div>

                                <div class="col-md-3 mt-2">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="Last_Name" id="lname">
                                </div>

                                <div class="col-md-3 mt-2">
                                    <label>Username</label>
                                    <input class="form-control" type="text" name="Username" id="uname">
                                </div>

                                <div class="col-md-3 mt-2">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="passwordi" id="password">
                                </div>

                                <div class="col-md-3 mt-2">
                                    <label>Confirm Password</label>
                                    <input class="form-control" type="password" name="confirmPassword" id="confirmPassword">
                                </div>

                                <!-- REMINDER
                                    script it so image input is based on class or 
                                    class and image input is merged and inputted through jscript 
                                    And that input doesn't Go over that db elements limits (varchar(30), int(11))
                                -->
                                <div class="col-md-3 mt-4">
                                    <input type="submit" value="Register" name="addInstructor" class="form-control btn-success">
                                    <!-- <input class="registerButton form-control" type="submit" name="addInstructor"> -->
                                </div>

                            </form>
                        </center>
                        <?php
                        function addB($First_Name, $Last_Name, $Username, $passwordi, $confirmPassword)
                        {
                            if ($First_Name == NULL || $Last_Name == NULL || $Username == NULL || $passwordi == NULL || $confirmPassword == null) {
                                echo "<br><br>
                                          <div class=\"col-lg-12\">
                                                Register Failed: Some of the fields are missing data. Make sure to enter proper data into all fields.
                                          </div>
                                    ";
                                exit();
                            }

                            if ($confirmPassword != $passwordi) {
                                echo "<br><br>
                                <div class=\"col-lg-12\">
                                    Register Failed: Password entered when confirming did not match. Please try again.
                                </div>
                                
                                ";
                                exit();
                            }



                            include('student.php');
                            $passwordi = md5($passwordi);
                            $sql = "INSERT INTO instructor ( First_Name, Last_Name, Username, passwordi)
                                VALUES ('$First_Name', '$Last_Name', '$Username','$passwordi')";
                            $result = $conn->query($sql);
                            if ($result == TRUE) {
                                $msg = "New record created successfully";
                            } else {
                                $msg = "Error: " . $sql . "<br>" . $conn->error;
                            }
                            $conn->close();
                            return $msg;
                        }
                        if (isset($_POST['addInstructor'])) {
                            echo addB($_POST['First_Name'], $_POST['Last_Name'], $_POST['Username'], $_POST['passwordi'], $_POST['confirmPassword']);
                        }
                        ?>
                        <br>

                    </div>


                </div>



            </div>

        </div>

    </div>





    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        var iconSelect;

        window.onload = function() {

            iconSelect = new IconSelect("class");

            var icons = [];
            icons.push({
                'iconFilePath': 'avatar/Adventurer.png',
                'iconValue': 'Adventurer'
            });
            icons.push({
                'iconFilePath': 'avatar/Alchemist.png',
                'iconValue': 'Alchemist'
            });
            icons.push({
                'iconFilePath': 'avatar/Assassin.png',
                'iconValue': 'Assassin'
            });

            iconSelect.refresh(icons);

        };
    </script>
    </div>



</body>

</html>