<?php
include("current_order.php");

foreach($current_order as $item){
    echo "<div class='order-item'>";
    echo "<span class='current-order-item-name'>{$item["item_name"]}</span><span class='current-order-item-price'>£{$item["item_price"]}</span><span class='delete' data-order-item-id='{$item["order_item_id"]}'></span>";
    echo "</div>";
}
?>
