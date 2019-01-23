<?php
include("db_conn.php");
include("get_items.php");
include("current_order.php");
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
        <header>
            <img src="img/logo.svg" height="70">
        </header>
        <main>
            <div class="container">
                <div class="sort-btn-container">
                    <div class="sort-btn active" id="hot-drinks-btn"><span>Hot Drinks</span></div>
                    <div class="sort-btn" id="cold-drinks-btn"><span>Cold Drinks</span></div>
                    <div class="sort-btn" id="food-btn"><span>Food</span></div>
                    <div class="sort-btn" id="snacks-btn"><span>Snacks</span></div>
                </div>
                <div class="products" id="hot_drinks">
                    <div class="item-btns-container" id="hot-drinks">
                        <?php
                        foreach($hot_drinks as $item){
                            echo "<div class='item-btn'>";
                            echo "<span class='item-name'>{$item["item_name"]}</span><span class='item-price'>£{$item["item_price"]}</span><span class='item-id' data-id='{$item["item_id"]}'></span><span class='item-type' data-type='{$item["item_type"]}'></span>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <div class="item-btns-container" id="cold-drinks">
                        <?php
                        foreach($cold_drinks as $item){
                            echo "<div class='item-btn'>";
                            echo "<span class='item-name'>{$item["item_name"]}</span><span class='item-price'>£{$item["item_price"]}</span><span class='item-id' data-id='{$item["item_id"]}'></span><span class='item-type' data-type='{$item["item_type"]}'></span>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <div class="item-btns-container" id="food">
                        <?php
                        foreach($food as $item){
                            echo "<div class='item-btn'>";
                            echo "<span class='item-name'>{$item["item_name"]}</span><span class='item-price'>£{$item["item_price"]}</span><span class='item-id' data-id='{$item["item_id"]}'></span><span class='item-type' data-type='{$item["item_type"]}'></span>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <div class="item-btns-container" id="snacks">
                        <?php
                        foreach($snacks as $item){
                            echo "<div class='item-btn'>";
                            echo "<span class='item-name'>{$item["item_name"]}</span><span class='item-price'>£{$item["item_price"]}</span><span class='item-id' data-id='{$item["item_id"]}'></span><span class='item-type' data-type='{$item["item_type"]}'></span>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>

                <div class="current_order">
                    <?php
                    foreach($current_order as $item){
                        echo "<span>{$item["item_name"]}</span><span>{$item["item_price"]}</span>";
                    }
                    ?>
                </div>
            </div>
        </main>
        <script src="js.js"></script>
    </body>
</html>
