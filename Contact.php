<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Email form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/Contact.css" type="text/css">

</head>

<?php
include_once 'header.php';
?>

<body>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <div class="container bootstrap snippets bootdey">
        <section id="contact" class="gray-bg padding-top-bottom">
            <div class="container bootstrap snippets bootdey">
                <div class="row">

                    <form id="Highlighted-form" class="col-sm-6 col-sm-offset-3" action="sendemail.php" method="post" novalidate="">
                       
                    <div class="form-group">
                            <label class="control-label" for="name">Name</label>
                            
                            <div class="controls">
                                <input id="name" name="name" placeholder="Your name" class="form-control requiredField Highlighted-label" data-new-placeholder="Your name" type="text" data-error-empty="Please enter your name">
                                <i class="fa fa-user"></i>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label" for="email">Email</label>
                            <div class=" controls">
                                <input id="email" name="email" placeholder="Your email" class="form-control requiredField Highlighted-label" data-new-placeholder="Your email" type="email" data-error-empty="Please enter your email" data-error-invalid="Invalid email address">
                                <i class="fa fa-envelope"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="subject">Subject</label>
                            <div class=" controls">
                                <input id="subject" name="subject" placeholder="Subject Title" class="form-control requiredField Highlighted-label" data-new-placeholder="Subject" type="text" data-error-empty="Please enter a subject">
                                <i class="fa fa-envelope"></i>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label" for="message">Message</label>
                            <div class="controls">
                                <textarea id="message" name="message" placeholder="Your message" class="form-control requiredField Highlighted-label" data-new-placeholder="Your message" rows="6" data-error-empty="Please enter your message"></textarea>
                                <i class="fa fa-comment"></i>
                            </div>
                        </div>
                      
                        <p><button name="submit" type="submit" class="btn btn-info btn-block" data-error-message="Error!" data-sending-message="Sending..." data-ok-message="Message Sent"><i class="fa fa-location-arrow"></i>Send Message</button></p>
                        <input type="hidden" name="submitted" id="submitted" value="true">
                    </form>
                </div>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">


    </script>
</body>

<?php
include_once 'footer.php';
?>

</html>