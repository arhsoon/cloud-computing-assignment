<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add users</title>
</head>

<body>
    <?php
    require_once 'config\db.php';
    global $studentid, $studentname, $studentemail, $studentpass, $studentgender, $studentcourse, $studentyear, $studentsem;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST)) {
        (isset($_POST['studentid'])) ? $studentid = trim($_POST['studentid']) : $studentid = "";
        (isset($_POST['studentname'])) ? $studentname = trim($_POST['studentname']) : $studentname = "";
        (isset($_POST['studentemail'])) ? $studentemail = trim($_POST['studentemail']) : $studentemail = "";
        (isset($_POST['studentpass'])) ? $studentpass = trim($_POST['studentpass']) : $studentpass = "";
        (isset($_POST['studentgender'])) ? $studentgender = trim($_POST['studentgender']) : $studentgender = "";
        (isset($_POST['studentcourse'])) ? $studentcourse = trim($_POST['studentcourse']) : $studentcourse = "";
        (isset($_POST['studentyear'])) ? $studentyear = trim($_POST['studentyear']) : $studentyear = "";
        (isset($_POST['studentsem'])) ? $studentsem = trim($_POST['studentsem']) : $studentsem = "";

        $error['studentid'] = checkstudentid($studentid);
        $error['studentname'] = checkstudentname($studentname);
        $error['studentemail'] = checkstudentemail($studentemail);
        $error['studentpass'] = checkstudentpass($studentpass);
        $error['studentgender'] = checkstudentgender($studentgender);
        $error['studentcourse'] = checkstudentcourse($studentcourse);
        $error['studentyear'] = checkstudentyear($studentyear);
        $error = array_filter($error);
    }
    if (empty($error)) {
        $connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $sql = "INSERT INTO student 
        (studentid, studentname, studentemail, studentpass, studentgender, studentcourse, studentyear, studentsem) 
        VALUES (?,?,?,?,?,?,?,?)";
        $statement = $connection->prepare($sql);
        $statement->bind_param("ssssssss", $studentid, $studentname, $studentemail, $studentpass, $studentgender, $studentcourse, $studentyear, $studentsem);
        $statement->execute();

        if ($statement->affected_rows > 0) {
            echo "Sign up successfully";
        } else {
            echo "Unable to insert records";
        }
        $connection->close();
        $statement->close();
    } else {
        foreach ($error as $value) {
            echo $value . "<br>";
        }
    }
    }
    ?>

    <h1>Sign Up</h1>
    <form action="" method="POST">
        <!--Form to insert all the relevant details -->
        <label for="studentid">Student ID</label>
        <input type="text" name="studentid" id="studentid" <?php echo $studentid; ?> required><br><br>

        <label for="studentname">Student Name</label>
        <input type="text" name="studentname" id="studentname" <?php echo $studentname; ?> required><br><br>
        <label for="studentemail">Student Email</label>

        <input type="email" name="studentemail" id="studentemail" <?php echo $studentemail; ?> required><br><br>
        <label for="studentpass">Student Password</label>

        <input type="password" name="studentpass" id="studentpass" <?php echo $studentpass; ?> required><br><br>

        <?php
        $studentgender = getgender();
        foreach ($studentgender as $gender => $sex) {
            printf("<input type='radio' name='studentgender' id='studentgender'  
        %s value='%s' required > %s <br>", ($studentgender == $gender) ? "checked" : "", $gender, $sex);
        }
        ?>

        <label for="studentcourse">Student Course</label>
        <select name="studentcourse" id="studentcourse">
            <?php
            $studentcourse = getcourse();
            foreach ($studentcourse as $course => $courses) {
                printf("<option value='%s' %s>%s</option>", $course, ($studentcourse == $course) ? "selected" : "", $courses);
            }
            ?>
        </select>

        <label for="studentyear">Year</label>
        <select name="studentyear" id="studentyear">
            <?php
            $studentyear = getyear();
            foreach ($studentyear as $year => $years) {
                printf("<option value='%s' %s>%s</option>", $year, ($studentyear == $year) ? "selected" : "", $years);
            }
            ?>
        </select>

        <label for="studentsem">Student Semester</label>
        <select name="studentsem" id="studentsem">
            <?php
            $studentsem = getsemester();
            foreach ($studentsem as $sem => $sems)
                printf("<option value='%s' %s>%s</option>", $sem, ($studentsem == $sem) ? "selected" : "", $sems);
            ?>
        </select>

        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
        <input type="button" value="cancel"name="cancel">
    </form>
</body>
<br>
<a href="login.php">Login</a>
<br>
<a href="SRC-Home.php">Home</a>
</html>