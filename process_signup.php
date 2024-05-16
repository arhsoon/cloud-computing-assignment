<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */
define('DB_HOST', "src-db.chw6wsykej92.us-east-1.rds.amazonaws.com");
define('DB_USER', "admin");
define('DB_PASS', "password123");
define('DB_NAME', "assignment1");

$studentid = $_POST['studentid'];
$studentname1 = $_POST['studentname1'];
$studentname2 = $_POST['studentname2'];
$studentemail = $_POST['studentemail'];
$studentpassword1 = $_POST['studentpassword1'];
$studentpassword2 = $_POST['studentpassword2'];
$studentnumber1 = $_POST['studentnumber1'];
$studentnumber2 = $_POST['studentnumber2'];
$studentusername = $_POST['studentusername'];
$error = array();

function checkusername($studentusername) {
    if ($studentusername == NULL) {
        $error[] = "Username cannot be empty";
    } else if (strlen($studentusername) >= 20) {
        $error[] = "Username is too long";
    } else if (!preg_match('/^[a-zA-Z0-9]+$/', $studentusername)) {
        $error[] = "Username can only contain letters and numbers";
    } else if (checkexistingstudentusername($studentusername)) {
        checkexistingstudentusername($studentusername);
    }
}

function checkexistingstudentusername($studentusername) {
    $exist = false;
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $sql = "SELECT studentusername FROM student";
    if ($result = mysqli_query($connection, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if ($row['studentusername'] == $studentusername) {
                    $exist = true;
                }
            }
        }
    }
    $connection->close();
    $result->close();
    return $exist;
}

function checkstudentid($studentid) {
    if ($studentid == NULL) {
         $error[] = "Student ID cannot be empty";
    } else if (strlen($studentid) != 10) {
         $error[] = "Student ID must be 10 digits";
    } else if (!preg_match("/^[0-9]{2}[A-Z]{3}\d{5}$/", $studentid)) {
         $error[] = "Student ID must contain letters in between (E.g. 22PMD02000)";
    } else if (checkexistingstudentid($studentid)) {
        checkexistingstudentid($studentid);
         $error[] = "ID already registered";
    }
}

function checkexistingstudentid($studentid) {
    $exist = false;
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $sql = "SELECT studentid FROM student";
    if ($result = mysqli_query($connection, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if ($row['studentid'] == $studentid) {
                    $exist = true;
                }
            }
        }
    }
    $connection->close();
    $result->close();
    return $exist;
}

$studentname = $studentname1 . '' . $studentname2;

function checkstudentname($studentname) {
    if ($studentname == null) {
         $error[] = "Student name cannot be empty";
    } else if (strlen($studentname) > 40) {
         $error[] = "Student name must be less than 40 characters";
    } else if (!preg_match("/^[a-zA-Z ]*$/", $studentname)) {
         $error[] = "Student name must only contain letters";
    }
}

function checkstudentemail($studentemail) {
    if ($studentemail == NULL) {
         $error[] = "Student email cannot be empty";
    } else if (strlen($studentemail) > 40) {
         $error[] = "Student email must be less than 40 characters";
    } else if (!filter_var($studentemail, FILTER_VALIDATE_EMAIL)) {
         $error[] = "Invalid email format";
    } else if (checkexistingstudentemail($studentemail)) {
        checkexistingstudentemail($studentemail);
         $error[] = "Email already registered";
    }
}

function checkexistingstudentemail($studentemail) {
    $exist = false;
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $sql = "SELECT studentemail FROM student";
    if ($result = mysqli_query($connection, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                if ($row['studentemail'] == $studentemail) {
                    $exist = true;
                }
            }
        }
    }
    $connection->close();
    $result->close();
    return $exist;
}

function checkstudentpass($studentpassword, $studentpassword1) {
    if (passwordsMatch($_POST['studentpassword1'], $_POST['studentpassword2'])) {
// passwords match, proceed with updating database
        $studentpassword = $studentpassword1;

        if ($studentpassword == NULL) {
             $error[] = "Student password cannot be empty";
        } else if (strlen($studentpassword) > 16) {
             $error[] = "Student password must be less than 16 characters";
        } else if (!preg_match("/^[a-zA-Z0-9]*$/", $studentpassword)) {
             $error[] = "Student password must only contain letters and numbers";
        }
    } else {
// passwords do not match, display error message
         $error[] = "Password doesn't match";
    }
}

function checkstudentnumber($studentnumber1, $studentnumber2) {
    if (substr($studentnumber1, 0, 3) !== '601') {
         $error[] = 'Student phone number must start with 601';
    } else if (strlen($studentnumber2) < 8 || strlen($studentnumber2) > 9) {
         $error[] = "Student phone number must be 11 or 12 digits";
    } else {
        $studentnumber = $studentnumber1 . '' . $studentnumber2;
         $error[] = $studentnumber;
    }
}

function checkstudentgender($studentgender) {
    if ($studentgender == NULL) {
         $error[] = "Enter your gender";
    } else if (!array_key_exists($studentgender, getgender())) {
         $error[] = "invalid gender";
    }
}

function checkstudentcourse($studentcourse) {
    if ($studentcourse == NULL) {
         $error[] = "Enter your course";
    } else if (!array_key_exists($studentcourse, getcourse())) {
         $error[] = "invalid course";
    }
}

function getgender() {
    return array(
        "M" => "Male",
        "F" => "Female",
    );
}

function getcourse() {
    return array(
        "DCS" => "Diploma in Computer Science",
        "DIT" => "Diploma in Information Technology",
        "DIS" => "Diploma in Information System",
        "RSE" => "Degree in Software Engineering",
        "RIT" => "Degree in Information Technology",
        "RIS" => "Degree in Information Security",
        "RCS" => "Degree in Computer Science",
        "DBA" => "Diploma in Business Administration",
        "DAC" => "Diploma in Accounting",
        "DIB" => "Diploma in International Business",
        "RBA" => "Degree in Business Administration",
        "RAC" => "Degree in Accounting",
        "RIB" => "Degree in International Business",
        "DQS" => "Diploma in Quantity Surverying",
        "DBC" => "Diploma in Broadcast Communication",
        "DPR" => "Diploma in Public Relations",
        "DEE" => "Diploma in Electrical Engineering",
        "RQS" => "Degree in Quantity Surverying",
        "RBC" => "Degree in Broadcast Communication",
        "RPR" => "Degree in Public Relations",
        "REE" => "Degree in Electrical Engineering",
    );
}

