<?php
include("db_conn.php");

$id = $_POST["id"];

$q_delete_item="DELETE FROM order_items WHERE id=:id";
$prep_stmt_delete_id=$conn->prepare($q_delete_item);
$prep_stmt_delete_id->bindValue(":id", $id);
$prep_stmt_delete_id->execute();
?>
