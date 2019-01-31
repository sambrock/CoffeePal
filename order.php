<?php
include("model.php");

$title = "Orders";
include("header-view.php");

$hot_drinks = getProducts("Hot Drinks");
$cold_drinks = getProducts("Cold Drinks");
$food = getProducts("Food");
$snacks = getProducts("Snacks");

include("order-view.php");

include("footer-view.php");
?>
