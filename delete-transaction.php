<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/transaction.css" rel="stylesheet" type="text/css"/>
        <link href="css/Practical4.css" rel="stylesheet" type="text/css"/>
        <link href="css/header-and-footer-code.css" rel="stylesheet" type="text/css"/>
        <link href="css/nicepage.css" rel="stylesheet" type="text/css"/>
        <script src="js/jQuery.js" type="text/javascript"></script>
        <script src="js/nicepage.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        require_once 'config/db.php';
        include 'header.php';
        ?>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            //get method, retrieve record from DB
            (isset($_GET["Buyer"])) ?
                            $Buyer = strtoupper(trim($_GET["Buyer"])) :
                            $Buyer = "";
            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            $sql = "SELECT * FROM Transaction
                    WHERE Buyer = '$Buyer'";
            $result = $con->query($sql);
            if ($record = $result->fetch_object()) {
                //record found
                $buyer = $record->Buyer;
                $gender = $record->Gender;
                $email = $record->Email;
                $contact = $record->ContactNo;
                $total = $record->Total;
                printf("
                    <section class='content'>
                <main>
                    <div class='table-data'>
                        <div class='order'>
                            <div class='head'>
                                <h3>Transaction</h3>
                            </div>
                    <p>Are you sure you want to delete the following record?</p>
                        <table>
                        <tr>
                        <td>Buyer:</td>
                        <td>%s</td>
                        </tr>
                        
                        <tr>
                        <td>Gender:</td>
                        <td>%s</td>
                        </tr>
                        
                        <tr>
                        <td>Email:</td>
                        <td>%s</td>
                        </tr>
                        
                        <tr>
                        <td>Contact No:</td>
                        <td>%s</td>
                        </tr>
                        
                        <tr>
                        <td>Total:</td>
                        <td>%s</td>
                        </tr>
                        </table>
                        
                        <form action = '' method = 'POST'>
                        <input type='hidden' name='hfBuyer' value='%s' />
                        <input type='submit' value='Yes' name='btnYes' />
                        <input type='button' value='Cancel' name='btnCancel' onclick='location = 'transaction.php'' />
                        </form>
                        </div>
                    </div>
                </main>
                <?php
        include 'footer.php';
        ?>
            </section>
                        ", $buyer, getAllGender()[$gender], $email, $contact, $total, $buyer);
            } else {
                //record not found
                echo "<div class='error'>
                    Unable to retrieve record.
                    [ <a href='transaction.php'>
                    Back to list</a> ]
                </div>";
            }
        } else {
            //post method, delete record
            //retrieve hidden field
            $buyer = trim($_POST["hfBuyer"]);

            //Step 1: establish connection
            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            //Step 2: sql statement
            $sql = "DELETE FROM Transaction WHERE Buyer = ?";

            //Step 3: run sql
            $stmt = $con->prepare($sql);
            $stmt->bind_param("s", $buyer);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                //record deleted
                echo "<div class='info'><a href = 'transaction.php'>Back to lists </a>Student $buyer is deleted.</div>";
            } else {
                //unable to delete
                echo "<div class='error'><a href = 'transaction.php'>Back to lists </a>Unable to delete records</div>";
            }
            $con->close();
            $stmt->close();
        }
        ?>
        
    </body>
</html>

