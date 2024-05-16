<?php
require_once 'config/db.php';

$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (isset($_POST["proceed_to_payment"])) {
    // Proceed with your existing logic for form submission
    // ...

    // Display the success message
    echo "<script type='text/javascript'>alert('Payment successful!');</script>";
    echo "<a href='registration.php'>Back to lists </a>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="css/payment.css" rel="stylesheet" type="text/css"/>
    <link href="css/header-and-footer-code.css" rel="stylesheet" type="text/css"/>
    <link href="css/nicepage.css" rel="stylesheet" type="text/css"/>
    <script src="js/jQuery.js" type="text/javascript"></script>
    <script src="js/nicepage.js" type="text/javascript"></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <form action="" method="POST">
            <div class="row">
                <div class="col">
                    <h3>Billing Address</h3>
                    <div class="text">
                        <span>Full Name :</span>
                        <input type="text" name="full_name" placeholder="Joel Wong" required>
                    </div>
                    <div class="text">
                        <span>Email :</span>
                        <input type="email" name="email" placeholder="example@example.com" required>
                    </div>
                    <div class="text">
                        <span>Address :</span>
                        <input type="text" name="address" placeholder="Room - Street - Locality" required>
                    </div>
                    <div class="text">
                        <span>City :</span>
                        <input type="text" name="city" placeholder="Georgetown" required>
                    </div>
                    <div class="division">
                        <div class="text">
                            <span>State :</span>
                            <input type="text" name="state" placeholder="Penang" required>
                        </div>
                        <div class="text">
                            <span>Postcode :</span>
                            <input type="text" name="postcode" placeholder="123456" maxlength="6" required>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <h3>Payment</h3>
                    <div class="text">
                        <span>Cards Accepted :</span>
                        <img src="images/card_img.png" alt="">
                    </div>
                    <div class="text">
                        <span>Name on Card :</span>
                        <input type="text" name="card_name" placeholder="Mr. Joel Wong" required>
                    </div>
                    <div class="text">
                        <span>Credit Card Number :</span>
                        <input type="text" name="card_number" placeholder="1111-2222-3333-4444" required>
                    </div>
                    <div class="text">
                        <span>Exp Month :</span>
                        <input type="text" name="exp_month" placeholder="January" required>
                    </div>
                    <div class="division">
                        <div class="text">
                            <span>Exp Year :</span>
                            <input type="text" name="exp_year" placeholder="2022" maxlength="4" required>
                        </div>
                        <div class="text">
                            <span>CVV :</span>
                            <input type="text" name="cvv" placeholder="1234" maxlength="4" required>
                        </div>
                    </div>
                </div>
            </div>
            <button class="submit" name="proceed_to_payment">Proceed To Payment</button>
        </form>
    </div>    
    <?php include_once 'footer.php'; ?>
</body>
</html>