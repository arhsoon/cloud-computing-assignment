<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <title>Sign Up</title>
    </head>
    <?php
    include_once 'header.php';
    ?>

    <body>

        <?php
        require_once 'config/db.php';
        global $studentname1, $studentname2, $studentid, $studentname, $studentemail, $studentpass, $studentgender, $studentcourse, $studentyear, $studentsem;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST)) {
                (isset($_POST['studentid'])) ? $studentid = trim($_POST['studentid']) : $studentid = "";
                (isset($_POST['studentname1'])) ? $studentname1 = trim($_POST['studentname1']) : $studentname1 = "";
                (isset($_POST['studentname2'])) ? $studentname2 = trim($_POST['studentname2']) : $studentname2 = "";
                $studentname = $studentname1 . ' ' . $studentname2;

                (isset($_POST['studentemail'])) ? $studentemail = trim($_POST['studentemail']) : $studentemail = "";
                (isset($_POST['studentpass'])) ? $studentpass = trim($_POST['studentpass']) : $studentpass = "";
                (isset($_POST['studentgender'])) ? $studentgender = trim($_POST['studentgender']) : $studentgender = "";
                (isset($_POST['studentcourse'])) ? $studentcourse = trim($_POST['studentcourse']) : $studentcourse = "";
                (isset($_POST['studentyear'])) ? $studentyear = trim($_POST['studentyear']) : $studentyear = "";
                (isset($_POST['studentsem'])) ? $studentsem = trim($_POST['studentsem']) : $studentsem = "";

                $error['studentid'] = checkstudentid($studentid);
                $error['studentname'] = checkstudentname($studentname);
                $error['studentemail'] = checkstudentemail($studentemail);
                $error['studentgender'] = checkstudentgender($studentgender);
                $error['studentcourse'] = checkstudentcourse($studentcourse);
                $error['studentyear'] = checkstudentyear($studentyear);
                $error['studentsem'] = checkstudentsemester($studentsem);
                $error = array_filter($error);

                if ($_POST['studentpassword1'] === $_POST['studentpassword2']) {
                    $studentpass = $_POST['studentpassword1'];
                } else {
                    $error['studentpass'] = checkstudentpass($studentpass);
                }
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
                    echo "Succesful";
                } else {
                    echo "Unable to insert records";
                }
                $connection->close();
                $statement->close();
            } else {
                echo "<div class='alert alert-danger m-3' style='position: absolute; bottom: 0; right: 0; margin: 0;'>";

                foreach ($error as $value) {
                    echo "$value.</br>";
                }

                echo "</div>";
            }
        }
        ?>

        <div class="position-absolute top-50 start-50 translate-middle">
            <form method="POST">

                <div class="input-group mb-3">
                    <span class="class input-group-text">First Name</span>
                    <input type="text" placeholder="Surname" class="form-control" name="studentname1" required>
                </div>
                <div class="input-group mb-3">
                    <span class="class input-group-text">Last Name</span>
                    <input type="text" placeholder="Last name" class="form-control" name="studentname2" required>
                </div>
                <div class="input-group mb-3">
                    <span class="class input-group-text">Email</span>
                    <input type="email" placeholder="abc@gmail.com" class="form-control" name="studentemail" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Password</span>
                    <input type="password" placeholder="Must include number" class="form-control" name="studentpassword1" required>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">Retype password</span>
                    <input type="password" placeholder="" class="form-control" name="studentpassword2" required>
                </div>

                <div class="row">
                    <div class="form-group input-group mb-3 col " style="width: fit-content;">
                        <span class="input-group-text">Gender</span>
                        <select class="form-control" id="dropdown" name="studentgender" required>
                            <option selected disabled>Select gender</option>
                            <?php
                            $genders = getgender();
                            foreach ($genders as $sex => $sex1) {
                                printf("<option value = '%s'%s>%s
                            </option >", $sex, ($gender == $sex ? 'selected' : ''), $sex1);
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group input-group mb-3 ps-0 col" style="width: fit-content;">
                        <span class="input-group-text">Course</span>
                        <select class="form-control" id="dropdown" name="studentcourse" required>
                            <option selected disabled>Select course</option>
                            <?php
                            $program = getcourse();
                            foreach ($program as $pg => $pg1) {
                                printf("<option value = '%s'%s>%s
                            </option >", $pg, ($program == $pg ? 'selected' : ''), $pg1);
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Student ID</span>
                    <input type="text" placeholder="22XX01011" class="form-control" name="studentid" maxlength="10" required>
                </div>

                <div class="row">
                    <div class="form-group input-group mb-3 col" style="width: fit-content;">
                        <span class="input-group-text">Year</span>
                        <select class="form-control" id="dropdown" name="studentyear" required>
                            <option selected disabled>Select year</option>
                            <?php
                            $year = getyear();
                            foreach ($year as $pg11 => $pg1111) {
                                printf("<option value = '%s'%s>%s
                            </option >", $pg11, ($year == $pg11 ? 'selected' : ''), $pg1111);
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group input-group mb-3 ps-0 col" style="width: fit-content;">
                        <span class="input-group-text">Semester</span>
                        <select class="form-control" id="dropdown" name="studentsem" required>
                            <option selected disabled>Select semester</option>
                            <?php
                            $sem = getsemester();
                            foreach ($sem as $pg1 => $pg11) {
                                printf("<option value = '%s'%s>%s
                            </option >", $pg1, ($sem == $pg1 ? 'selected' : ''), $pg11);
                            }
                            ?>
                        </select>
                    </div>
                </div>





                <div>
                    <button type="submit" class="btn mb-1" style="background-color: #b8e0ff;">Submit</button>
                    <a href="done1.2.html" class="btn mb-1 " style="background-color: #ff6c6c;">Reset</a>
                    <a href="done1.0.html" class=" btn mb-1 " style="background-color: #d3d3d3;">Back</a>
                </div>
            </form>
        </div>






        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    </body>
</html>

