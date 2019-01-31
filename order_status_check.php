<?php
require_once("model.php");

$status = getOrderStatus();
?>
<div id="order-check" data-status="<?php echo $status["status"]; ?>"></div>
