
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="css/nicepage.css" media="screen">
        <script src="js/jquery.js"></script> 
        <script src="js/nicepage.js"></script> 
        <title>More features</title>
    </head>

    <style>
        a:visited {
            text-decoration: none;
        }

        a:link {
            text-decoration: none;
            color: black;
        }
    </style>

    <body style="background-color: #f0f0f0;" >
        <!-- nav -->
        <?php
        // put your code here
        include 'header.php';
        ?>
        <!-- sidebar -->
        <div class="container-fluid" style="z-index: 2;">

            <div class="row" style="height: 92vh;">
                <div class="col-1 p-2 fixed-top" style="height: 100vh; z-index: 1; background-color: #0080B2;" id="sidebar">
                    <div style="height: 75.2823px;">
                    </div>
                    <p class="fs-3 mb-1"></p>
                    <ul class="list-group">
                        <!-- <li class="list-group-item p-2">New Request</li>
                        <li class="list-group-item p-2">All Request</li>
                        <li class="list-group-item p-2">Archived</li>
                        <li class="list-group-item p-2">Recycle Bin</li>
                        <li class="list-group-item p-2">Replied</li>
                        <li class="list-group-item p-2"><a href="youtube.com/@derykcihc">&#8618 Urgent</a></li> -->
                        <a href="ass8.php" class="mb-1 btn btn-md btn-block" style="background-color: #fdfdfd;">New Request</a>
                        <a href="ass4.php" class="mb-1 btn btn-md btn-block" style="background-color: #fdfdfd;">Home</a>
                        <a href="ass6.php" class="mb-1 btn btn-md btn-block" style="background-color: #fdfdfd;">Archived</a>

                        <?php
define('DB_HOST', "assignment-db.c3862usea78f.us-east-1.rds.amazonaws.com");
define('DB_USER', "admin");
define('DB_PASS', "password123");
define('DB_NAME', "assignment1");

                        $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                        $studentemail = $_SESSION['studentemail'];

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT label FROM label WHERE studentemail = '$studentemail'";
                        $result = mysqli_query($conn, $sql);

// check if there are any results
                        if (mysqli_num_rows($result) > 0) {
                            // set a fixed width for the container div

                            echo "<div class='btn-group-vertical'>";
                            echo "<a href='' class='mb-1 btn btn-md btn-block' style='background-color: #ff3d33; color: white;'>Folder</a>";

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<a href='ass7.php?label=" . $row['label'] . "' class='mb-1 btn btn-md btn-block' style='background-color: #ff3d33; color: white;'>" . $row['label'] . "</a>";
                            }
                            echo "</div>";
                        } else {
                            echo "<div class='btn-group-vertical'><a href='' class='mb-1 btn btn-md btn-block' style='background-color: #ff3d33; color: white;'>Folder</a></div>";
                        }
