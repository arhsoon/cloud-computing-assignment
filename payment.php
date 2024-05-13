
<?php
require_once 'config/db.php';

$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(isset($_POST["Proceed To Payment"])){
    // Place your echo statement here
    echo "<a href='registration.php'>Back to lists </a>";

    // Proceed with your existing logic for form submission
    // ...
}
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="css/payment.css" rel="stylesheet" type="text/css"/>
    <link href="css/header-and-footer-code.css" rel="stylesheet" type="text/css"/>
    <link href="css/nicepage.css" rel="stylesheet" type="text/css"/>
    <script src="js/jQuery.js" type="text/javascript"></script>
    <script src="js/nicepage.js" type="text/javascript"></script>


</head>
<body>
    <?php
    include 'header.php';
    ?>
    <div class="container">

        <form action="" method="POST">

            <div class="row">

                <div class="col">

                    <h3>billing address</h3>

                    <div class="text">
                        <span>full name :</span>
                        <input type="text" placeholder="joel wong" required>
                    </div>
                    <div class="text">
                        <span>email :</span>
                        <input type="email" placeholder="example@example.com" required>
                    </div>
                    <div class="text">
                        <span>address :</span>
                        <input type="text" placeholder="room - street - locality" required>
                    </div>
                    <div class="text">
                        <span>city :</span>
                        <input type="text" placeholder="georgetown" required>
                    </div>

                    <div class="division">
                        <div class="text">
                            <span>state :</span>
                            <input type="text" placeholder="penang" required>
                        </div>
                        <div class="text">
                            <span>postcode :</span>
                            <input type="text" placeholder="123456" max="6" required>
                        </div>
                    </div>

                </div>

                <div class="col">

                    <h3>Your Seats</h3>

                    <div class="text">
                        <span>cards accepted :</span>
                        <img src="images/card_img.png" alt="">
                    </div>
                    <div class="text">
                        <span>name on card :</span>
                        <input type="text" placeholder="mr. joel wong" required>
                    </div>
                    <div class="text">
                        <span>credit card number :</span>
                        <input type="text" placeholder="1111-2222-3333-4444" required>
                    </div>
                    <div class="text">
                        <span>exp month :</span>
                        <input type="text" placeholder="january" required>
                    </div>

                    <div class="division">
                        <div class="text">
                            <span>exp year :</span>
                            <input type="text" placeholder="2022" max="4" required>
                        </div>
                        <div class="text">
                            <span>CVV :</span>
                            <input type="text" placeholder="1234" max="4" required>
                        </div>
                    </div>

                </div>

            </div>

            <button  class="submit" name="Proceed To Payment">Proceed To Payment</button>
            

        </form>
    </div>    
    <?php
    include_once 'footer.php';
    ?>
</body>


</html>