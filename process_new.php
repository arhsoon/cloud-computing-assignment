<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
session_start();
$comment = $_POST['comment'];
$reemail = $_POST['reemail'];
$studentemail = $_SESSION['studentemail'];
$title = $_POST['title'];

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    define('DB_HOST', "src-db.chw6wsykej92.us-east-1.rds.amazonaws.com");
    define('DB_USER', "admin");
    define('DB_PASS', "password123");
    define('DB_NAME', "assignment1");

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = mysqli_query($conn, "SELECT msgid FROM msg ORDER BY msgid DESC LIMIT 1");
    $row = mysqli_fetch_assoc($result);
    $msgid = $row['msgid'] + 1;

    $stmt = $conn->prepare("INSERT INTO msg (studentemail, studentemailre, msgtitle, msgcontent, msgid) VALUES (?, ?, ?, ?,?)");
    $stmt->bind_param("sssss", $studentemail, $reemail, $title, $comment, $msgid);
    $stmt->execute();
    $result = $stmt->get_result();
    header("Location: ass4.php");
    exit();
}