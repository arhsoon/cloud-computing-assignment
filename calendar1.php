<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <link rel="shortcut icon" type="x-icon" href="image/logo.jpg">
    <title>SRC - Calender</title>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.print.min.css' rel='stylesheet' media='print' />
  <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js'></script>
  <script>
    $(document).ready(function() {
      $('#calendar').fullCalendar({
        events: 'event.php'
      });
    });
  </script>
</head>
<body>
    <a href="registration.php" class="square_btn">Back</a>
    <div id='calendar' style='width:70%'>
        
    </div>
</body>
<style>
    .square_btn {
    display: inline-block;
    padding: 0.3em 1em;
    text-decoration: none;
    color: #67c5ff;
    border: solid 2px #67c5ff;
    border-radius: 3px;
    transition: .4s;
    margin: 30px;
}

.square_btn:hover {
    background: #67c5ff;
    color: white;
}
</style>
</html>
