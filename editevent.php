<?php
// Check if the form is submitted
include_once 'config/db.php';

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if the event ID is provided as a parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve event details from the database
    $mysqli = new mysqli('localhost', 'root', '', 'assignment1');
    $query = "SELECT * FROM events WHERE id = ?";
    $stmt = $mysqli->prepare($query);
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
            $query = "UPDATE events SET title = ?, description = ?, start_date = ?, end_date = ?, price = ?, status = ? WHERE id = ?";
            $stmt = $mysqli->prepare($query);
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

include 'indexheader.php'
?>

<!DOCTYPE html>
<html>
    <head>
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
                        <input type="hidden" name="id" value="<?php echo $event['id']; ?>">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $event['title']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description"><?php echo $event['description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="start">Start Date and Time</label>
                            <?php
                            if (isset($event['start']) && !empty($event['start'])) {
                                $start_date = date('Y-m-d\TH:i:s', strtotime($event['start']));
                            } else {
                                // Set a default start date or handle the case where $event['start'] is null/empty
                                $start_date = date('Y-m-d\TH:i:s');
                            }
                            ?>
                            <input type="datetime-local" class="form-control" id="start" name="start" value="<?php echo $start_date; ?>" required>

                        </div>
                        <div class="form-group">
                            <label for="end">End Date and Time</label>
                            <?php
                            if (isset($event['end']) && !empty($event['end'])) {
                                $end_date = date('Y-m-d\TH:i:s', strtotime($event['end']));
                            } else {
                                // Set a default end date or handle the case where $event['end'] is null/empty
                                $end_date = date('Y-m-d\TH:i:s');
                            }
                            ?>
                            <input type="datetime-local" class="form-control" id="end" name="end" value="<?php echo $end_date; ?>" required>

                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="<?php echo $event['price']; ?>">
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