<?php
include 'config/db.php';

$enteredEmail = $_POST['studentemail'];

// Query the database to check if the entered email already exists
$sql = "SELECT * FROM student WHERE studentemail = '$enteredEmail'";
$result = mysqli_query($conn, $sql);

if ($result) {
    $numRows = mysqli_num_rows($result);

    if ($numRows > 0) {
        // Email already exists
        echo "Email already taken";
    } else {
        // Email is available
        echo "Email available";
    }
} else {
    // Error occurred during the database query
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>