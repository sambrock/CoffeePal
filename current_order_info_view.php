<?php
require_once("model.php");
$currentOrderId = getOrderId();
$currentOrder = getCurrentOrder();
$currentOrderDate = getOrderDate();
?>
<div class="current-order-header">
    <h2>Order Details</h2>
    <span id="current-order-id" data-order-id="<?php echo $currentOrderId;?>">#<?php echo $currentOrderId;?></span>
    <span id="current-order-time"><?php echo $currentOrderDate["order_datetime"]; ?></span>
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
