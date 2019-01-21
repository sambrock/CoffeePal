<?php
include("db_conn.php");
//require_once('include/util.php');
$order_id = "1001";
$product_id = $_POST["product_id"];


$q="INSERT INTO order_items (order_id,product_id) values ('".$order_id."','".$product_id."')";
$prep_stmt=$conn->prepare($q);
$prep_stmt->execute();
?>
