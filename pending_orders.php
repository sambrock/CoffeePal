<?php
include("db_conn.php");

$q_pending_order_id="SELECT orders.id as order_id FROM orders WHERE status = 'Pending'";
$prep_stmt_pending_order_id=$conn->prepare($q_pending_order_id);
$prep_stmt_pending_order_id->execute();
$pending_order_id=$prep_stmt_pending_order_id->fetchAll();

$q_pending_order_items="SELECT orders.id as order_id, products.id as item_id, products.name as item_name FROM orders INNER JOIN order_items ON order_items.order_id=orders.id INNER JOIN products ON order_items.product_id=products.id WHERE status = 'Pending';";
$prep_stmt_pending_order_items=$conn->prepare($q_pending_order_items);
$prep_stmt_pending_order_items->execute();
$pending_order_items=$prep_stmt_pending_order_items->fetchAll();

$q_pending_order_options="SELECT id, order_id, product_id, opt_1, opt_2, opt_3, opt_4, opt_5, opt_6 FROM order_items";
$prep_stmt_pending_order_options=$conn->prepare($q_pending_order_options);
$prep_stmt_pending_order_options->execute();
$pending_order_options=$prep_stmt_pending_order_options->fetchAll();

//foreach($pending_order_id as $id){
//    echo $id["order_id"];
//    foreach($pending_order_items as $item){
//        if($id["order_id"] == $item["order_id"]){
//            echo $item["item_name"];
//        }
//    }
//}
?>
