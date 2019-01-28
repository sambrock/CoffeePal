<?php 
include("db_conn.php");

$order_id = $_POST["id"];

$q_delete_order_items="DELETE FROM order_items WHERE order_id=:order_id";
$prep_stmt_delete_order_items=$conn->prepare($q_delete_order_items);
$prep_stmt_delete_order_items->bindValue(":order_id", $order_id);
$prep_stmt_delete_order_items->execute();

$q_delete_order="DELETE FROM orders WHERE id=:order_id";
$prep_stmt_delete_order=$conn->prepare($q_delete_order);
$prep_stmt_delete_order->bindValue(":order_id", $order_id);
$prep_stmt_delete_order->execute();
?>