// close connection
                        ?>
                    </ul>
                    <div class="fixed-bottom mb-3 ms-3">
                        <a href="logout.php" class="btn btn-danger btn-md btn-block">Logout</a>
                    </div>
                </div>

                <div class="col-1 bg-danger p-2" style="height: 92vh;
                     " id="sidebar">
                    <!-- <div style="height: 75.2823px;
                            ">
                    </div>
                    <p class="fs-3 mb-1">#</p>
                    <ul class="list-group">
                        <li class="list-group-item p-2">New Request</li>
                        <li class="list-group-item p-2">All Request</li>
                        <li class="list-group-item p-2">Archived</li>
                        <li class="list-group-item p-2">Recycle Bin</li>
                        <li class="list-group-item p-2">Replied</li>
                    </ul> -->
                </div>

                <div class="col-11 p-0 ps-2 pt-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3">
                                <div class="fs-4 mb-1" style="height:42px;
                                     ">
                                    <nav style=" --bs-breadcrumb-divider: '>';
                                         " aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">More</li>
                                    </nav>
                                </div>
                            </div>

                            <!-- <div class="col">
                                <button type="button" class="btn btn-light">Dismiss</button>
                                <button type="button" class="btn btn-light">Label</button>
                            </div> -->

                            <div class="col-9 pe-3">
                                <div class="row">

                                    <div class="col-3">

                                    </div>

                                    <div class="col-3">

                                    </div>


                                    <div class = "col-3 ps-0">
                                        <form class = "d-flex" action = "add_label.php" method = "post">
                                            <input name = "addlabel" class = "form-control me-2" type = "search" placeholder = "Add folder here..." aria-label = "Search">
                                            <button class = "btn" type = "submit" style = "background-color: #C1E1C1;">Add</button>
                                        </form>
                                    </div>




                                    <div class = "col-3 ps-0">
                                        <form class = "d-flex " method="post" action="process_search.php">
                                            <input name='search' class = "form-control me-2" type = "search"
                                                   placeholder = "Filter title here..." aria-label = "Search">
                                            <button class = "btn" style = "background-color: #C1E1C1;"type = "submit">Search</button>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    if (isset($_COOKIE['email'])) {
                        $studentemail = $_COOKIE['email'];
                    }

                    $msgid = $_GET['msgid'];

                    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }



                    $sql = "SELECT msgid, msgtitle, msgcontent, studentemail, studentemailre FROM msg WHERE msgid = '$msgid' AND (studentemail = '$studentemail' OR studentemailre = '$studentemail')";

                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        // set a fixed width for the container div
                        echo "<form method='post' action='process_select.php'>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='container-fluid mb-2 ps-0'>";
                            echo "<div class='card ps-0' style=''>";
                            echo "<div class='card-body'>";
                            echo "<h5 class = 'card-title'><a href = ''>" . $row['msgtitle'] . "</a></h5>";
                            echo "<h6 class='card-subtitle mb-2 text-muted'>FROM<i> " . $row['studentemail'] . "</i> SENT TO <i>" . $row['studentemailre'] . "</i></h6>";
                            echo "<p class='card-text'>";
                            echo $row['msgcontent'];
                            echo "</p>";

                            echo "<input type='hidden' name='msgtitle' value='" . $row['msgtitle'] . "' />";
                            echo "<input type='hidden' name='msgcontent' value='" . $row['msgcontent'] . "' />";
                            echo "<input type='hidden' name='msgid' value='" . $row['msgid'] . "' />";

                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    }
                    ?>

                    <form action="process_select.php" method="post">
                        <div class="d-flex col-3 mb-2">
                            <select class="form-select me-2" id="dropdown" name="label">
                                <option selected>Label</option>
                                <?php
                                $sql = "SELECT label FROM label WHERE studentemail = '$studentemail'";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value=" . $row['label'] . ">" . $row['label'] . "</option>";
                                    }
                                } else {
                                    echo "<option>No folder found</option>";
                                }
                                ?>
                            </select>
                            <input type="hidden" name="msgid" value="<?php echo $msgid; ?>">
                            <button type="submit" class="btn btn-block" style="background-color: #f7e7ce">Confirm</button>
                        </div>
                    </form>

                    <form action="process_forward.php" method="post">
                        <div class="d-flex col-3 mb-2">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">Recipient</span>
                                <input type="hidden" name="msgid" value="<?php echo $msgid; ?>">
                                <input required type="email" name='reemail' class="form-control" placeholder="abc123@gmail.com" aria-label="Username" aria-describedby="basic-addon1">
                                <button type="submit" class="btn btn-block" style="background-color: #f7e7ce" >Send</button>
                            </div>
                        </div>
                    </form>

                    <form action="process_delete.php" method="post">
                        <div class="d-flex col-3 mb-2">
                            <input type="hidden" name="msgid" value="<?php echo $msgid; ?>">
                            <button type="submit" class="btn btn-block" style="background-color: #EE4B2B" >Delete</button>
                        </div>
                    </form>

                    <div class="alert mb-2" style="width: fit-content;" role="alert">
                        Only sender can <b>DELETE</b>, <b>LABEL</b> or <b>ARCHIVE</b> the messages
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