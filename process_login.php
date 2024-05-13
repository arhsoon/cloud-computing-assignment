<?php
session_start();
/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

$studentemail = $_POST['email'];
$studentpassword = $_POST['password'];

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Please enter email and password";
    } else {

        define('DB_HOST', "assignment-db.c3862usea78f.us-east-1.rds.amazonaws.com");
        define('DB_USER', "admin");
        define('DB_PASS', "password123");
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
            if ($studentpassword == $row['studentpass']) {
                // correct
            } else {
                // incorrect
                $error = "Incorrect password";
            }
        } else {
            $error = "Email not found";
        }

        
    }

    if (!empty($error)) {
        session_start();
        $_SESSION['error'] = $error;
        if (isset($_POST['email'])) {
            $_SESSION['email'] = $_POST['email'];
        }
        header("Location: ass1.php");
        exit();
    } else {
        // successful login, redirect to home page or wherever you want to go
         $stmt = $conn->prepare("SELECT * FROM student WHERE studentemail = '$studentemail' AND studentpass = '$studentpassword'");
        $stmt->execute();
        $result = $stmt->get_result();

        if (mysqli_num_rows($result) === 1) {
            // the username is unique
            $row = mysqli_fetch_assoc($result);
            if ($row['studentpass'] === $studentpassword) {
                $_SESSION['studentid'] = $row['studentid'];
                $_SESSION['studentname'] = $row['studentname'];
                $_SESSION['studentemail'] = $row['studentemail'];
                $_SESSION['studentpass'] = $row['studentpass'];
                $_SESSION['studentgender'] = $row['studentgender'];
                $_SESSION['studentcourse'] = $row['studentcourse'];
                $_SESSION['studentyear'] = $row['studentyear'];
                $_SESSION['studentsem'] = $row['studentsem'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['sposition'] = $row['sposition'];

                header("Location: SRC-Home.php");
                
            }
        }
    }
}