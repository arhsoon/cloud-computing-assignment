<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/event.css">
    <link rel="stylesheet" href="css/registration.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="shortcut icon" type="x-icon" href="image/logo.jpg">
    <title>SRC Admin Registration</title>
</head>

<body>
    <header>
        <?php
        include 'admineventheader.php'
        ?>
        <div class="menu-btn"></div>
    </header>
    <section class="home1">
    </div>
    <div class="media-icons">
        <a href="https://facebook.com/srcpenangtaruc"><i class="fab fa-facebook-f"></i></a>
        <a href="https://instagram.com/tarumtsrcpenang"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="index.php"><i class="fas fa-cog"></i></a>
    </div>
    <div class="container my-4">
        <a href="calendar2.php" class="square_btn" >Calendar</a>
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
                    echo "<td><a class='btn btn-success' href='#'id=" . $row['id'] . "' onclick='showAlert()'>Register Now</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
</section>
</body>
<style>
    .square_btn {
        position: relative;
        display: inline-block;
        font-weight: bold;
        padding: 8px 10px 5px 10px;
        text-decoration: none;
        color: #FFA000;
        background: #fff1da;
        border-bottom: solid 4px #FFA000;
        border-radius: 15px 15px 0 0;
        transition: .4s;
    }

    .square_btn:hover {
        background: #ffc25c;
        color: #FFF;
    }
</style>

<?php
include 'footer.php';
?>


<script>
    //responsive menu
    const menuBtn = document.querySelector(".menu-btn");
    const navigation = document.querySelector(".navigation");
    menuBtn.addEventListener("click", () => {
        menuBtn.classList.toggle("active");
        navigation.classList.toggle("active");
    });

    //image slider navigation
    const btns = document.querySelectorAll(".nav-btn");
    const slides = document.querySelectorAll(".image-slide");
    const contents = document.querySelectorAll(".content");
    var sliderNav = function (manual) {
        btns.forEach((btn) => {
            btn.classList.remove("active");
        });
        slides.forEach((slide) => {
            slide.classList.remove("active");
        });
        contents.forEach((content) => {
            content.classList.remove("active");
        });
        btns[manual].classList.add("active");
        slides[manual].classList.add("active");
        contents[manual].classList.add("active");
    }
    btns.forEach((btn, i) => {
        btn.addEventListener("click", () => {
            sliderNav(i);
        })
    })
    
    function showAlert() {
      alert("NOTE: Please refer to the day and date before you register any event to prevent any wrong booking!");
    }
</script>

</html>