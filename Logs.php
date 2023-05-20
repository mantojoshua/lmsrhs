<?php
session_start();
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Admin Database Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
                <h2 class="tabTitle">User Activity Log</h2>
                <div class="content">
                    <div class="row">

                        <div class="col-lg-12">
                            <a href="./Admin_Panel.php"><button class="btn btn-primary">Main Menu</button></a> <br> <br>
                        </div>

                        <?php
                        include_once('student.php');
                        $sql = "SELECT * FROM user_log";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {

                            echo "
                            <table class='table table-striped border'>
                                <tr>
                                    <th>User</th>
                                    <th>Action</th>
                                    <th>Timestamp</th>
                                </tr>
                            ";
                          while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td>".$row["username"]."</td>";
                                echo "<td>".$row["userAction"]."</td>";
                                echo "<td>".$row["userTimestamp"]."</td>";
                            echo "</tr>";
                        }
                        } else {
                          echo "0 results";
                        }
                        echo "</table>";
                      
                        ?>

                    </div>
                </div>

            </div>
        </div>
    </div>




    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>



    <div class="container footer fixed-bottom position-sticky">

        <div class="attribution row">
            <div class="col-lg-2">
                <span>Educatum LMS 2021</span>
            </div>

            <div class="col-lg-6">

            </div>

            <div class="col-lg-4">
                Icons made by <strong><a href="https://www.flaticon.com/authors/maxicons"
                        title="max.icons">max.icons</a></strong> from <strong><a href="https://www.flaticon.com/"
                        title="Flaticon">www.flaticon.com</a></strong>
            </div>
        </div>
    </div>
</body>

</html>