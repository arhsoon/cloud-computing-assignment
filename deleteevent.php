<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include "config/db.php";
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "DELETE FROM events WHERE id=$id";
            $result = $conn->query($sql);
            if ($result) {
                echo "<h2>Record deleted successfully!</h2>";
            } else {
                echo "<h2>Error deleting record: " . $conn->error . "</h2>";
            }
        }
        header('location:index.php');
        exit;
        ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Event Name</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
            <?php
            $sql = "SELECT * FROM events";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['event_name'] . "</td>";
                    echo "<td>" . $row['start_date'] . "</td>";
                    echo "<td>" . $row['end_date'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }
            ?>
        </table>
        <?php
    include '../footer.php';
    ?>
    </body>
</html>
