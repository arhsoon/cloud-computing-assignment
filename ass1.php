
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<!doctype html>
<html lang="en">

    <head>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <title>Please Login</title>
    </head>

    <?php
    include_once 'header.php';
    ?>



    <body>

        <div class="position-absolute top-50 start-50 translate-middle">
            <h1>Welcome Back!</h1>
            <form action="checklogin.php" method="post">
              
                <div class="mb-1">
                    <label for="studentid" class="form-label">Student ID</label>
                    <input type="text"  name="studentid" class="form-control" id="studentid" aria-describedby="emailHelp" value="<?php if (isset($_SESSION['studentid'])) {
                    echo $_SESSION['studentid'];
                } ?>">
                </div>
                <div class="mb-3">
                    <label for="studentpass" class="form-label">Password</label>
                    <input type="password" name="studentpass" class="form-control" id="studentpass">
                </div>




                <div>
                    <button type="submit" value="Login" class="btn mb-1" style="background-color: #b8e0ff;">Submit</button>
                    <a href="ass2.php" class=" btn mb-1" style="background-color: #d3d3d3">Reset Password</a>
                    <a href="ass3.php" class="btn-warning btn mb-1 ">Sign Up</a>
                </div>
            </form>
                <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        </div>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    </body>


</html>
