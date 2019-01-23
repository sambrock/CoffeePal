<?php
include("db_conn.php");

$q_order_id="SELECT id FROM orders ORDER BY id DESC LIMIT 1";
$prep_stmt_order_id=$conn->prepare($q_order_id);
$prep_stmt_order_id->execute();
$order_id_arr=$prep_stmt_order_id->fetch();

$order_id=$order_id_arr[0];
$product_id = $_POST["product_id"];

$q="INSERT INTO order_items(order_id,product_id) values (:order_id, :product_id)";
$prep_stmt_insert=$conn->prepare($q);
$prep_stmt_insert->bindValue(":order_id", $order_id);
$prep_stmt_insert->bindValue(":product_id", $product_id);
$prep_stmt_insert->execute();
?>
