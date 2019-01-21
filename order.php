<?php
include("db_conn.php");
include("get_items.php");
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Orders</title>
        <link href="style/style.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
        <img src="img/logo.svg" height="70">

        <ul class="products">
            <?php
            foreach($hot_drinks as $item){
                echo "<div class='hot-drinks'>";
                echo "<div class='item'><span class='item-name'>{$item["item_name"]}<span class='prod-id' data-id='{$item["item_id"]}'></span></span><span>£{$item["price"]}</span><span class='type' hidden>{$item["type"]}</span></li>";
                echo "</div>";
            }
            foreach($cold_drinks as $item){
                echo "<div class='cold-drinks'>";
                echo "<div class='item'><span class='item-name'>{$item["item_name"]}<span class='prod-id' data-id='{$item["item_id"]}'></span></span><span>£{$item["price"]}</span><span class='type' hidden>{$item["type"]}</span></li>";
                echo "</div>";
            }
            foreach($food as $item){
                echo "<div class='cold-drinks'>";
                echo "<div class='item'><span class='item-name'>{$item["item_name"]}<span class='prod-id' data-id='{$item["item_id"]}'></span></span><span>£{$item["price"]}</span><span class='type' hidden>{$item["type"]}</span></li>";
                echo "</div>";
            }
            foreach($snacks as $item){
                echo "<div class='cold-drinks'>";
                echo "<div class='item'><span class='item-name'>{$item["item_name"]}<span class='prod-id' data-id='{$item["item_id"]}'></span></span><span>£{$item["price"]}</span><span class='type' hidden>{$item["type"]}</span></li>";
                echo "</div>";
            }
            ?>
        </ul>
        <div class="container">
            <h2>Customisations</h2>
            <div class="customisations">
                <?php

                ?>
            </div>
        </div>
        <script src="js.js"></script>
    </body>
</html>
