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

function changeTime($str,$timezone){
    $dt = new DateTime($str);
$dt->setTimezone(new DateTimeZone($timezone));
return $dt->format('Y-m-d H:i:s');

}

require_once("db.php");
function filter($filter,$conn){
    $price=0;
    if(isset($_POST[$filter]) && $_POST[$filter]!="" ){

        $sql = "SELECT * FROM `sale` WHERE `".$filter."` LIKE '%".mysqli_real_escape_string($conn,$_POST[$filter])."%'";
        // echo $sql;
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {


            while($row = $result->fetch_assoc()) {
                echo '<tr><td>'.$row["customer_name"].'</td>';
                echo '<td>'.$row["product_name"].'</td>';
                //to convert version structure to numerical in order to compare 
                $version=str_replace(".","",$row["version"]);
                $version=str_replace("+","",$version);

                if($version < 101760){
                    echo '<td>'.changeTime($row["sale_date"],"utc").'</td></tr>';
                }else{
                    echo '<td>'.changeTime($row["sale_date"],"Europe/Berlin").'</td></tr>';
                }
                $price+=$row["product_price"];
            }
          echo '  <tr><td>Total Price<td>'.$price.'<td><td></tr>';
        } else {
            echo "0 results";
        }
    }
}

filter("customer_name",$conn);
filter("product_name",$conn);
filter("sale_date",$conn);

$conn->close();
?>

</table>
</div>
  </div>
    

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>