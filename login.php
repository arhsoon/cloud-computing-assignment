<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <title>Login</title>
</head>

<body>
    <!-- Login Page -->
    <form action="checklogin.php" method="post">
        <h1>Login</h1>
        <?php if (isset($_GET['error'])) { ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        <br>
        <label for="studentid">Student ID</label>
        <input type="text" name="studentid" id="studentid" placeholder="Enter your student ID">
        <label for="studentpass">Password</label>
        <input type="password" name="studentpass" id="studentpass" placeholder="Enter your password">
        <label for="role">Role</label>
        <select id="role" name="role">
            <option value="student">Student</option>
            <option value="admin">Admin</option>
        </select>
        <input type="submit" value="Login">
    </form>
    <br>
    <a href="adduser.php">Register</a>
    <br>
    <a href="SRC-Home.php">Home</a>
</body>

</html>