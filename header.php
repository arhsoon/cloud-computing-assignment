<?php

session_start();

if (isset($_SESSION['studentid']) && isset($_SESSION['studentpass']) && isset($_SESSION['role'])) {
    $studentname = $_SESSION['studentname'];
    $studentemail = $_SESSION['studentemail'];
    // To get first name only
    $studentname = explode(" ", $studentname);
    $studentname = $studentname[0];
} 
// else {
//     header("location: login.php");
// }

?>

<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>header and footer code</title>
    <link rel="stylesheet" href="css/header-and-footer-code.css" media="screen">
    <link rel="stylesheet" href="css/nicepage.css" media="screen">
    <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 5.9.6, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">


    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": ""
        }
    </script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="header and footer code">
    <meta property="og:type" content="website">
    <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>

<body class="u-body u-xl-mode" data-lang="en">
    <header class="u-clearfix u-header u-header" id="sec-9d3f">
        <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
            <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
                <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; font-weight: 700;">
                    <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-color u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-decoration u-custom-text-hover-color u-custom-text-shadow u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
                        <svg class="u-svg-link" viewBox="0 0 24 24">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use>
                        </svg>
                        <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <rect y="1" width="16" height="2"></rect>
                                <rect y="7" width="16" height="2"></rect>
                                <rect y="13" width="16" height="2"></rect>
                            </g>
                        </svg>
                    </a>
                </div>
                <div class="u-custom-menu u-nav-container">
                    <ul class="u-nav u-spacing-20 u-unstyled u-nav-1">
                        <li class="u-nav-item">
                            <a class="u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-1-base u-text-black u-text-hover-palette-1-base" href="SRC-Home.php" style="padding: 10px;">SRC Home</a>
                        </li>
                        <li class="u-nav-item">
                            <a class="u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-1-base u-text-black u-text-hover-palette-1-base" href="About.php" style="padding: 10px;">About</a>
                        </li>

                        
                        
                        <!-- Changes login/sign up to session -->
                        <li class="u-nav-item">
                            <?php
                            // Echo href
                            if (isset($_SESSION['studentname'])){
                            echo "
                            <a class='u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-1-base u-text-black u-text-hover-palette-1-base'
                            style='padding: 10px;' href='Profile2.php?studentid=".$_SESSION['studentid']." '>
                            ";
                            echo "$studentname";
                            echo "<li class='u-nav-item'>
                            <a class='u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-1-base u-text-black u-text-hover-palette-1-base' 
                            href='logout.php' style='padding: 10px;'>Log Out</a>
                            </li>";

                            }else { //else { <a class='...' href='login.php' style='padding: 10px;'>Login/Sign Up</a>}
                                echo "<li class='u-nav-item'>
                            <a class='u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-1-base u-text-black u-text-hover-palette-1-base'
                            href='login.php' style='padding: 10px;'>Login/Sign Up</a></li>";
                            }
                            ?>
                        
                        </li>

                    </ul>
                </div>
            </nav>
            <img class="u-image u-image-default u-image-1" src="images/tarumt-logo1nobackground1.png" alt="" data-image-width="430" data-image-height="140">
            <img class="u-image u-image-contain u-image-default u-image-2" src="images/StudentRepresentativeCouncilcropped.jpg" alt="" data-image-width="1080" data-image-height="362">
        </div>
    </header>
</body>
</html>