<?php
require_once 'config/db.php';

$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(isset($_GET["id"]) && isset($_GET["price"])){
    $id = $_GET["id"];
    $price = $_GET["price"];

    $sql1 = "SELECT * FROM cart WHERE product_id = $id";
    $result1 = mysqli_query($con, $sql1);
    if(mysqli_num_rows($result1) > 0){
        $row1 = mysqli_fetch_assoc($result1);

        $newQty = $row1["quantity"] + 1;
        if($price != "Free"){
            $subtotal = $price * $newQty;
        }else{
            $subtotal = $price;
        }

        $sql2 = "UPDATE cart SET price = '$price', quantity = $newQty, subtotal='$subtotal' WHERE id=".$row1["id"];

    }else{

        $sql2 = "INSERT INTO cart (product_id, price, quantity, subtotal) VALUES ('$id', '$price', '1', '$price')";
    }

    $result2 = mysqli_query($con, $sql2);
    
    header("Location: mycart.php");
}

if(isset($_POST["Remove_Item"])){
    $sql1 = "DELETE FROM cart WHERE id = ".$_POST["cartId"];
    $result1 = mysqli_query($con, $sql1);

    header("Location: mycart.php");
}

if(isset($_POST["Update_Item"])){
    $qty = $_POST["qty"];
    $price = $_POST["price"];

    if($price != "Free"){
        $subtotal = $price * $qty;
    }else{
        $subtotal = $price;
    }

    $sql1 = "UPDATE cart SET price = '$price', quantity = '$qty', subtotal='$subtotal' WHERE id=".$_POST["cartId"];
    $result1 = mysqli_query($con, $sql1);

    header("Location: mycart.php");
}

if(isset($_POST["Make_Purchase"])){

    (isset($_POST['txtBuyer'])) ?
                    $buyer = trim($_POST['txtBuyer']) :
                    $buyer = "";

    (isset($_POST['rbGender'])) ?
                    $gender = trim($_POST['rbGender']) :
                    $gender = "";

    (isset($_POST['txtEmail'])) ?
                    $email = trim($_POST['txtEmail']) :
                    $email = "";

    (isset($_POST['txtPhone'])) ?
                    $contact = trim($_POST['txtPhone']) :
                    $contact = "";

    $error['buyer'] = checkBuyerName($buyer);
    $error['gender'] = checkGender($gender);
    $error['email'] = checkEmail($email);
    $error['contact'] = checkContactNo($contact);
    $error = array_filter($error);

    if (empty($error)) {
        //GOOD, insert record later

        $total = $_POST["total"];

        $sql = "INSERT INTO transaction (Buyer, Gender, Email, ContactNo, Total) VALUES (?,?,?,?,?)";
        $statement = $con->prepare($sql);
        $statement->bind_param('sssss', $buyer, $gender, $email, $contact, $total);
        $statement->execute();
        if ($statement->affected_rows > 0) {
            //Record are inserted

            $transaction_id = $statement->insert_id;

            $sql3 = "SELECT * FROM cart";
            $result3 = mysqli_query($con, $sql3);
            while($row3 = mysqli_fetch_assoc($result3)){

                $event_id = $row3["product_id"];
                $quantity = $row3["quantity"];
                $price = $row3["price"];
                $subtotal = $row3["subtotal"];

                mysqli_query($con, "INSERT INTO transaction_item (transaction_id, event_id, quantity, price, subtotal) VALUES ('$transaction_id', '$event_id', '$quantity', '$price', '$subtotal')");

            }

            mysqli_query($con, "DELETE FROM cart");
            header("Location: payment.php");

            echo "<div class='info'><a href = 'registration.php'>Back to lists </a>Student $buyer has been inserted";
        } else {
            //records are unable to be inserted
            echo "<div class='error'><a href = 'registration.php'>Back to lists </a>Unable to insert records</div>";
        }

    } else {
        //NOT GOOD, display error
        echo "<ul class='error'>";
        foreach ($error as $value) {
            echo "<li>$value</li>";
        }
        echo "</ul>";
    }
    
}

?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="css/nicepage.css" rel="stylesheet" type="text/css"/>
        <link href="css/header-and-footer-code.css" rel="stylesheet" type="text/css"/>
        <script src="js/jQuery.js" type="text/javascript"></script>
        <script src="js/nicepage.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        include 'header.php';
        global $buyer, $gender, $email, $contact;
        ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center border rounded bg-light my-5">
                    <h1>My Cart</h1>
                </div>

                <div class="col-lg-8">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Item Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $total = 0;
                            $sql3 = "SELECT events.*, cart.id AS cartId, cart.price, cart.quantity, cart.subtotal 
                            FROM cart 
                            INNER JOIN events ON events.id = cart.product_id";
                            $result3 = mysqli_query($conn, $sql3);
                            while($row3 = mysqli_fetch_assoc($result3)){

                                if($row3['subtotal'] != "Free"){
                                    $total = $total + $row3['subtotal'];
                                }
                            ?>
                            <tr>
                                <td><?php echo $row3['title']; ?></td>
                                <td><?php echo $row3['price']; ?></td>
                                <td>
                                    <form method='POST'>
                                        <input type="hidden" name="cartId" value="<?php echo $row3['cartId']; ?>">
                                        <input type="hidden" name="price" value="<?php echo $row3['price']; ?>">
                                        <input type='number' class='text-center iquantity' name="qty" value='<?php echo $row3['quantity']; ?>' min='1' max='10' style="width: 80px;">
                                        <button type="submit" name='Update_Item' class='btn btn-sm btn-outline-primary'>UPDATE</button>
                                    </form>
                                </td>
                                <td><?php echo $row3['subtotal']; ?></td>
                                <td>
                                    <form method='POST'>
                                        <input type="hidden" name="cartId" value="<?php echo $row3['cartId']; ?>">
                                        <button type="submit" name='Remove_Item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <div class="border bg-light rounded p-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Total:</h4>
                            </div>
                            <div class="col-lg-6">
                                <h5 class="text-right" id="total"> RM <?php echo number_format($total, 2); ?></h5>
                            </div>
                        </div>
                        <br />
                        <form action="" method="POST">
                            <input type="hidden" name="total" value="<?php echo $total; ?>">
                            <div class="form-group">
                                <label>Full Name:</label>
                                <input type="text" name="txtBuyer" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <label>Gender:</label>
                                <?php
                                $genders = getAllGender();
                                foreach ($genders as $sex => $value) {
                                    printf("<input type='radio' name='rbGender' %s value='%s' />%s", ($gender == $sex) ? 'checked' : "", $sex, $value);
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="text" name="txtEmail" class="form-control" value="" />
                            </div>
                            <div class="form-group">
                                <label>Contact No:</label>
                                <input type="text" name="txtPhone" class="form-control" value="" />
                            </div>
                            <button name='Make_Purchase' class="btn btn-primary btn-block">Make Purchase</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include 'footer.php';
        ?>
    </body>
</html>
