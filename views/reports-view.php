<?php
require_once("models/model.php");

if($time=="d"){
    $msg = "Daily";
}elseif($_POST["time"]=="w"){
    $msg = "Weekly";
}


?>
<div id="reports-wrapper">
    <div id="select-box">
        <form name="time" method="POST">
            <select name="time" id="time-select">
                <option value="d">Daily</option>
                <option value="w">Weekly</option>
            </select>
            <button type="submit" id="time-btn">Submit</button>
        </form>
    </div>
    <div id="reports-container">
        <div id="summary">
            <h2><?php echo $msg; ?> products summary:</h2>
            <div class="tbl-summary-headings">
                <span>Name</span>
                <span>Sold</span>
                <span>Total</span>
            </div>
            <div class="tbl-summary-div">
                <table id="tbl-summary">
                    <?php
                    foreach($products as $product){
                        echo "<tr>";
                        echo "<td>{$product["product_name"]}</td>";
                        echo "<td>{$product["sold"]}</td>";
                        echo "<td>£{$product["total"]}</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
        <div class="procucts-sold" id="best-products">
            <h2><?php echo $msg; ?> best selling products:</h2>
            <div class="tbl-best-sold-headings">
                <span>#</span>
                <span>Name</span>
                <span>Sold</span>
            </div>
            <div class="tbl-best-sold-div">
                <table id="tbl-best-sold">
                    <?php
                    $rank = 0;
                    foreach($bestProducts as $product){
                        echo "<tr>";
                        $rank++;
                        echo "<td>$rank</td>";
                        echo "<td>{$product["product_name"]}</td>";
                        echo "<td>{$product["sold"]}</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div id="stats">
        <div class="stat-box">
            <h2><?php echo $msg; ?> total: </h2>
            <span>£<?php echo $total["total"]; ?></span>
        </div>
    </div>
</div>
