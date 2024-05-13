<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
session_start();
$comment = $_POST['comment'];
$msgtitle = $_POST['msgtitle'];
$msgcontent = $_POST['msgcontent'];
$msgid = $_POST['msgid'];
$studentemail = $_SESSION['studentemail'];

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    define('DB_HOST', "localhost");
    define('DB_USER', "root");
    define('DB_PASS', "");
    define('DB_NAME', "assignment1");

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $stmt = $conn->prepare("UPDATE msg SET msgcontent = ? WHERE msgid = ?");
    $msgcontent .= '<br> Re: ' . $studentemail . '<br>' . $comment;
    $stmt->bind_param("ss", $msgcontent, $msgid);
    $stmt->execute();
    $result = $stmt->get_result();
    header("Location: ass4.php");
    exit();
}