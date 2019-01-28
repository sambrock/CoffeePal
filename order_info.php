<?php
include("db_conn.php");
include("current_order.php");
?>

<div class="current-order-header">
    <h2>Order Details</h2>
    <span id="current-order-id" data-order-id="<?php echo $order_id;?>">#<?php echo $order_id;?></span>
    <span id="current-order-time"><?php echo $date; ?></span>
</div>
<div id="current-order-items"></div>
<div id="current-order-total">
    <span id="total-txt">Total:</span>
    <span id="total-price">£<?php echo $current_order_total["total"]; ?></span>
</div>
<div id="current-order-btns">
    <button id="cancel-btn">Cancel</button>
    <button id="pay-btn">Pay</button>
</div>
