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
                    <div class="sort-btn active"><span>Hot Drinks</span></div>
                    <div class="sort-btn"><span>Cold Drinks</span></div>
                    <div class="sort-btn"><span>Food</span></div>
                    <div class="sort-btn"><span>Snacks</span></div>
                </div>
                <div class="item-btn-container" id="hot_drinks">
                    <div class="item-btn-containergrid">

                        <?php
                        foreach($hot_drinks as $item){
                            echo "<div class='item-btn'";
                            echo "<span class='item_name'>{$item["item_name"]}</span><span class='item_price'>{$item["item_price"]}</span><span class='item_id' data-id='{$item["item_id"]}'></span><span class='item_id' data-type='{$item["item_type"]}'></span>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>
                <section class="current_order">
                    <?php
                    foreach($current_order as $item){
                        echo "<span>{$item["item_name"]}</span><span>{$item["item_price"]}</span>";
                    }
                    ?>
                </section>
            </div>
        </main>
        <script src="js.js"></script>
    </body>
</html>
