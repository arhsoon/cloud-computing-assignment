<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link href="css/transaction.css" rel="stylesheet" type="text/css"/>
        <link href="css/header-and-footer-code.css" rel="stylesheet" type="text/css"/>
        <link href="css/nicepage.css" rel="stylesheet" type="text/css"/>
        <script src="js/jQuery.js" type="text/javascript"></script>
        <script src="js/nicepage.js" type="text/javascript"></script>
        <title>Transaction</title>
    </head>
    <body>
        <?php
        require_once 'config/db.php';
        include 'header.php';

        $header = array(
            'Buyer' => 'Buyer',
            'Gender' => 'Gender',
            'Email' => 'Email',
            'ContactNo' => 'Contact No',
            'Total' => 'Total'
        );

        global $sort, $order;
        if (isset($_GET['sort']) && isset($_GET['order'])) {
            $sort = (array_key_exists($_GET['sort'], $header) ? $_GET['sort'] : 'Buyer');
            $order = ($_GET['order'] == 'DESC' ? 'DESC' : 'ASC');
        } else {
            $sort = 'Buyer';
            $order = 'ASC';
        }
        ?>

        <section class="content">
            <main>
                <div class="table-data">
                    <div class="order">
                        <div class="head">
                            <h3>Transaction</h3>
                            <div class="container">
                                <form action="" method="POST">
                                    <input type="text" name="txtsearch" value="" placeholder="Search Data" />
                                    <button name="submit">Search</button>
                                </form>
                            </div>
                        </div>
                        <table>
                     
                            <tr>
                                <?php
                                foreach ($header as $key => $value) {
                                    if ($key == $sort) {
                                        printf("<th>
                        <a href='?sort=%s&order=%s'>%s</a>
                        %s
                            </th>",
                                                $key,
                                                $order == 'ASC' ? 'DESC' : 'ASC',
                                                $value,
                                                $order == 'ASC' ? '⬇️' : '⬆️');
                                    } else {
                                        printf("<th>
                            <a href='?sort=%s&order=ASC'>%s</a>
                                </th>",
                                                $key,
                                                $value);
                                    }
                                }
                                ?>
                                <th>Action</th>
                            </tr>

                            <?php
                            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

                            $sql = "SELECT * FROM Transaction ORDER BY $sort $order";

                            if ($result = $con->query($sql)) {
                                while ($record = $result->fetch_object()) {
                                    printf("<tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
            
                        <td><a href = 'edit-transaction.php?Buyer=%s'>Edit</a> | <a href = 'delete-transaction.php?Buyer=%s'>Delete</a></td>
                            </tr>", $record->Buyer,
                                            getAllGender()[$record->Gender],
                                            $record->Email,
                                            $record->ContactNo,
                                           
                                           
                                            $record->Total,
                                            $record->Buyer,
                                            $record->Buyer);
                                }
                            }
                            $result->free();
                            $con->close();
                            ?>
                        </table>
                    </div>
                </div>
            </main><?php
        include_once 'footer.php';
        ?>
        </section>
        
    </body>
</html>
