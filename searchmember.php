<?php
include_once 'config/db.php';

$searchTerm = isset($_POST['search']) ? $_POST['search'] : '';
$sortOption = isset($_POST['sort']) ? $_POST['sort'] : '';
$sortQuery = "";
if ($sortOption == "a-z") {
    $sortQuery = "ORDER BY studentname ASC";
} elseif ($sortOption == "z-a") {
    $sortQuery = "ORDER BY studentname DESC";
} elseif ($sortOption == "course") {
    $sortQuery = "ORDER BY studentcourse ASC";
} elseif ($sortOption == "sposition") {
    $sortQuery = "ORDER BY CASE WHEN sposition = 'President' THEN 1
                  WHEN sposition = 'Vice President' THEN 2
                  WHEN sposition = 'Secretary' THEN 3
                  WHEN sposition = 'Treasurer' THEN 4
                  WHEN sposition = 'Committee' THEN 5
                  WHEN sposition = 'Member' THEN 6 END ASC";
}

$where = "";
if (!empty($searchTerm)) {
    $where = "WHERE studentname LIKE '%$searchTerm%' OR studentemail LIKE '%$searchTerm%' OR studentcourse LIKE '%$searchTerm%' OR sposition LIKE '%$searchTerm%'";
}

$sql = "SELECT studentid, studentname, studentemail, studentcourse, studentyear, studentsem, sposition, pfp
        FROM student
        $where
        $sortQuery";

$res = mysqli_query($conn, $sql);

if (mysqli_num_rows($res) > 0) {
    while ($rows = mysqli_fetch_assoc($res)) {
        ?>
        <tr>
            <td>
                <div class="widget-26-job-emp-img">
                    <img src="images/<?php echo $rows['pfp']; ?>" alt="Image" />
                </div>
            </td>
            <td>
                <div class="widget-26-job-title">
                    <a href="Profile2.php?studentid=<?php echo $rows['studentid']; ?>"><?php echo $rows['studentname']; ?></a>
                    <p class="m-0"><a href="Profile2.php?studentid=<?php echo $rows['studentid']; ?>" class="employer-name"><?php echo $rows['sposition']; ?></a></p>
                </div>
            </td>
            <td>
                <div class="widget-26-job-info">
                    <p class="type m-0">Year <?php echo $rows['studentyear']; ?> Sem <?php echo $rows['studentsem']; ?></p>
                    <p class="text-muted m-0">in <span class="location"><?php echo $rows['studentcourse']; ?></span></p>
                </div>
            </td>
            <td>
                <div class="widget-26-job-category bg-soft-base">
                    <i class="indicator bg-base"></i>
                    <span><?php echo $rows['studentemail']; ?></span>
                </div>
            </td>
        </tr>
        <?php
    }
} else {
    echo "<tr><td colspan='4'>No results found.</td></tr>";
}

mysqli_close($conn);
?>
