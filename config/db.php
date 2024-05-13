<?php
define('DB_HOST', "localhost");
define('DB_USER', "root");
define('DB_PASS', "");
define('DB_NAME', "assignment1");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn) {
    echo "Failed to connect to MySQL ";
    exit();
}

function checkstudentid($studentid)
{
    if ($studentid == NULL) {
        return "Student ID cannot be empty";
    } else if (strlen($studentid) != 10) {
        return "Student ID must be 10 digits";
    } else if (!preg_match("/^[0-9]{2}[A-Z]{3}\d{5}$/", $studentid)) {
        return "Student ID must contain letters in between (E.g. 22PMD02000)";
    } else if (checkexistingstudentid($studentid)) {
        checkexistingstudentid($studentid);
        return "ID already registered";
    }
}

function checkexistingstudentid($studentid)
{
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

function checkstudentname($studentname){
    if ($studentname == null) {
        return "Student name cannot be empty";
    } else if (strlen($studentname) > 40) {
        return "Student name must be less than 40 characters";
    } else if (!preg_match("/^[a-zA-Z ]*$/", $studentname)) {
        return "Student name must only contain letters";
    }
}

function checkstudentemail($studentemail){
    if ($studentemail == NULL) {
        return "Student email cannot be empty";
    } else if (strlen($studentemail) > 40) {
        return "Student email must be less than 40 characters";
    } else if (!filter_var($studentemail, FILTER_VALIDATE_EMAIL)) {
        return "Invalid email format";
    } else if (checkexistingstudentemail($studentemail)) {
        return "Email already registered";
    }
}

function checkexistingstudentemail($studentemail)
{
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

function checkstudentpass($studentpass){
    if ($studentpass == NULL) {
        return "Student password cannot be empty";
    } else if (strlen($studentpass) > 16) {
        return "Student password must be less than 16 characters";
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $studentpass)) {
        return "Student password must only contain letters and numbers";
    }
    // $studentpass = md5($studentpass);
}

function checkstudentgender($studentgender){
    if ($studentgender == NULL){
        return "Enter your gender";
    }else if (!array_key_exists($studentgender,getgender()))
    {
        return "invalid gender";
    }
}

function getgender(){
    return array(
        "M" => "Male",
        "F" => "Female",
    );
}

function checkstudentcourse($studentcourse){
    if ($studentcourse == NULL){
        return "Enter your course";
    }else if (!array_key_exists($studentcourse,getcourse()))
    {
        return "invalid course";
    }
}

function getcourse(){
    return array (
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

$sposition = array(
    "President",
    "Vice President",
    "Secretary",
    "Treasurer",
    "Committee",
    "Member"
);

function checkstudentyear($studentyear){
    if ($studentyear == NULL){
        return "Enter your year of study";
    }else if (!array_key_exists($studentyear,getyear()))
    {
        return "invalid year of study";
    }
}

function getyear(){
    return array (
        "1" => "Year 1",
        "2" => "Year 2",
        "3" => "Year 3",
        "4" => "Year 4",
    );
}

function checkstudentsemester($studentsem){
    if ($studentsem == NULL){
        return "Enter your semester";
    }else if (!array_key_exists($studentsem,getsemester()))
    {
        return "invalid semester";
    }
}

function getsemester(){
    return array (
        "1" => "Semester 1",
        "2" => "Semester 2",
        "3" => "Semester 3",
    );
}

function checkBuyerName($buyer){
    if($buyer == NULL){
        return "Please Enter Your Name!";
    }
    else if(strlen($buyer) > 50){
        return "Please Ensure Your Name Not Longer Than 50 Words!";
    }
    else if(!preg_match("/^[A-Za-z' ]*$/", $buyer)){
        return "Invalid Student Name!";
    }
}

function checkGender($gender){
    if($gender == NULL){
        return "Please Select Your Gender!";
    }
    else if(!array_key_exists($gender, getAllGender())){
        return "Invalid Gender!";
    }
}

function checkEmail($email){
    if($email == NULL){
        return "Please Enter Your Email!";
    }
    else if(strlen($email) > 50){
        return "Please Ensure Your Email Not Longer Than 50 words!";
    }
    else if(!preg_match("/^[A-Za-z0-9@,\.\-]+$/", $email)){
        return "Invalid Email!";
    }
}

function checkContactNo($contact){
    if($contact == NULL){
        return "Please Enter Your Contact No!";
    }
    else if(strlen($contact) > 11){
        return "Please Ensure Your Contact No Not More Than 11 Numbers!";
    }
}

function getAllGender(){
    return array(
        "M"=>"👨 Male",
        "F"=>"👧 Female"
    );
}
