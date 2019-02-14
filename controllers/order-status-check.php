<?php
require_once("models/model.php");

$status = getOrderStatus();
?>
<div id="order-check" data-status="<?php echo $status["status"]; ?>"></div>
