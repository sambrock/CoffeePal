<?php
require_once("../models/model.php");

$status = "Pending";
$orderId = $_POST["id"];

processOrder($status, $orderId);
?>
