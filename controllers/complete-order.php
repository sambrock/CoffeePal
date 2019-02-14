<?php
require_once("../models/model.php");

$status = "Complete";
$orderId = $_POST["id"];

processOrder($status, $orderId);
?>
