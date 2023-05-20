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
                <div class="col-6" style="
                          padding-left: 0px;
                          padding-right: 0px;">
                    <a href="./Instructor_Login.php">
                        <div class=" InstructorLogin" style="background-color: #FFB0B0;">
                            <img class="loginIMG" src="images/teacher.png" alt="">
                            <br>
                            <Span style="color:white; font-weight: bold; font-size:large;">Teacher Login</Span>
                        </div>
                    </a>
                </div>
                <div class="col-6" style="
                             padding-left: 0px;
                             padding-right: 0px;">
                    <a href="./Student_Login.php">
                        <div class="StudentLogin" style="background-color: #D20000;">
                            <img class="loginIMG" src="images/student.png" alt="">
                            <br>
                            <Span style="color:white; font-weight: bold; font-size:large;">Student Login</Span>
                        </div>
                    </a>
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
        </div>
    </body>
    <script>
        document.addEventListener("contextmenu", function(event) {
    event.preventDefault();
    alert("This is disabled for security reasons.")
});

    </script>
    </html>