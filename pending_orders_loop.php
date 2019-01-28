<?php
include("db_conn.php");
include("pending_orders.php");

foreach($pending_order_id as $id){
    echo "<div class='pending-order'>";
    echo "<span class='pending-order-id'>Order #{$id["order_id"]}</span>";
    foreach($pending_order_items as $item){
        if($id["order_id"] == $item["order_id"]){
            echo "<div class='pending-order-item'>";
            echo "<span class='pending-order-item-name'>{$item["item_name"]}</span>";
            foreach($pending_order_options as $option){
                if($id["order_id"] == $option["order_id"] && $item["item_id"] == $option["product_id"]){
                    if($option["opt_1"]!=null){
                        echo "<span class='pending-order-item-option'>+ {$option["opt_1"]}</span>";
                    }
                    if($option["opt_2"]!=null){
                        echo "<span class='pending-order-item-option'>+ {$option["opt_2"]}</span>";
                    }
                    if($option["opt_3"]!=null){
                        echo "<span class='pending-order-item-option'>+ {$option["opt_3"]}</span>";
                    }
                    if($option["opt_4"]!=null){
                        echo "<span class='pending-order-item-option'>+ {$option["opt_4"]}</span>";
                    }
                    if($option["opt_5"]!=null){
                        echo "<span class='pending-order-item-option'>+ {$option["opt_5"]}</span>";
                    }
                }
            }
            echo "</div>";
        }
    }
    echo "<div class='done-btn-div'><button class='done-btn' data-pending-order-id='{$id["order_id"]}'>Done</button></div>";
    echo "</div>";
}
?>
