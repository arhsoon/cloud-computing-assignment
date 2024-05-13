<?php
include 'config/db.php';

if (isset($_GET['studentid'])) {
    $studentid = trim($_GET['studentid']);
}

$sql = "SELECT * FROM student WHERE studentid = '$studentid'";
$res = mysqli_query($conn, $sql);
if (mysqli_num_rows($res) > 0) {
    while ($rows = mysqli_fetch_assoc($res)) {
        $studentname = $rows['studentname'];
        $studentid = $rows['studentid'];
        $studentemail = $rows['studentemail'];
        $studentcourse = $rows['studentcourse'];
        $sposition = $rows['sposition'];
        $pfp = $rows['pfp'];
        $aboutme = $rows['aboutme'];
    }
}
$profilename = $studentname;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Profile Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/Profile2.css" media="screen">

</head>

<body>
    <div class="container">
        <div class="main-body">


            <?php
            include_once 'header.php';
            ?>

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <!-- Profile Pic -->
                            <div class="d-flex flex-column align-items-center text-center">

                                <img src="images/<?php echo $pfp; ?>" class="rounded-circle p-1 bg-primary" width="110" alt="<?php echo $pfp; ?>">
                                <div class="mt-3">

                                    <h4>
                                        <?php
                                        echo $profilename;
                                        ?>
                                    </h4>
                                    <p class="text-secondary mb-1">
                                        <?php
                                        echo $studentid;
                                        ?>
                                    </p>
                                    <p class="text-muted font-size-sm"></p>

                                    <button class="btn btn-outline-primary" onclick="location.href='mailto:<?php $studentemail ?>'">Send Email</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php
                                    echo $profilename;
                                    ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php
                                    echo "<a href=mailto:" . $studentemail . ">" . $studentemail . "</a>";
                                    ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Course</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php
                                    $courses = getcourse();
                                    echo $courses[$studentcourse];
                                    ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Position</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php
                                    echo $sposition;
                                    ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">About me</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php
                                    echo $aboutme;
                                    ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php
                                    if (empty($_SESSION['studentid'])) {
                                        echo "<a class='btn btn-info 'href='Edit-Profile2.php?studentid=" . $studentid . "' style='display:none'>Edit</a>";
                                    } else if ($_SESSION['role'] == 'admin') {
                                        echo "<a class='btn btn-info 'href='Edit-Profile2.php?studentid=" . $studentid . "'>Edit</a>";
                                        " '>Edit</a>";
                                    } else if ($_SESSION['studentid'] == $studentid) {
                                        echo "<a class='btn btn-info 'href='Edit-Profile2.php?studentid=" . $studentid . "' >Edit</a>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <!--  -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
</body>
<?php
include_once 'footer.php';
?>

</html>