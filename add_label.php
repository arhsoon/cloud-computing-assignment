<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
session_start();
$label = $_POST['addlabel'];
$studentemail = $_SESSION['studentemail'];

if (isset($_COOKIE['studentemail'])) {
    $studentemail = $_COOKIE['studentemail'];
    echo "The value of myCookie is: " . $studentemail;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    define('DB_HOST', "localhost");
    define('DB_USER', "root");
    define('DB_PASS', "");
    define('DB_NAME', "assignment1");

    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $tlabel = trim($label);
    if ($tlabel === '') {
        echo "Empty";
        header("Location: ass4.php");
        exit();
    } else {

        $stmt = $conn->prepare("INSERT INTO label (label, studentemail) VALUES (?, ?)");
        $stmt->bind_param("ss", $tlabel, $studentemail);
        $stmt->execute();
        $result = $stmt->get_result();
        header("Location: ass4.php");
        exit();
    }
}

