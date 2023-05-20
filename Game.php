<?php
session_start();
?>
<?php
    if (!isset($_SESSION["stusernamemarker"])) {
        header("Location: Student_Login.php");
    }
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Educatum Student Archives</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <a href="logoutstudent.php">Logout</a>
    <!--Header-->
    <div class="container header">
        <h1> <img src="./EducataumLogo.png" class="logo">Educatum Archives</h1>
    </div>

    <!--Status Tab-->
    <div class="container statTab">
        <div class="row">
            <div class="col-3">
                <?php
                include_once('student.php');
                $stulogin = $_SESSION["stusernamemarker"];
                //query
                $sql = "SELECT * FROM student WHERE Username ='$stulogin'";
                $result = $conn->query($sql);
                //   prints the information
                while($row = $result->fetch_assoc()) {
                    $xp = $row['XP'];
                    echo "<img src=\"./Avatars/".$row['Class'].".png\" class=\"avatar\">";
                    echo "<label> Learner's Name: ".$row['First_Name']."</label>";
                }
                    ?>
            </div>

            <div class="col-6 stats">
                <label> Learner's Level</label>
                <span id="level"></span>
                <div class="level">
                    <div class="fillLevel" id="fill"></div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-3 col-md-8 col-sm-8 col-12 logout_btn" style="display:inline; float:right;">
        <br>

        <button class="btn btn-dark"><a class="loginRegister" href="./logout.php ">Logout</a></button>

    </div>
    <!--Main Body-->
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="sidebar">
                    <a class="active" href="./Archive.php">Archive</a>
                    <a href="./Assigned_Quest.php">Assigned Quest</a>
                    <a href="./Student_Guilds.php">Guilds</a>
                    <a href="./Student_Training.php">Training</a>
                    <a href="./Achievements.php">Achievements</a>
                </div>
            </div>

            <div class="game col-9">
                <div class="row">
                    <div class="col-6">

                    <?php
                include_once('student.php');
                $stulogin = $_SESSION["stusernamemarker"];
                //query
                $sql = "SELECT * FROM student WHERE Username ='$stulogin'";
                $result = $conn->query($sql);
                //   prints the information
                while($row = $result->fetch_assoc()) {
                    $xp = $row['XP'];
                    echo "<h2> Learner's Name: ".$row['First_Name']."</h2>";
                    echo"
                    <h2 id= score>Score:</h2>
                    <h2 id = power>Power:</h2>";
                    echo "<img src=\"./Avatars/".$row['Class'].".png\" >";
                    
                    
                }
                    ?>

                    </div>
                    <div class="col-6">
                    <h2 id=enemymessage></h2>
                    <h2 id= enemy></h2>
                    <h1 id= enemypower></h1>
                    <img  id = enemypic>
                    <!-- <button onclick=battle()>BATTLE</button> -->
                    </div>    
                </div>
                


                    
                    
                    
            </div>



            <!-- JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
                crossorigin="anonymous"></script>


            <script>
                var xp = '<?php echo $xp;?>';
                console.log(xp);
                var xpCapPerLevel = 100;
                var levelFill = xp % xpCapPerLevel;
                var level = Math.floor(xp / 100 + 1);
                var power = level*200;
                var score=0;
                document.getElementById("fill").style.width = levelFill + "%";
                document.getElementById("level").textContent = Math.floor(xp / 100 + 1);;
                document.getElementById("power").textContent = "Power: " + power;

                function battle(){

                
                var enemies = ["ankylosaurus","bear","bear2","cyclops","dracula","ghost","hydra"] ;
                var enemy = enemies[Math.floor(Math.random() * enemies.length)];
                document.getElementById("enemymessage").textContent = "A wild " + enemy + " has appeared!";
                document.getElementById("enemypic").src = "./Enemy/" + enemy + ".png";
                // $(".enemypic").effect( "shake", {times:4}, 1000 );
                document.getElementById("score").textContent = "Score: " + score;
                var enemypower = 200;
                if(enemy == "bear" || enemy == "bear2"){
                    enemypower = 300+score;
                document.getElementById("enemypower").textContent = "Enemy Power: " + enemypower;
                }
                if(enemy == "cyclops"){
                    enemypower = 400+score;
                document.getElementById("enemypower").textContent = "Enemy Power: " + enemypower;
                }
                if(enemy == "dracula"){
                    enemypower = 500+score;
                document.getElementById("enemypower").textContent = "Enemy Power: " + enemypower;
                }
                if(enemy == "ghost"){
                    enemypower = 600+score;
                document.getElementById("enemypower").textContent = "Enemy Power: " + enemypower;
                }
                if(enemy == "hydra"){
                    enemypower = 700+score;
                document.getElementById("enemypower").textContent = "Enemy Power: " + enemypower;
                }
                if(enemy == "ankylosaurus"){
                    enemypower = 800+score;
                document.getElementById("enemypower").textContent = "Enemy Power: " + enemypower;
                }
                if (power > enemypower){
                    
                    score = score + 1;
                    document.getElementById("enemy").textContent = "You defeated the " + enemy + "!";
                    document.getElementById("score").textContent = "Score: " + score;
                }
                else if (power < enemypower){
                    document.getElementById("enemy").textContent = "You were defeated by the " + enemy;  
                    document.getElementById("enemy").textContent = "Score: " + score;
                }
                else if (power == enemypower){
                    score = score;
                    document.getElementById("score").textContent = "Score: " + score;
                }
                }

                
 
                
                     setInterval(() => {
                     battle();
                 }, 2000);
                

                

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
                    Icons made by <strong><a href="https://www.flaticon.com/authors/maxicons"
                            title="max.icons">max.icons</a></strong> from <strong><a href="https://www.flaticon.com/"
                            title="Flaticon">www.flaticon.com</a></strong>
                </div>
            </div>
        </div>
</body>

</html>