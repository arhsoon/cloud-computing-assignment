<?php
include "config/db.php";
if (isset($_GET['studentid'])) {
    $studentid = trim($_GET['studentid']);
}
echo $studentid;
$studentid = $_GET['studentid'];
$sql = "DELETE FROM student WHERE studentid = '$studentid'";
$result = mysqli_query($conn, $sql);

// pop up to comfirm delete
echo "<script>alert('Are you sure you want to delete this user?');</script>";
if ($result) {
    echo "<script>alert('Record deleted successfully');</script>";
    header("Location: ../Member-List2.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>