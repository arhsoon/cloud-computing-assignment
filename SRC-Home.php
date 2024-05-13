<!DOCTYPE html>
<html style="font-size: 16px;" lang="en">

<head>


  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <meta name="keywords" content="TARUMTStudent Representative CouncilPenang Campus">
  <meta name="description" content="">
  <title>SRC Home</title>
  <link rel="stylesheet" href="css/SRC-Home.css" media="screen">
  <link rel="stylesheet" href="css/nicepage.css" media="screen">
    <script class="u-script" type="text/javascript" src="js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="js/nicepage.js" defer=""></script>
  <link id="u-theme-google-font" rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">


  <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": ""
}</script>
  <meta name="theme-color" content="#478ac9">
  <meta property="og:title" content="SRC Home">
  <meta property="og:type" content="website">
  <meta data-intl-tel-input-cdn-path="intlTelInput/">
</head>
<?php
include_once 'header.php';
?>
<body class="u-body u-xl-mode" data-lang="en">
  <section class="u-clearfix u-grey-50 u-section-1" id="carousel_ebd0">
    <div class="u-expanded-height u-grey-50 u-shape u-shape-rectangle u-shape-1"></div>
    <img class="u-expanded-height u-image u-image-round u-radius-10 u-image-1" src="images/TARUMTPenang.png"
      data-image-width="1600" data-image-height="390">
    <div class="u-list u-list-1">
      <div class="u-repeater u-repeater-1">
        <div
          class="u-align-center u-container-style u-list-item u-opacity u-opacity-60 u-repeater-item u-video-cover u-white u-list-item-1">
          <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1"><span
              class="u-file-icon u-grey-5 u-icon u-icon-circle u-text-grey-90 u-icon-1"
              data-href="ass1.php"><img src="images/748137-1fb06ebc.png" alt=""></span>
            <h4 class="u-text u-text-black u-text-1">
              <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-color u-text-hover-palette-1-base u-btn-1"
                href="ass1.php">Sign up/Login</a>
            </h4>
          </div>
        </div>
        <div
          class="u-align-center u-container-style u-list-item u-opacity u-opacity-60 u-repeater-item u-video-cover u-white u-list-item-2">
          <div class="u-container-layout u-similar-container u-valign-top u-container-layout-2"><span
              class="u-file-icon u-grey-5 u-icon u-icon-circle u-icon-2" data-href="ass4.php"><img
                src="images/2609282.png" alt=""></span>
            <h4 class="u-text u-text-black u-text-2">
              <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-color u-text-hover-palette-1-base u-btn-2"
                href="ass4.php">Chat</a>
            </h4>
          </div>
        </div>
        <div
          class="u-align-center u-container-style u-list-item u-opacity u-opacity-60 u-repeater-item u-video-cover u-white u-list-item-3">
          <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3">
              
              <?php
              if (empty($_SESSION['role'])){
                  echo '<span class="u-file-icon u-grey-5 u-icon u-icon-circle u-icon-3" data-href="event.php"> <img src="images/2693507.png" alt=""></span>';
                  echo '<h4 class="u-text u-text-black u-text-3">
              <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-color u-text-hover-palette-1-base u-btn-3"
                href="event.php">event</a>
            </h4>';
                  
              }
              else if ($_SESSION['role'] == 'user'){
                echo '<span class="u-file-icon u-grey-5 u-icon u-icon-circle u-icon-3" data-href="event.php"> <img src="images/2693507.png" alt=""></span>';
                echo '<h4 class="u-text u-text-black u-text-3">
            <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-color u-text-hover-palette-1-base u-btn-3"
              href="event.php">event</a>
          </h4>';
              }

              else if($_SESSION['role'] == 'admin'){
              echo '<span id="eventbtn" class="u-file-icon u-grey-5 u-icon u-icon-circle u-icon-3" data-href="event1.php"> <img src="images/2693507.png" alt=""></span>';
              echo '<h4 class="u-text u-text-black u-text-3">
              <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-color u-text-hover-palette-1-base u-btn-3"
                href="event1.php">event</a>
            </h4>';
              }
              
      
              ?>
<!--              
            <h4 class="u-text u-text-black u-text-3">
              <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-color u-text-hover-palette-1-base u-btn-3"
                href="event.php">event</a>
            </h4>
              -->
          </div>
        </div>
        
        <div
          class="u-align-center u-container-style u-list-item u-opacity u-opacity-60 u-repeater-item u-video-cover u-white u-list-item-5">
          <div class="u-container-layout u-similar-container u-valign-top u-container-layout-5"><span
              class="u-file-icon u-grey-5 u-icon u-icon-circle u-icon-5" data-href="Member-List2.php"><img
                src="images/1040005.png" alt=""></span>
            <h4 class="u-text u-text-black u-text-5">
              <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-color u-text-hover-palette-1-base u-btn-5"
                href="Member-List2.php">member<br>list
              </a>
            </h4>
          </div>
        </div>
        <div
          class="u-align-center u-container-style u-list-item u-opacity u-opacity-60 u-repeater-item u-video-cover u-white u-list-item-6">
          <div class="u-container-layout u-similar-container u-valign-top u-container-layout-6"><span
              class="u-file-icon u-grey-5 u-icon u-icon-circle u-icon-6" data-href="Contact.php"><img
                src="images/813419.png" alt=""></span>
            <h4 class="u-text u-text-black u-text-6">
              <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-hover-none u-none u-text-body-color u-text-hover-palette-1-base u-btn-6"
                href="Contact.php">feedback</a>
            </h4>
          </div>
        </div>
      </div>
    </div>
  </section>


<?php
include_once 'footer.php';
?>
</body>

</html>