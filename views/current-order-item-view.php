<?php
include("../models/model.php");
$currentOrderId = getOrderId();
$currentOrder = getCurrentOrder();

foreach($currentOrder as $item){
    echo "<div class='current-order-item'>";
    echo "<span class='current-order-item-name'>{$item["item_name"]}</span><span class='current-order-item-price'>£{$item["item_price"]}</span><span class='delete' data-order-item-id='{$item["order_item_id"]}'></span>";
    echo "<div class='current-order-item-options'>";
    if($item["opt_1"]!=null){
        echo "<span class='current-order-item-option-name'>+ {$item["opt_1"]}</span>";
    }
    if($item["opt_2"]!=null){
        echo "<span class='current-order-item-option-name'>+ {$item["opt_2"]}</span>";
    }
    if($item["opt_3"]!=null){
        echo "<span class='current-order-item-option-name'>+ {$item["opt_3"]}</span>";
    }
    if($item["opt_4"]!=null){
        echo "<span class='current-order-item-option-name'>+ {$item["opt_4"]}</span>";
    }
    if($item["opt_5"]!=null){
        echo "<span class='current-order-item-option-name'>+ {$item["opt_5"]}</span>";
    }
    echo "</div>";
    echo "</div>";
}
?>
