<?php
require_once("model.php");

date_default_timezone_set('Europe/London');

$orderTime = date("Y-m-d H:i:s");
$status = "Processing";

addNewOrder($orderTime, $status);
?>
