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
        global $hideForm;
        //ask server , which method used by the app?
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            //get method, retrieve record from DB
            //display output to the form
            //retrieve parameter from URL (id)
            (isset($_GET["Buyer"])) ?
                            $Buyer = strtoupper(trim($_GET["Buyer"])) :
                            $Buyer = "";

            //DB Step 1: connection
            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            //DB Step 2: sql statement
            $sql = "SELECT * FROM Transaction WHERE Buyer = '$Buyer'";

            //DB Step 3: run sql
            $result = $con->query($sql);

            if ($record = $result->fetch_object()) {
                //record found
                $Buyer = $record->Buyer;
                $Gender = $record->Gender;
                $Email = $record->Email;
                $ContactNo = $record->ContactNo;
                $Total = $record->Total;
            } else {
                //record not found
                echo "<div class='error'>
                    Unable to retrieve record.
                    [ <a href='transaction.php'>
                    Back to list</a> ]
                </div>";
                $hideForm = true;
            }
            $con->close();
            $result->free();
        } else {
            //post method
            //update record
            //retrieve new input data from user
            $Gender = trim($_POST["rbGender"]);
            $Email = trim($_POST["txtEmail"]);
            $ContactNo = trim($_POST["txtPhone"]);
            $Buyer = trim($_POST["txtBuyer"]);

            //validation
            $error["Buyer"] = checkBuyerName($Buyer);
            $error["Gender"] = checkGender($Gender);

            //filter error
            $error = array_filter($error);

            if (empty($error)) {
                //GOOD, no error, update record
                //DB Step 1: connection
                $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                //DB Step 2: sql statement
                $sql = "Update Transaction 
                        SET Gender = ?, Email = ?, ContactNo = ?
                        WHERE Buyer = ?";

                //DB Step 3: execute sql
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ssss", $Gender, $Email, $ContactNo, $Buyer);
                if ($stmt->execute()) {
                    //record updated
                    echo "<div class='info'><a href = 'transaction.php'>Back to lists </a>Student $Buyer has been inserted</div>";
                } else {
                    //unable to update
                    echo "<div class='error'><a href = 'list-student.php'>Back to lists </a>Unable to update records</div>";
                }
                $con->close();
                $stmt->close();
            } else {
                //WITH ERROR, display error
                echo "<ul class='error'>";
                foreach ($error as $value) {
                    echo "<li>$value</li>";
                }
                echo "</ul>";
            }
        }
        ?>

        <?php if ($hideForm == false) : ?>
            <section class="content">
                <main>
                    <div class="table-data">
                        <div class="order">
                            <div class="head">
                                <h3>Transaction</h3>
                            </div>
                            <form action="" method="POST">
                                <table>
                                    <tr>
                                        <td>Buyer:</td>
                                        <td><?php echo $Buyer; ?>
                                            <input type="hidden" name = "txtBuyer" value = "<?php echo $Buyer; ?>" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gender:</td>
                                        <td>
                                            <?php
                                            $genders = getAllGender();
                                            foreach ($genders as $sex => $value) {
                                                printf("<input type='radio' name='rbGender' %s value='%s' />%s", ($Gender == $sex) ? 'checked' : "", $sex, $value);
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><input type="text" name = "txtEmail" value = "<?php echo $Email; ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td>Contact No:</td>
                                        <td><input type="text" name = "txtPhone" value = "<?php echo $ContactNo; ?>" /></td>
                                    </tr>
                                </table>
                                <input type="submit" value="Update" name="btnupdate" />
                                <input type="reset" value="cancel" name="btnCancel" onclick="location = 'transaction.php'"/>
                            </form>
                        </div>
                    </div>
                </main>
                <?php
        include_once 'footer.php';
        ?>
            </section>
        <?php endif; ?>
    </body>
</html>
