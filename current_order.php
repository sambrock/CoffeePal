<?php
include("db_conn.php");

$q_order_id="SELECT id FROM orders ORDER BY id DESC LIMIT 1";
$prep_stmt_order_id=$conn->prepare($q_order_id);
$prep_stmt_order_id->execute();
$order_id_arr=$prep_stmt_order_id->fetch();

$order_id=$order_id_arr[0];

$q_current_order="SELECT order_items.id as order_item_id ,orders.id as order_id, products.id as item_id,products.name as item_name, order_items.price as item_price FROM orders INNER JOIN order_items ON order_items.order_id=orders.id INNER JOIN products ON order_items.product_id=products.id WHERE orders.id=:order_id";
$prep_stmt_current_order=$conn->prepare($q_current_order);
$prep_stmt_current_order->bindValue(":order_id", $order_id);
$prep_stmt_current_order->execute();
$current_order=$prep_stmt_current_order->fetchAll();

$q_options="SELECT id, opt_1, opt_2, opt_3, opt_4, opt_5 FROM order_items";
$prep_stmt_options=$conn->prepare($q_options);
$prep_stmt_options->execute();
$options=$prep_stmt_options->fetchAll();

$q_date="SELECT CONCAT(DAYNAME(date_time), ', ', DAY(date_time), ' ',MONTHNAME(date_time),', ', YEAR(date_time), ' - ', TIME(date_time)) as order_datetime FROM orders WHERE id = :order_id";
$prep_stmt_date=$conn->prepare($q_date);
$prep_stmt_date->bindValue(":order_id", $order_id);
$prep_stmt_date->execute();
$current_order_date=$prep_stmt_date->fetch();

$date = $current_order_date["order_datetime"];

$q_total="SELECT SUM(order_items.price) as total FROM orders INNER JOIN order_items ON order_items.order_id=orders.id INNER JOIN products ON order_items.product_id=products.id WHERE orders.id = :order_id GROUP BY order_id";
$prep_stmt_current_order_total=$conn->prepare($q_total);
$prep_stmt_current_order_total->bindValue(":order_id", $order_id);
$prep_stmt_current_order_total->execute();
$current_order_total=$prep_stmt_current_order_total->fetch();
?>

