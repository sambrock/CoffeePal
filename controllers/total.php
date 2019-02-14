<?php
include("../models/model.php");
$total = getOrderTotal();
?>
<span id="total-txt">Total:</span>
<span id="total-price">£<?php echo $total["total"]; ?></span>
