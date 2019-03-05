<?php
session_start();
if($_SESSION["id"]==1){
    include("models/model.php");

    $title = "Reports";
    include("views/header-view.php");

    if(!isset($_POST["time"])){
        $time = "d";
    }else{
        $time = $_POST["time"];
    }
    $products = getAllProductsSold($time);
    $bestProducts = getProductsSold($time);
    $total = getTotalSold($time);

    include("views/reports-view.php");

    include("views/footer-view.php");
}else{
    header("location: index.php");
}
?>
