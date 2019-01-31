<?php
require_once("model.php");

$status = "Pending";
$orderId = $_POST["id"];

processOrder($status, $orderId);
?>
