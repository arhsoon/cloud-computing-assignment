

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <title>Reset Password</title>
    </head>

<!-- <style>
  a:visited {
    text-decoration: none;
  }

  a {
    color: hotpink;
  }
</style> -->


    <body>

        <?php
        include_once 'header.php';
        ?>
        <?php
        $error = isset($_GET['error']);

        if (isset($_SESSION['error'])) {
            $error = $_SESSION['error'];
            unset($_SESSION['error']);
        }
        ?>





        <div class="position-absolute top-50 start-50 translate-middle" style="width:301px;">
            <h3>Reset Password</h3>
            <form action="process_reset.php" method="POST">
                <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php if (isset($_SESSION['email'])) {
            echo $_SESSION['email'];
        } ?>">
                </div>
                <div class="mb-1">
                    <label for="exampleInputPassword1" class="form-label">New Password</label>
                    <input name="password1" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword2" class="form-label">Retype Password</label>
                    <input name="password2" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail2" class="form-label">Student ID</label>
                    <input name="studentid" type="text" class="form-control" id="exampleInputEmail2">
                </div>
                <div>
                    <button type="submit" style="background-color: #b8e0ff;" class="btn mb-1">Submit</button>
                    <a href="ass1.php" class=" btn mb-1" style="background-color: #d3d3d3;">Back</a>
                </div>
            </form>

                <?php if (!empty($error)): ?>
                <div class="alert alert-danger mb-1 mt-2" role="alert">
                <?php echo $error; ?>
                </div>
<?php endif; ?>

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
