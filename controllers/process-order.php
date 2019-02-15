<?php
require_once("../models/model.php");

date_default_timezone_set('Europe/London');
$orderTime = date("Y-m-d H:i:s");

$status = "Pending";
$orderId = $_POST["id"];

processOrder($status, $orderTime, $orderId);
?>
