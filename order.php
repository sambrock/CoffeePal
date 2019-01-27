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
                            echo "<div class='item-btn' data-item-name='{$item["item_name"]}' data-item-price='{$item["item_price"]}' data-id='{$item["item_id"]}' data-type='{$item["item_type"]}'>";
                            echo "<span class='item-name' >{$item["item_name"]}</span><span class='item-price' >£{$item["item_price"]}</span>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <div class="item-btns-container" id="cold-drinks">
                        <?php
                        foreach($cold_drinks as $item){
                            echo "<div class='item-btn' data-item-name='{$item["item_name"]}' data-item-price='{$item["item_price"]}' data-item-id='{$item["item_id"]}' data-item-type='{$item["item_type"]}'>";
                            echo "<span class='item-name' >{$item["item_name"]}</span><span class='item-price' >£{$item["item_price"]}</span>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <div class="item-btns-container" id="food">
                        <?php
                        foreach($food as $item){
                            echo "<div class='item-btn' data-item-name='{$item["item_name"]}' data-item-price='{$item["item_price"]}' data-id='{$item["item_id"]}' data-type='{$item["item_type"]}'>";
                            echo "<span class='item-name' >{$item["item_name"]}</span><span class='item-price' >£{$item["item_price"]}</span>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <div class="item-btns-container" id="snacks">
                        <?php
                        foreach($snacks as $item){
                            echo "<div class='item-btn' data-item-name='{$item["item_name"]}' data-item-price='{$item["item_price"]}' data-id='{$item["item_id"]}' data-type='{$item["item_type"]}'>";
                            echo "<span class='item-name' >{$item["item_name"]}</span><span class='item-price' >£{$item["item_price"]}</span>";
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
                        <div class="option-item-header">
                            <span id="option-item-name" data-item-id=""></span>
                            <span id="option-item-price" data-item-price=""></span>
                            <button id="add-btn">Add</button>
                        </div>
                        <div class="option-list"></div>
                        <div class="option" id="size">
                            <div class="option-header">Size:</div>
                            <div class="option-inputs">
                                <div class="size-btn active" data-size="small" data-price="0" data-option-name="Small"><i class="fas fa-coffee" id="small-size"></i></div>
                                <div class="size-btn" data-size="medium" data-price="0.20" data-option-name="Medium"><i class="fas fa-coffee" id="medium-size"></i></div>
                                <div class="size-btn" data-size="large" data-price="0.40" data-option-name="Large"><i class="fas fa-coffee" id="large-size"></i></div>
                            </div>
                        </div>
                        <div class="option-header">Add-ins:</div>
                        <div class="option" id="add-ins">
                            <div class="option-inputs">
                                <label>Splash of cream:
                                    <select class="option-add-in" id="cream">
                                        <option value="0" hidden>Select</option>
                                        <option value="1" data-option-name="Extra Splash of Cream" data-price="0">Extra Splash of Cream</option>
                                        <option value="2" data-option-name="Light Splash of Cream" data-price="0">Light Splash of Cream</option>
                                        <option value="3" data-option-name="Splash of Cream" data-price="0">Splash of Cream</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="option" id="add-ins">
                            <div class="option-inputs">
                                <label>Splash of milk:
                                    <select class="option-add-in" id="milk">
                                        <option value="0" hidden>Select</option>
                                        <option value="1" data-option-name="Extra Splash of Milk" data-price="0">Extra Splash of Milk</option>
                                        <option value="2" data-option-name="Light Splash of Milk" data-price="0">Light Splash of Milk</option>
                                        <option value="3" data-option-name="Splash of Milk" data-price="0">Splash of Milk</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script src="js.js"></script>
    </body>
</html>
