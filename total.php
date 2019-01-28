<?php
include("db_conn.php");
include("current_order.php");
?>

<span id="total-txt">Total:</span>
<span id="total-price">£<?php echo $current_order_total["total"]; ?></span>
