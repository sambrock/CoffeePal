<?php
require_once("../models/model.php");
$currentOrderId = getOrderId();
$currentOrder = getCurrentOrder();
?>

<div class="current-order-header">
    <h2>Order Details</h2>
    <span id="current-order-id" data-order-id="<?php echo $currentOrderId;?>">#<?php echo $currentOrderId;?></span>
    <span id="current-order-time"><?php echo $currentOrder[0]["order_datetime"]; ?></span>
</div>
<div id="current-order-items"></div>
<div id="current-order-total">
    <span id="total-txt">Total:</span>
    <span id="total-price">£</span>
</div>
<div id="current-order-btns">
    <button id="cancel-btn">Cancel</button>
    <button id="pay-btn">Pay</button>
</div>
<?php
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
