<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>General Search Results - Bootdey.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="css/Member-List2.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<?php
include_once 'header.php';
?>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-lg-12 card-margin">
<div class="card search-form">
<div class="card-body p-0">
<form id="search-form">
<div class="row">
<div class="col-12">
<div class="row no-gutters">

<script>
  $(document).ready(function() {
    var formSubmitted = false;
    // Auto submit the form on load
    if (!formSubmitted) {
      $('#search-form').submit();
      //to prevent looping
      formSubmitted = true;
    }
  });
</script>

<form action="" method="POST" id="search-form">
<div class="col-lg-3 col-md-3 col-sm-12 p-0">

<select class="form-control" id="exampleFormControlSelect1" name="sort_alphabet">
<option value = "sposition">Sort By <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "sposition"){ echo "selected"; } ?> </option>
<option value= "a-z">Name (A-Z) <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "a-z"){ echo "selected"; } ?> </option>
<option value= "z-a">Name (Z-A) <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "z-a"){ echo "selected"; } ?> </option>
<option value= "course">Course <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "course"){ echo "selected"; } ?> </option>
<option value= "sposition">Position <?php if(isset($_GET['sort_alphabet']) && $_GET['sort_alphabet'] == "sposition"){ echo "selected"; } ?> </option>
</select>
</div>
<div class="col-lg-8 col-md-6 col-sm-12 p-0">
<input type="text" placeholder="Search..." class="form-control" id="search" name="search" autocomplete="off">
</div>
<div class="col-lg-1 col-md-3 col-sm-12 p-0">

<button type="submit" class="btn btn-base">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
</button>
</form>

</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<div class="card card-margin">
<div class="card-body">
<div class="row search-body">
<div class="col-lg-12">
<div class="search-result">
<div class="result-header">
<div class="row">
<div class="col-lg-6">

</div>

</div>
</div>
<div class="result-body">
<div class="table-responsive">


<table class="table widget-26" id="ajaxid">
<tbody>
   
</tbody>
</table>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#search-form').on('submit', function(event) {
            event.preventDefault();
            var searchTerm = $('#search').val();
            var sortOption = $('#exampleFormControlSelect1').val();
            
            $.ajax({
                url: 'searchmember.php',
                type: 'post',
                data: { search: searchTerm, sort: sortOption },
                success: function(data) {
                    $('#ajaxid').html(data);
                }
            });
        });
    });
</script>


</body>
<?php
include_once 'footer.php';
?>
</html>