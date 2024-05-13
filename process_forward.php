<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
session_start();
$studentemail = $_SESSION['studentemail'];
$msgid = $_POST['msgid'];
$femail = $_POST['reemail'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    define('DB_HOST', "localhost");
    define('DB_USER', "root");
    define('DB_PASS', "");
    define('DB_NAME', "assignment1");

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = mysqli_query($conn, "SELECT msgtitle, msgcontent FROM msg WHERE msgid = '$msgid'");
    $row = mysqli_fetch_assoc($result);
    $title = $row['msgtitle'];
    $content = $row['msgcontent'];
    
    $result = mysqli_query($conn, "SELECT msgid FROM msg ORDER BY msgid DESC LIMIT 1");
    $row = mysqli_fetch_assoc($result);
    $msgid = $row['msgid'] + 1;

    $stmt = $conn->prepare("INSERT INTO msg (studentemail, studentemailre, msgtitle, msgcontent, msgid) VALUES (?,?, ?, ?, ?)");
    $stmt->bind_param("sssss",$studentemail, $femail, $title, $content, $msgid);
    $stmt->execute();
    $result = $stmt->get_result();
    header("Location: ass4.php");
    exit();
}