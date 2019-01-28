<?php
include("current_order.php");

foreach($current_order as $item){
    echo "<div class='current-order-item'>";
    echo "<span class='current-order-item-name'>{$item["item_name"]}</span><span class='current-order-item-price'>£{$item["item_price"]}</span><span class='delete' data-order-item-id='{$item["order_item_id"]}'></span>";
    echo "<div class='current-order-item-options'>";
    foreach($options as $opt){
        if($opt["id"] == $item["order_item_id"]){
            if($opt["opt_1"]!=null){
                echo "<span class='current-order-item-option-name'>+ {$opt["opt_1"]}</span>";
            }
            if($opt["opt_2"]!=null){
                echo "<span class='current-order-item-option-name'>+ {$opt["opt_2"]}</span>";
            }
            if($opt["opt_3"]!=null){
                echo "<span class='current-order-item-option-name'>+ {$opt["opt_3"]}</span>";
            }
            if($opt["opt_4"]!=null){
                echo "<span class='current-order-item-option-name'>+ {$opt["opt_4"]}</span>";
            }
            if($opt["opt_5"]!=null){
                echo "<span class='current-order-item-option-name'>{$opt["opt_5"]}</span>";
            }
        }
    }
    echo "</div>";
    echo "</div>";
}
?>
