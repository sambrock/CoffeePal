<?php
include("db_conn.php");

$q_status="SELECT status FROM orders ORDER BY id DESC LIMIT 1";
$prep_stmt_status=$conn->prepare($q_status);
$prep_stmt_status->execute();
$status=$prep_stmt_status->fetch();
?>
<div id="order-check" data-status="<?php echo $status["status"]; ?>"></div>
