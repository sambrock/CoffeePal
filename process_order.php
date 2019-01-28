<?php
include("db_conn.php");

$order_id = $_POST["id"];

$q_process_order="UPDATE orders SET status = 'Pending' WHERE id=:order_id";
$prep_stmt_process_order=$conn->prepare($q_process_order);
$prep_stmt_process_order->bindValue(":order_id", $order_id);
$prep_stmt_process_order->execute();

?>
