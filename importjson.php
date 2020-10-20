<?php

$string = file_get_contents("data.json");
if ($string === false) {
}

$json_a = json_decode($string, true);
if ($json_a === null) {
}

require_once("db.php");

foreach ($json_a as $person_name => $person_a) {

    $sql="INSERT INTO `sale` (`sale_id`, `customer_name`, `customer_mail`, `product_id`, `product_name`, `product_price`, `sale_date`, `version`) VALUES (".$person_a["sale_id"].", '".$person_a["customer_name"]."', '".$person_a["customer_mail"]."', '".$person_a["product_id"]."', '".mysqli_real_escape_string($conn,$person_a["product_name"])."', '".$person_a["product_price"]."', '".$person_a["sale_date"]."', '".$person_a["version"]."');";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>
