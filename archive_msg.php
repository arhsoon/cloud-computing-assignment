<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

// Get the ID of the item to archive from the POST data
$msgid = $_GET['msgid'];

// Connect to the database (assuming variables $db_host, $db_user, $db_pass, and $db_name are defined)
define('DB_HOST', "assignment-db.c3862usea78f.us-east-1.rds.amazonaws.com");
define('DB_USER', "admin");
define('DB_PASS', "password123");
define('DB_NAME', "assignment1");

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Execute the SQL query to archive the item
$stmt = $conn->prepare("UPDATE msg SET status = 'archive' WHERE msgid = ?");
    $stmt->bind_param("s", $msgid);
    $stmt->execute();
    $result = $stmt->get_result();

// Close the database connection
mysqli_close($conn);
header("Location: ass6.php");
        exit();

