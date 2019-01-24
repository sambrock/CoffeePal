<?php
include("db_conn.php");

$q_order_id="SELECT id FROM orders ORDER BY id DESC LIMIT 1";
$prep_stmt_order_id=$conn->prepare($q_order_id);
$prep_stmt_order_id->execute();
$order_id_arr=$prep_stmt_order_id->fetch();

$order_id=$order_id_arr[0];

$q_current_order="SELECT order_items.id as order_item_id ,orders.id as order_id, products.id as item_id,products.name as item_name, products.price as item_price, CONCAT(DAYNAME(date_time), ', ', DAY(date_time), ' ',MONTHNAME(date_time),', ', YEAR(date_time), ' - ', TIME(date_time)) as order_datetime FROM orders INNER JOIN order_items ON order_items.order_id=orders.id INNER JOIN products ON order_items.product_id=products.id WHERE orders.id=:order_id";
$prep_stmt_current_order=$conn->prepare($q_current_order);
$prep_stmt_current_order->bindValue(":order_id", $order_id);
$prep_stmt_current_order->execute();
$current_order=$prep_stmt_current_order->fetchAll();
?>
