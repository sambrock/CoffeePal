<?php
include("models/model.php");

$title = "Orders";
include("views/header-view.php");

$hot_drinks = getProducts("Hot Drinks");
$cold_drinks = getProducts("Cold Drinks");
$food = getProducts("Food");
$snacks = getProducts("Snacks");

include("views/order-view.php");

include("views/footer-view.php");
?>
