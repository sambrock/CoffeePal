<?php
include("db_conn.php");

$q_order_id="SELECT id FROM orders ORDER BY id DESC LIMIT 1";
$prep_stmt_order_id=$conn->prepare($q_order_id);
$prep_stmt_order_id->execute();
$order_id_arr=$prep_stmt_order_id->fetch();

$order_id=$order_id_arr[0];
$product_id = $_POST["id"];
$product_price = $_POST["price"];
$opt_1 = $_POST["opt_1"];
$opt_2 = $_POST["opt_2"];
$opt_3 = $_POST["opt_3"];

$q="INSERT INTO order_items(order_id,product_id, price, opt_1, opt_2, opt_3) values (:order_id, :product_id, :product_price, :opt_1, :opt_2, :opt_3)";
$prep_stmt_insert=$conn->prepare($q);
$prep_stmt_insert->bindValue(":order_id", $order_id);
$prep_stmt_insert->bindValue(":product_id", $product_id);
$prep_stmt_insert->bindValue(":product_price", $product_price);
$prep_stmt_insert->bindValue(":opt_1", $opt_1);
$prep_stmt_insert->bindValue(":opt_2", $opt_2);
$prep_stmt_insert->bindValue(":opt_3", $opt_3);
$prep_stmt_insert->execute();
?>
