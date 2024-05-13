<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/event.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="shortcut icon" type="x-icon" href="image/logo.jpg">
    <title>Admin - SRC Event</title>
</head>
<body>
<header>
    <?php
    include_once 'admineventheader.php'
    ?>
</header>

<section class="home1">
    <img class ="image-slide active" src="images/pic1.jpeg">
    <img class ="image-slide" src="images/pic2.jpeg">
    <img class ="image-slide" src="images/pic3.jpeg">
    <img class ="image-slide" src="images/pic4.jpeg">
    <img class ="image-slide" src="images/pic5.jpeg">
    <div class="content active">
        <h1>Welcome to<br><span>TARUMT Student Representative Council!</span></h1>
        <p>We are one of the famous societies in TARUMT which organised many amazing events all of the time, we provide the best services for all candidates.</p>
        <a href="#">Read More</a>
    </div>
    <div class="content">
        <h1>Wonderful2<br><span>Event</span></h1>
        <p>Tired of the monotonous outfits you wear to university everyday? Want to spice up your university life and participate in the community event?</p>
        <a href="#">Read More</a>
    </div>
    <div class="content">
        <h1>Wonderful3<br><span>Event</span></h1>
        <p>Where TAR UMT students can participate in a community-based activity where the students can feel included within the TAR UMT community.</p>
        <a href="#">Read More</a>
    </div>
    <div class="content">
        <h1>Wonderful4.<br><span>Event</span></h1>
        <p>"Alarms are ringing loud and clear; break’s over, a new semester is here. "It's that time again! Hope you had a fantastic semester break. But with a new day comes a new semester. Welcome to TAR UMT!</p>
        <a href="#">Read More</a>
    </div>
    <div class="content">
        <h1>Wonderful5<br><span>Event</span></h1>
        <p>TAR UMT SRC wish you the best of luck in this new semester. A big welcome to our new students who have just joined us. We hope you can adapt to campus life as soon as possible 🥳 and make as many new friends as possible!
</p>
        <a href="#">Read More</a>
    </div>
    <div class="media-icons">
        <a href="https://www.facebook.com/srcpenangtaruc"><i class="fab fa-facebook-f"></i></a>
        <a href="https://instagram.com/tarumtsrcpenang"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="index.php"><i class="fas fa-cog"></i></a>
    </div>
    <div class="slider-navigation">
        <div class="nav-btn active"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
        <div class="nav-btn"></div>
    </div>
</section>
<?php
include'footer.php'
?>
<script>
    //responsive menu
    const menuBtn = document.querySelector(".menu-btn");
    const navigation = document.querySelector(".navigation");
    menuBtn.addEventListener("click",() =>{
        menuBtn.classList.toggle("active");
        navigation.classList.toggle("active");
    });

    //image slider navigation
    const btns = document.querySelectorAll(".nav-btn");
    const slides = document.querySelectorAll(".image-slide");
    const contents = document.querySelectorAll(".content");
    var sliderNav = function(manual){
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
        btn.addEventListener("click",() => {
            sliderNav(i);
        })
    })
</script>
</body>