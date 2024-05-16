<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include the database configuration file
include_once 'config/db.php';

// Check if the event ID is provided as a parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve event details from the database
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check the connection
    if ($mysqli->connect_error) {
        die('<div class="alert alert-danger">Database connection failed: ' . $mysqli->connect_error . '</div>');
    }

    $query = "SELECT * FROM events WHERE id = ?";
    $stmt = $mysqli->prepare($query);

    if ($stmt === false) {
        die('<div class="alert alert-danger">Prepare failed: ' . htmlspecialchars($mysqli->error) . '</div>');
    }

    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $event = $result->fetch_assoc();

        // Check if the form is submitted
        if (isset($_POST['submit'])) {
            // Retrieve form data
            $title = $_POST['title'];
            $description = $_POST['description'];
            $start = $_POST['start'];
            $end = $_POST['end'];
            $price = $_POST['price'];
            $status = $_POST['status'];

            // Update event details in the database
            $query = "UPDATE events SET title = ?, description = ?, start = ?, end = ?, price = ?, status = ? WHERE id = ?";
            $stmt = $mysqli->prepare($query);

            if ($stmt === false) {
                die('<div class="alert alert-danger">Prepare failed: ' . htmlspecialchars($mysqli->error) . '</div>');
            }

            $stmt->bind_param('ssssdsi', $title, $description, $start, $end, $price, $status, $id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                // Redirect to the events list page on success
                header('Location: index.php');
                exit;
            } else {
                // Display an error message on failure
                echo '<div class="alert alert-danger">Failed to update event details.</div>';
            }
        }

        // Format start and end dates for datetime-local input
        $start= date('Y-m-d\TH:i', strtotime($event['start']));
        $end = date('Y-m-d\TH:i', strtotime($event['end']));
    } else {
        // Display an error message if event is not found
        echo '<div class="alert alert-danger">Event not found.</div>';
        exit;
    }
} else {
    // Display an error message if event ID is not provided
    echo '<div class="alert alert-danger">Event ID not provided.</div>';
    exit;
}

include 'indexheader.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Event Details</title>
    <link href="../nicepage.css" rel="stylesheet" type="text/css"/>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Event Details</h2>
                <hr>
                <!-- Display the event details form -->
                <form method="post" action="">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($event['id']); ?>">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($event['title']); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($event['description']); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="start">Start Date and Time</label>
                        <input type="datetime-local" class="form-control" id="start" name="start" value="<?php echo htmlspecialchars($start); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="end">End Date and Time</label>
                        <input type="datetime-local" class="form-control" id="end" name="end" value="<?php echo htmlspecialchars($end); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($event['price']); ?>">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="scheduled" <?php if ($event['status'] == 'scheduled') echo 'selected'; ?>>Scheduled</option>
                            <option value="cancelled" <?php if ($event['status'] == 'cancelled') echo 'selected'; ?>>Cancelled</option>
                            <option value="postponed" <?php if ($event['status'] == 'postponed') echo 'selected'; ?>>Postponed</option>
                            <option value="completed" <?php if ($event['status'] == 'completed') echo 'selected'; ?>>Completed</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    <a class="btn btn-info" href="index.php">Cancel</a>
                    <a class="btn btn-info" href="index.php">Back</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>