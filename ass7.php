


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
        <title>Folder</title>
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
define('DB_HOST', "src-db.chw6wsykej92.us-east-1.rds.amazonaws.com");
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
                            <div class="col-4">
                                <div class="fs-4 mb-1" style="height:42px;
                                     ">
                                    <nav style=" --bs-breadcrumb-divider: '>';
                                         " aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><?php
                                                $label = $_GET['label'];
                                                echo $label
                                                ?></li>
                                    </nav>
                                </div>
                            </div>

                            <!-- <div class="col">
                                <button type="button" class="btn btn-light">Dismiss</button>
                                <button type="button" class="btn btn-light">Label</button>
                            </div> -->

                            <div class="col-8 pe-3">
                                <div class="row">

                                    <div class="col-4">
                                    </div>
                                    <div class = "col-4 ps-0">
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
                    $label = $_GET['label'];
                    $sql = "SELECT msgid, msgtitle, msgcontent, studentemailre, studentemail FROM msg WHERE studentemail = '$studentemail' AND label = '$label'";
                    $result = mysqli_query($conn, $sql);

// check if there are any results
                    if (mysqli_num_rows($result) > 0) {
                        // set a fixed width for the container div

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<div class='container-fluid mb-2' >";
                            echo "<div class='row'>";
                            echo "<div class='card col-11' style='height: auto;'>";
                            echo "<div class='card-body'>";
                            echo "<h5 class='card-title'><a href=''>" . $row['msgtitle'] . "</a></h5>";
                            echo "<h6 class='card-subtitle mb-2 text-muted'>FROM<i> " . $row['studentemail'] . "</i> SENT TO <i>" . $row['studentemailre'] . "</i></h6>";
                            echo "<p class='card-text'>" . $row['msgcontent'] . "</p>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='container col-1'>";
                            echo "<div class='row float-end me-1'>";
                            echo "<div class='pe-0'>";
                            echo "<div class='btn-group-vertical'>";
                            echo "<button class='btn btn-lg btn-block' style='background-color: #fdfdfd;' onclick=\"location.href='ass5.php?msgid=" . $row['msgid'] . "'\">Reply</button>";
                            echo "<button class='btn btn-lg btn-block' style='background-color: #fdfdfd;' onclick=\"location.href='archive_msg.php?msgid=" . $row['msgid'] . "'\">Archive</button>";
                            echo "<button class='btn btn-lg btn-block' style='background-color: #fdfdfd;' onclick=\"location.href='ass9.php?msgid=" . $row['msgid'] . "'\">More</button>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "No messages found";
                    }

// close connection
                    mysqli_close($conn);
                    ?>
















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

