<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/event.css">
    <link rel="stylesheet" href="css/aboutus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="shortcut icon" type="x-icon" href="image/logo.jpg">
    <title>SRC</title>
</head>

<body>
    <header>
        <?php
        include 'membereventheader.php'
        ?>
        <div class="menu-btn"></div>
    </header>

    <section class="home1">
    </div>
    <div class="media-icons">
        <a href="https://facebook.com/srcpenangtaruc"><i class="fab fa-facebook-f"></i></a>
        <a href="https://instagram.com/tarumtsrcpenang"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
    </div>
     <div class="about-intro">
            <h3>Find us now<span style="color: white;"> !</h3>
            <p>Welcome to our event page! We're thrilled to share with you all of the exciting events that we have planned for the upcoming weeks and months. Whether you're a music lover, a sports enthusiast, or just looking for something fun to do, we've got you covered.

Our events are carefully curated to provide something for everyone. From live music concerts featuring local and international acts to art exhibitions showcasing the latest works from up-and-coming artists, we've got a wide range of events that are sure to pique your interest.

We also offer a variety of sports tournaments and fitness activities, including yoga classes, running races, and cycling events. Whether you're a seasoned athlete or just starting out on your fitness journey, we have activities that will challenge and inspire you.

In addition to our events, we also offer a variety of workshops and educational programs designed to help you learn new skills and expand your horizons. From cooking classes to coding workshops, there's always something new to discover at our events.

Check out our calendar for the latest information about our upcoming events, including dates, times, and locations. We can't wait to see you at our next event!</p>
        </div>
    <div class="about-sec">
        
        <div class="about-img">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.760949189056!2d100.28229421131073!3d5.453210534650359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ac2c0305a5483%3A0xfeb1c7560c785259!2sTAR%20UMT%20Penang%20Branch!5e0!3m2!1sen!2smy!4v1681008738787!5m2!1sen!2smy" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

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