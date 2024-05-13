<?php
session_start();
include_once 'config/db.php';

if (isset($_POST['submit'])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $start = $_POST["start_date"];
    $end = $_POST["end_date"];
    $price = $_POST["price"];
    $status = $_POST["status"];

    $sql = "INSERT INTO events (title, description, start_date, end_date, price, status) 
          VALUES ('$title', '$description', '$start', '$end', '$price', '$status')";

    if (mysqli_query($conn, $sql)) {
        $last_inserted_id = mysqli_insert_id($conn);
        $_SESSION['success'] = true;
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    if (isset($_SESSION['success'])) {
        echo '<script>alert("Record added successfully");</script>';
        unset($_SESSION['success']);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="shortcut icon" type="x-icon" href="images/logo.jpg">
        <title>SRC</title>
    </head>

    <body>
        <header>
            <?php
            include'indexheader.php'
            ?>
        </header>
        <div class="col-lg-6 m-auto">
            <form method="post">
                <br>
                <div class="card">
                    <div class="card-header bg-primary">
                        <h1 class="text-white text-center">Create New Event</h1>
                    </div>
                    <br>
                    <label>TITLE:</label>
                    <input type="text" name="title" class="form-control"> <br>

                    <label>DESCRIPTION:</label>
                    <input type="text" name="description" class="form-control"> <br>

                    <label>START DATE:</label>
                    <input type="date" name="start_date" class="form-control" value="<?php echo isset($_POST['start_date']) ? $_POST['start_date'] : ''; ?>" required><br>

                    <label>END DATE:</label>
                    <input type="date" name="end_date" class="form-control" value="<?php echo isset($_POST['end_date']) ? $_POST['end_date'] : ''; ?>" required><br>

                    <label>PRICE:</label>
                    <input type="text" name="price" class="form-control"> <br>

                    <label>STATUS:</label>
                    <select name="status" class="form-control">
                        <option value="Upcoming">Upcoming</option>
                        <option value="Ongoing">Ongoing</option>
                        <option value="Completed">Completed</option>
                    </select><br>
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    <a class="btn btn-info" href="index.php">Cancel</a>

            </form>
        </div>
    </div>
</div>
</div>
<?php
include'footer.php'
?>
</body>
</body>
</html>
