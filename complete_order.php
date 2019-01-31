<?php 
require_once("model.php");

$status = "Complete";
$orderId = $_POST["id"];

processOrder($status, $orderId);
?>
