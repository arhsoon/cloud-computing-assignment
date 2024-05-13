<?php

// Steps to edit profile 
// 1. update $_POST values
// 2. update $sql
// 3. ensure input name and id are corresponding to the database

include "config/db.php";
$studentid = $_GET['studentid'];
$errors = []; 
if (isset($_POST['submit'])) {

    if ($_POST['studentname'] == NULL) {
        $errors[] = "Student name cannot be empty";
    } else if (strlen($_POST['studentname']) > 40) {
        $errors[] = "Student name must be less than 40 characters";
    } else if (!preg_match("/^[a-zA-Z ]*$/", $_POST['studentname'])) {
        $errors[] = "Student name mus   t only contain letters";
    }

    if ($_POST['studentemail'] == NULL) {
        $errors[] = "Student email cannot be empty";
    } else if (strlen($_POST['studentemail']) > 40) {
        $errors[] = "Student email must be less than 40 characters";
    } else if (!filter_var($_POST['studentemail'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    } else {
        $enteredEmail = $_POST['studentemail'];
    
        // Check if the entered email already exists in the database
        $existingEmailQuery = "SELECT studentid FROM student WHERE studentemail = '$enteredEmail' AND studentid != '$studentid'";
        $existingEmailResult = mysqli_query($conn, $existingEmailQuery);
        if (mysqli_num_rows($existingEmailResult) > 0) {
            $errors[] = "Email already taken";
        }
    }

    if (strlen($_POST['aboutme']) > 300) {
        $errors[] = "About me must be less than 300 characters";
    }

    if (!empty($errors)) {
        $error_message = "Invalid";
        // Combine all the errors into a single string
        foreach ($errors as $error) {
            $error_message .= $error . "\n";
        }
        // Display the errors in a pop-up window
        echo "<script>alert('$error_message');</script>";
    }
    else {
    $studentname = $_POST['studentname'];
    $studentemail = $_POST['studentemail'];
    $studentcourse = $_POST['studentcourse'];
    $position = $_POST['sposition'];
    $image=$_FILES['file']; 
    $pfp = $_POST['pfp'];
    $aboutme = $_POST['aboutme'];

    $imagefilename=$image['name'];
    $imagefileerror=$image['error'];
    $imagefiletmp=$image['tmp_name'];
    $filename_seperate=explode('.',$imagefilename);
    $file_extension=strtolower(end($filename_seperate));
    $extension=array('png','jpg','jpeg');
    // if $file_extension's extension is whatever in the array, then it will be uploaded

    if (in_array($file_extension, $extension)){
        // store the uploaded images with the name of the image
        $upload_image='images/'.$imagefilename;
        // move the uploaded images to the folder with a temporary variable
        move_uploaded_file($image['tmp_name'],$upload_image);
    
     $sql = "UPDATE student SET studentname = '$studentname', studentemail = '$studentemail', studentcourse = '$studentcourse', sposition = '$position'
    , aboutme = '$aboutme', pfp = '$imagefilename'
    WHERE studentid = '$studentid'";
    } 
     
    else {
        $sql = "UPDATE student SET studentname = '$studentname', studentemail = '$studentemail', studentcourse = '$studentcourse', sposition = '$position'
        , aboutme = '$aboutme'
        WHERE studentid = '$studentid'";
    }
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: ../Profile2.php?studentid=$studentid");
    }else{
        echo "Error updating record: " . mysqli_error($conn);
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Edit Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/Edit-Profile2.css" media="screen">


<?php 
include_once 'header.php';
?>

</head>
<body>    

<!-- FORM OPENING -->
<form action="" method="post" enctype="multipart/form-data">
<?php 

$sql = "SELECT * FROM student WHERE studentid = '$studentid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="container">
<div class="main-body">
<div class="row">
<div class="col-lg-4">
<div class="card">
<div class="card-body">
<div class="d-flex flex-column align-items-center text-center">
    
<!-- PROFILE PICTURE name and type = file-->
<label for="pfp">Choose a profile picture:</label>
<br>
<img src="images/<?php echo $row['pfp']; ?>" class="rounded-circle p-1 bg-primary" width="110" alt="<?php echo $row['pfp']; ?>">
<br>
<div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" name="file" id="pfp" accept="image/png, image/jpeg">
        <label class="custom-file-label" for="pfp">Upload a new photo</label>

    </div>
</div>
<br>
<!-- <button type="submit" name="submit" class="btn btn-outline-primary">
    Upload New Photo
</button> -->

        
<div class="mt-3">

<h4>
    <?php
    echo $row['studentname'];
    ?>
</h4>
<p class="text-secondary mb-1">
    <?php
    echo $row['studentid'];
    ?>
</p>
<p class="text-muted font-size-sm"></p>

<!-- DELETE FUNCTION FOR ADMIN ONLY -->
<?php
if ($_SESSION['role'] == 'admin') {
    echo "<button class='btn btn-outline-primar'>
    <a href='delete.php?studentid=" . $row['studentid'] . "'>
     Delete</button>    
    </a>";
}
?>

<button class="btn btn-outline-primary" onclick="location.href='mailto:<?php $row['studentemail'] ?>'">Send Email</button>
</div>
</div>
<hr class="my-4">

</div>
</div>
</div>
<div class="col-lg-8">
<div class="card">
<div class="card-body">
<div class="row mb-3">
<div class="col-sm-3">
<h6 class="mb-0">Full Name</h6>
</div>
<div class="col-sm-9 text-secondary">

<input type="text" class="form-control" id="studentname" name="studentname"
value=
"<?php 
echo $row['studentname'];
?>">

</div>
</div>
<div class="row mb-3">
<div class="col-sm-3">
<h6 class="mb-0">Email</h6>
</div>
<div class="col-sm-9 text-secondary">

<span id="email-validation-message"></span>
<input type="email" class="form-control" id="studentemail" name="studentemail" oninput="validateEmail()"
value="<?php echo $row['studentemail']; ?>">



</div>
</div>
<div class="row mb-3">
<div class="col-sm-3">
<h6 class="mb-0">Course</h6>
</div>
<div class="col-sm-9 text-secondary">


<select class="form-control" id="studentcourse" name="studentcourse">
    <?php
    $studentcourse = getcourse();
    foreach ($studentcourse as $course => $courses) {
        $selected = ($course == $row['studentcourse']) ? "selected" : "";
        printf("<option value='%s' %s>%s</option>", $course, $selected, $courses);
    }
    ?>
</select>

</div>
</div>
<div class="row mb-3">
<div class="col-sm-3">
<h6 class="mb-0">Position</h6>
</div>
<div class="col-sm-9 text-secondary">

<select class="form-control" id="sposition" name="sposition">
    <?php 
    if ($_SESSION['role'] == 'admin') {
        foreach ($sposition as $position) {
            $selected = ($position == $row['sposition']) ? 'selected' : '';
            echo '<option value="' . $position . '"' . $selected . '>' . $position . '</option>'; 
        }
    } else {
        // disable the input
        echo '<option value="' . $row['sposition'] . '" disabled selected>' . $row['sposition'] . '</option>';
        // To remain the position value regardless.
        echo '<input type="hidden" name="sposition" value="' . $row['sposition'] . '">';
    }
    ?>
</select>




</div>

</div>
<div class="row mb-3">
<div class="col-sm-3">
<h6 class="mb-0">About me</h6>
</div>
<div class="col-sm-9 text-secondary">

<input type="text" class="form-control" id="aboutme" name="aboutme" autocomplete="off"
value=
"<?php 
echo $row['aboutme'];
?>">


</div>
</div>
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-9 text-secondary">

<input type="submit" name="submit" class="btn btn-primary px-4" value="Save Changes">
</form>


</div>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
</div>
</div>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function validateEmail() {
    var currentEmail = "<?php echo $row['studentemail']; ?>";
    var enteredEmail = $('#studentemail').val();

    if (enteredEmail !== currentEmail) {
        $.ajax({
            url: 'check_existing_email.php',
            type: 'POST',
            data: { studentemail: enteredEmail }, // Pass the entered email
            success: function (data) {
                $('#email-validation-message').html(data);
            },
            error: function () {
                alert('Ajax is not working');
            }
        });
    } else {
        $('#email-validation-message').html('');
    }
}
</script>



</body>

<?php
include 'footer.php';
?>
</html>
