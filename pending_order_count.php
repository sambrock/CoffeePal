<?php 
include("db_conn.php");

$q_pending_order_count="SELECT COUNT(id) as pending_order_count FROM orders WHERE status = 'Pending' GROUP BY status";
$prep_stmt_pending_order_count=$conn->prepare($q_pending_order_count);
$prep_stmt_pending_order_count->execute();
$pending_order_count=$prep_stmt_pending_order_count->fetch();

$count = $pending_order_count["pending_order_count"];
?>
<span ><?php echo $count; ?> orders</span>
