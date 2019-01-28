<?php 
include("db_conn.php");

$order_id = $_POST["id"];

$q_complete_order="UPDATE orders SET status = 'Complete' WHERE id=:order_id";
$prep_stmt_complete_order=$conn->prepare($q_complete_order);
$prep_stmt_complete_order->bindValue(":order_id", $order_id);
$prep_stmt_complete_order->execute();
?>