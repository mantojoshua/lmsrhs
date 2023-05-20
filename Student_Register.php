<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Educatum Register (Student)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!--Header-->


    <!--Status Tab-->


    <!--Main Body-->
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="content text-white" style="background-color: #D20000;">
                    <div class="col-md-2">
                        <button style=" background-color: #484848; " class="btn btn-success"> <a class="loginRegister" style="color: white" href="Student_Login.php"> Back </a></button>
                    </div>
                    <div>
                        <div class="registerTitle">
                            <img src="images/student.png" alt="" width="10%">
                            Student Registration Form
                        </div>
                    </div>

                    <div class="registerForm">
                        <center>
                            <form action="Student_Register.php" method="post">

                                <div class="col-md-3 mt-2">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="Last_Name">
                                </div>
                                
                                <div class="col-md-3">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" name="First_Name">
                                </div>

                                <div class="col-md-3 mt-2">
                                    <label>Username </label>
                                    <input class="form-control" type="text" name="Username">
                                </div>

                                <div class="col-md-3 mt-2">
                                    <label>Password </label>
                                    <input class="form-control" type="password" name="passwords">
                                </div>

                                <div class="col-md-3 mt-2">
                                    <label>Confirm Password</label>
                                    <input class="form-control" type="password" name="confirmPassword">
                                </div>

                                <div class="col-md-3 mt-2">
                                    <label>Section</label>


                                    <select class="form-control" name="Section">
                                        <?php

                                        include('student.php');
                                        $Sql = "SELECT * FROM sectiondb";
                                        $result = $conn->query($Sql);
                                        while ($row = $result->fetch_assoc()) {
                                            echo "
                                    <option value=" . $row['section'] . ">" . $row['section'] . "</option>
                                    ";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-md-3 mt-2">
                                    <label for="">Grade Level</label>
                                    <select class="form-control" name="Year_Level" id="Year_Level">
                                        <option value="1">11</option>
                                        <option value="2">12</option>
                                    </select>
                                </div>

                                <div class="form-group col-lg-6 col-12 nameSect">
                                    <label for=""></label>
                                    <select class="form-control" name="Class" id="class" style="display: none;">
                                        <option value="Adventurer" selected>Adventurer</option>
                                        <option value="Alchemist">Alchemist</option>
                                        <option value="Assassin">Assassin</option>
                                        <option value="Barbarian">Barbarian</option>
                                        <option value="Bow">Bow Archer</option>
                                        <option value="Cleric">Cleric</option>
                                        <option value="Druid">Druid</option>
                                        <option value="Explorer">Explorer</option>
                                        <option value="Gunner">Gunner</option>
                                        <option value="Knight">Knight</option>
                                        <option value="Magician">Magician</option>
                                        <option value="Martial Fighter">Martial Fighter</option>
                                        <option value="Monk">Monk</option>
                                        <option value="Ninja">Ninja</option>
                                        <option value="Samurai">Samurai</option>
                                        <option value="Skirmisher">Skirmisher</option>
                                        <option value="Spearman">Spearman</option>
                                        <option value="Swordsman">Swordsman</option>
                                        <option value="Thief">Thief</option>
                                        <option value="Wizard">Wizard</option>
                                    </select>
                                </div>

                                <div class="col-md-3 mt-4">
                                    <button class="btn btn-success form-control" type="submit" name="addStudent">Register</button>
                                </div>


                                <!-- REMINDER
                                    script it so image input is based on class or 
                                    class and image input is merged and inputted through jscript 
                                    And that input doesn't Go over that db elements limits (varchar(30), int(11))
                                -->


                    </div>
                    <?php
                    function addB($First_Name, $Last_Name, $Username, $passwords, $Class, $Section, $Year_Level, $confirmPassword)
                    {
                        include('student.php');
                        if ($First_Name == NULL || $Last_Name == NULL || $Username == NULL || $passwords == NULL || $Class == NULL || $Section == NULL || $Year_Level == NULL || $confirmPassword == NULL) {
                            echo "<br><br>
                                          <div class=\"col-lg-12\">
                                                Register Failed: Some of the fields are missing data. Make sure to enter proper data into all fields.
                                          </div>
                                    ";
                            exit();
                        }

                        if ($confirmPassword != $passwords) {
                            echo "<br><br>
                                    <div class=\"col-lg-12\">
                                        Register Failed: Password entered when confirming did not match. Please try again.
                                    </div>
                                    
                                    ";
                            exit();
                        }

                        $passwords = md5($passwords);
                        $sql = "INSERT INTO student ( First_Name, Last_Name, Username,passwords, Class, Section, Year_Level)
                                VALUES ('$First_Name', '$Last_Name', '$Username','$passwords', '$Class', '$Section', '$Year_Level')";
                        $result = $conn->query($sql);
                        if ($result == TRUE) {
                            $msg = "New record created successfully";
                        } else {
                            $msg = "Error: " . $sql . "<br>" . $conn->error;
                        }
                        $conn->close();
                        return $msg;
                    }
                    if (isset($_POST['addStudent'])) {
                        echo addB($_POST['First_Name'], $_POST['Last_Name'], $_POST['Username'], $_POST['passwords'], $_POST['Class'], $_POST['Section'], $_POST['Year_Level'], $_POST['confirmPassword']);
                    }

                    include('student.php');
                    $sql = "INSERT INTO `achievements` (`studentID`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `a11`, `a12`, `a13`, `a14`, `a15`, `a16`) VALUES (NULL, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');";
                    $result = $conn->query($sql);
                    if ($result == TRUE) {
                        $msg = "New record created successfully";
                    } else {
                        $msg = "Error: " . $sql . "<br>" . $conn->error;
                    }
                    $conn->close();
                    return $msg;
                    ?>
                    </form>
                    </center>

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
    <div class="container footer fixed-bottom position-sticky">

        <div class="attribution row">
            <div class="col-2">
                <span>Educatum LMS 2021</span>
            </div>

            <div class="col-6">

            </div>

            <div class="col-4">
                Icons made by <strong><a href="https://www.flaticon.com/authors/maxicons" title="max.icons">max.icons</a></strong> from <strong><a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></strong>
            </div>
        </div>
    </div>


</body>

</html>