<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="shortcut icon" type="x-icon" href="image/logo.jpg">
        <title>SRC</title>
    </head>
    <body>
        <header>
            <?php
            include'indexheader.php'
            ?>
        </header>
        <div class="container my-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "config/db.php";
                    mysqli_select_db($conn, "assignment1");

                    $sql = "SELECT * FROM events";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid query!");
                    }

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . (isset($row['start']) ? $row['start'] : '') . "</td>";
                        echo "<td>" . (isset($row['end']) ? $row['end'] : '') . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td><a class='btn btn-success' href='editevent.php?id=" . $row['id'] . "'>Edit</a> <a class='btn btn-danger' href='deleteevent.php?id=" . $row['id'] . "'>Delete</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        include'footer.php'
        ?>
    </body>