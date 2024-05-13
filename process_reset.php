<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$studentemail = $_POST['email'];
$studentpassword = $_POST['password1'];
$passwordtwo = $_POST['password2'];
$studentid = $_POST['studentid'];

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['email']) || empty($_POST['password1']) || empty($_POST['password2']) || empty($_POST['studentid'])) {
        $error = "Please fill in the field";
    } else {
        define('DB_HOST', "localhost");
        define('DB_USER', "root");
        define('DB_PASS', "");
        define('DB_NAME', "assignment1");

        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT * FROM student WHERE studentemail = ?");
        $stmt->bind_param("s", $studentemail);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($studentid == $row['studentid']) {
                // correct id
                if ($studentpassword == $passwordtwo) {
                    // Validate password
                    if (strlen($studentpassword) < 8 || !preg_match("/[A-Z]/", $studentpassword) || !preg_match("/[0-9]/", $studentpassword)) {
                        $error = "Password must be at least 8 characters long and contain at least one capital letter and one number";
                    } else {
                        // Password is valid and matches, proceed with updating database
                        $stmt = $conn->prepare("UPDATE student SET studentpass = ? WHERE studentemail = ?");
                        $stmt->bind_param("ss", $studentpassword, $studentemail);
                        $stmt->execute();
                    }
                } else {
                    // Passwords do not match
                    $error = "Passwords do not match";
                }
            } else {
                // Student ID is incorrect
                $error = "Wrong student ID";
            }
        } else {
            // Email not found
            $error = "Email not found";
        }

        $stmt->close();
        $conn->close();
    }

    if (!empty($error)) {
        session_start();
        $_SESSION['error'] = $error;
        if (isset($_SESSION['email'])) {
            $_SESSION['email'] = $studentemail;
        }
        if (isset($_POST['email'])) {
            $_SESSION['email'] = $_POST['email'];
        }
        header("Location: ass2.php");
        exit();
    } else {
        // successful login, redirect to home page or wherever you want to go
        header("Location: ass1.php");
        exit();
    }
}