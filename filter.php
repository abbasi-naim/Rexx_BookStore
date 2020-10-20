<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="/public/favicon.png">
    <title>My First PHP Code!</title>
</head>
<header>
<nav class="navbar navbar-light" style="background-color: #c61c1d;">
</nav>
<div class="col-md-2 col-sm-12" style="margin-top: +20px;">
<a href="https://www.rexx-systems.com/" class="logo">
<img src="/public/logo.jpg">
</a>
</div>
</header>

<body>

<div class="d-flex justify-content-center align-items-center container ">
<form method="POST">
<input type="text" name="customer_name" placeholder="Customer Name"/>
<input type="text" name="product_name" placeholder="Product Name"/>
<input type="text" name="sale_date" placeholder="Date"/>
<input type="submit" value="Filter"  class="btn btn-danger"/>
</form>
</div>
<div class="row justify-content-center">
    <div class="col-auto">
<table class="table table-striped table-dark">
<tr>
<th scope="col">Customer Name</th>
<th scope="col">Product Name</th>
<th scope="col">Date</th>
</tr>

<?php

require_once("db.php");

?>

</table>
</div>
  </div>
    

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>