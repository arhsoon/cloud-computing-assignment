<?php

session_start();
include "config/db.php";

if (isset($_POST['studentid']) && isset($_POST['studentpass'])) {

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // /test_input from w3schools form validation

    $studentid = test_input($_POST['studentid']);
    $studentpass = test_input($_POST['studentpass']);
    $role = test_input($_POST['role']);

    if (empty($studentid)) {
        header("Location: ../login.php?error=Student ID is required");
    } else if (empty($studentpass)) {
        header("Location: ../login.php?error=Password is required");
    } else {

        // Hashing the password
        // $studentpass = md5($studentpass);

        $sql = "SELECT * FROM student WHERE studentid = '$studentid' AND studentpass = '$studentpass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            // the username is unique
            $row = mysqli_fetch_assoc($result);
            if ($row['studentpass'] === $studentpass) {
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

                header("Location: ../SRC-home.php");
            } else {
                header("Location: ../ass1.php?error=Incorrect Student ID or Password");
            }
        } else {
            header("Location: ../ass1.php?error=Incorrect Student ID or Password");
        }
    }
} else {
    header("Location: ../SRC-home.php");
}
?>