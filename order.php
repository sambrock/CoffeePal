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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
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
                <div class="order-info">
                    <div class="current-order">
                        <div class="current-order-header">
                            <h2>Order Details</h2>
                            <span id="current-order-id">#<?php echo $order_id;?></span>
                            <span id="current-order-time"><?php echo $current_order[0]["order_datetime"]; ?></span>
                        </div>
                        <div id="current-order-items"></div>
                    </div>
                    <div class="order-options">
                        <div class="order-options-header">
                            <h2 id="order-item-name"></h2>
                            <span class="order-item-price">£1.80</span>
                            <button class="add-btn">Add</button>
                        </div>
                        <div class="option" id="order-size">
                            <div class="option-header">Size:</div>
                            <div class="option-inputs">
                                <div class="size-btn"><i class="fas fa-coffee" id="small-size"></i></div>
                                <div class="size-btn"><i class="fas fa-coffee" id="medium-size"></i></div>
                                <div class="size-btn"><i class="fas fa-coffee" id="large-size"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="js.js"></script>
    </body>
</html>
