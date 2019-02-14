<?php
include("../models/model.php");
$pendingOrderIds = getPendingOrderIds();
$pendingOrderItems = getPendingOrderItems();

function countOrders($pendingOrderIds){
    $count = count($pendingOrderIds);
    if($count==1){
        $countTxt = $count." order";
        return $countTxt;
    }else{
        $countTxt = $count." orders";
        return $countTxt;
    }
}
?>
<div class="current-order-header">
    <h2>Pending Orders</h2>
    <div id="pending-orders-count"><?php echo countOrders($pendingOrderIds); ?></div>
</div>
<div id="pending-orders-list">
    <?php
    foreach($pendingOrderIds as $orderId){
        echo "<div class='pending-order'>";
        echo "<div class='pending-order-header'>";
        echo "<span class='pending-order-id'>Order #{$orderId["order_id"]}</span>";
        //Get time difference
        $orderTime = $orderId["order_time"];
        $interval = timeSinceOrder($orderTime);
        echo "<span class='pending-order-time'>$interval</span>";
        echo "</div>";
        foreach($pendingOrderItems as $orderItem){
            if($orderId["order_id"] == $orderItem["order_id"]){
                echo "<div class='pending-order-item'>";
                echo "<span class='pending-order-item-name'>{$orderItem["item_name"]}</span>";
                if($orderItem["opt_1"]!=null){
                    echo "<span class='pending-order-item-option'>+ {$orderItem["opt_1"]}</span>";
                }
                if($orderItem["opt_2"]!=null){
                    echo "<span class='pending-order-item-option'>+ {$orderItem["opt_2"]}</span>";
                }
                if($orderItem["opt_3"]!=null){
                    echo "<span class='pending-order-item-option'>+ {$orderItem["opt_3"]}</span>";
                }
                if($orderItem["opt_4"]!=null){
                    echo "<span class='pending-order-item-option'>+ {$orderItem["opt_4"]}</span>";
                }
                if($orderItem["opt_5"]!=null){
                    echo "<span class='pending-order-item-option'>+ {$orderItem["opt_5"]}</span>";
                }
                echo "</div>";
            }
        }
        echo "<div class='done-btn-div'><button class='done-btn' data-pending-order-id='{$orderId["order_id"]}'>Done</button></div>";
        echo "</div>";
    }
    ?>
</div>
