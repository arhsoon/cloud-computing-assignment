<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link href="css/event.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="shortcut icon" type="x-icon" href="image/logo.jpg">

    <title>SRC admin search</title>
</head>

<body>
    <header>
        <?php
        include 'admineventheader.php'
        ?>
        <div class="menu-btn"></div>
    </header>

    <section class="home1">
        <div class="media-icons">
            <a href="https://facebook.com/srcpenangtaruc"><i class="fab fa-facebook-f"></i></a>
            <a href="https://instagram.com/tarumtsrcpenang"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="index.php"><i class="fas fa-cog"></i></a>
        </div>
        <div class="container">
            <h1 class="text-center">Search Events</h1>
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php if (isset($_POST["title"])) echo htmlspecialchars($_POST["title"]); ?>">
                </div>
                <div class="form-group">
                    <label for="id">ID:</label>
                    <input type="text" class="form-control" id="id" name="id" value="<?php if (isset($_POST["id"])) echo htmlspecialchars($_POST["id"]); ?>">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <?php
                include 'config/db.php';
                mysqli_select_db($conn, "assignment1");

                $errors = array();

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // validate input data
                    $title = mysqli_real_escape_string($conn, $_POST["title"]);
                    $id = mysqli_real_escape_string($conn, $_POST["id"]);

                    if (empty($title) && empty($id)) {
                        $errors[] = "Please enter a title or ID to search for.";
                    } elseif (!empty($title) && !empty($id)) {
                        $errors[] = "Please enter only a title or an ID, not both.";
                    } elseif (!empty($id) && !ctype_digit($id)) {
                        $errors[] = "ID must be a positive integer.";
                    }

                    // query database
                    if (empty($errors)) {
                        $where = '';
                        if (!empty($title)) {
                            $where = "title LIKE '%$title%'";
                        } elseif (!empty($id)) {
                            $where = "id = $id";
                        }

                        $sql = "SELECT * FROM events WHERE $where";
                        $result = mysqli_query($conn, $sql);

                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            echo '<div class="container">
                <div class="jumbotron">
                    <h1 class="display-4 text-center text-success">' . $row['title'] . '</h1>
                        <p class="lead text-center text-danger">
                            ' . $row['description'] . '
                        </p>
                        <hr class="my-4">
                        <p class="lead">
                            <a class="btn btn-dark btn-lg" href="search1.php" role="button">Back</a>
                        </p>
                </div>
            </div>';
                        } else {
                            $errors[] = "No matching events found.";
                        }
                    }
                }
                
                ?>
            </form>

    </section>
    <?php
    include'footer.php'
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
    </script>

</body>