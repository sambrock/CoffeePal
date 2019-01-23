<?php
include("db_conn.php");

date_default_timezone_set('Europe/London');

$orderTime = date("Y-m-d H:i:s");
$status = "Pending";

$q="INSERT INTO orders(date_time,status) values(:orderTime, :status)";
$prep_stmt=$conn->prepare($q);
$prep_stmt->bindParam(":orderTime", $orderTime);
$prep_stmt->bindParam(":status", $status);
$prep_stmt->execute();
?>
