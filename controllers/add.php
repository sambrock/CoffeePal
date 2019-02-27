<?php
require_once("../models/model.php");

$productId = $_POST["id"];
$productPrice = $_POST["price"];
$opt1 = $_POST["opt_1"];
$opt2 = $_POST["opt_2"];
$opt3 = $_POST["opt_3"];
$opt4 = $_POST["opt_4"];
$opt5 = $_POST["opt_5"];

addNewItem($productId, $productPrice, $opt1, $opt2, $opt3, $opt4, $opt5);
?>
