<?php
function getConnection(){
    try{
        $conn = new PDO('mysql:host=localhost;dbname=CoffeePal', 'root', '');
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch (PDOException $exception){
        echo "Oh no, there was a problem" . $exception->getMessage();
    }
    return $conn;
}
function closeConnection($conn)
{
    $conn=null;
}
function getProducts($category){
    $conn = getConnection();
    $query = "SELECT products.id as item_id, products.name as item_name, price as item_price, type.name as item_type FROM products INNER JOIN categories ON categories.id = products.cat_id INNER JOIN type ON type.id=products.type_id WHERE categories.name = :category";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':category', $category);
    $stmt->execute();
    $products=$stmt->fetchAll();
    closeConnection($conn);
    return $products;
}
function getOrderID(){
    $conn = getConnection();
    $query="SELECT id FROM orders ORDER BY id DESC LIMIT 1";
    $stmt=$conn->prepare($query);
    $stmt->execute();
    $orderId=$stmt->fetch();
    closeConnection($conn);
    //$orderId = $order_id[0];
    return $orderId[0];
}
function addNewOrder($orderTime, $status){
    $conn = getConnection();
    $query="INSERT INTO orders(date_time,status) values(:orderTime, :status)";
    $stmt=$conn->prepare($query);
    $stmt->bindParam(":orderTime", $orderTime);
    $stmt->bindParam(":status", $status);
    $stmt->execute();
    closeConnection($conn);
}
function getCurrentOrder(){
    $conn = getConnection();
    $orderId = getOrderId();
    $query = "SELECT order_items.id as order_item_id ,orders.id as order_id, CONCAT(DAYNAME(date_time), ', ', DAY(date_time), ' ',MONTHNAME(date_time),', ', YEAR(date_time), ' - ', TIME(date_time)) as order_datetime ,products.id as item_id,products.name as item_name, order_items.price as item_price, opt_1, opt_2, opt_3, opt_4, opt_5 FROM orders INNER JOIN order_items ON order_items.order_id=orders.id INNER JOIN products ON order_items.product_id=products.id WHERE order_id = :order_id";
    $stmt=$conn->prepare($query);
    $stmt->bindValue(":order_id", $orderId);
    $stmt->execute();
    $current_order=$stmt->fetchAll();
    closeConnection($conn);
    return $current_order;
}
function getOrderDate(){
    $conn = getConnection();
    $orderId = getOrderId();
    $query = "SELECT CONCAT(DAYNAME(date_time), ', ', DAY(date_time), ' ',MONTHNAME(date_time),', ', YEAR(date_time), ' - ', TIME(date_time)) as order_datetime FROM orders WHERE id = :order_id";
    $stmt=$conn->prepare($query);
    $stmt->bindValue(":order_id", $orderId);
    $stmt->execute();
    $current_order_date=$stmt->fetch();
    closeConnection($conn);
    return $current_order_date;
}
function getOrderTotal(){
    $conn = getConnection();
    $orderId = getOrderId();
    $query = "SELECT SUM(order_items.price) as total FROM orders INNER JOIN order_items ON order_items.order_id=orders.id INNER JOIN products ON order_items.product_id=products.id WHERE orders.id = :order_id GROUP BY order_id";
    $stmt=$conn->prepare($query);
    $stmt->bindValue(":order_id", $orderId);
    $stmt->execute();
    $current_order_total=$stmt->fetch();
    closeConnection($conn);
    return $current_order_total;
}
function addNewItem($productId, $productPrice, $opt1, $opt2, $opt3, $opt4, $opt5){
    $conn = getConnection();
    $orderId = getOrderId();
    $query="INSERT INTO order_items(order_id,product_id, price, opt_1, opt_2, opt_3, opt_4, opt_5) values (:order_id, :product_id, :product_price, :opt_1, :opt_2, :opt_3, :opt_4, :opt_5)";
    $stmt=$conn->prepare($query);
    $stmt->bindValue(":order_id", $orderId);
    $stmt->bindValue(":product_id", $productId);
    $stmt->bindValue(":product_price", $productPrice);
    $stmt->bindValue(":opt_1", $opt1);
    $stmt->bindValue(":opt_2", $opt2);
    $stmt->bindValue(":opt_3", $opt3);
    $stmt->bindValue(":opt_4", $opt4);
    $stmt->bindValue(":opt_5", $opt5);
    $stmt->execute();
    closeConnection($conn);
}
function deleteOrderItem($id){
    $conn = getConnection();
    $query="DELETE FROM order_items WHERE id=:id";
    $stmt=$conn->prepare($query);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    closeConnection($conn);
}
function cancelOrder($id){
    $conn = getConnection();
    $query1="DELETE FROM order_items WHERE order_id=:order_id";
    $stmt1=$conn->prepare($query1);
    $stmt1->bindValue(":order_id", $id);
    $stmt1->execute();
    $query2="DELETE FROM orders WHERE id=:order_id";
    $stmt2=$conn->prepare($query2);
    $stmt2->bindValue(":order_id", $id);
    $stmt2->execute();
    closeConnection($conn);
}
function processOrder($status, $orderTime, $orderId){
    $conn = getConnection();
    $query = "UPDATE orders SET status = :status, date_time = :order_time WHERE id=:order_id";
    $stmt=$conn->prepare($query);
    $stmt->bindValue(":status", $status);
    $stmt->bindValue(":order_time", $orderTime);
    $stmt->bindValue(":order_id", $orderId);
    $stmt->execute();
    closeConnection($conn);
}
function getPendingOrderIds(){
    $conn = getConnection();
    $query = "SELECT orders.id as order_id, date_time as order_time FROM orders WHERE status = 'Pending' ORDER BY id ASC";
    $stmt=$conn->prepare($query);
    $stmt->execute();
    $pending_order_ids=$stmt->fetchAll();
    closeConnection($conn);
    return $pending_order_ids;
}
function getPendingOrderItems(){
    $conn = getConnection();
    $query = "SELECT orders.id as order_id, products.id as item_id, products.name, opt_1, opt_2, opt_3, opt_4, opt_5, opt_6, products.name as item_name FROM orders INNER JOIN order_items ON order_items.order_id=orders.id INNER JOIN products ON order_items.product_id=products.id WHERE status = 'Pending' ";
    $stmt=$conn->prepare($query);
    $stmt->execute();
    $pending_order_items=$stmt->fetchAll();
    closeConnection($conn);
    return $pending_order_items;
}
function getOrderStatus(){
    $conn = getConnection();
    $orderId = getOrderId();
    $query="SELECT status FROM orders WHERE id = :order_id";
    $stmt=$conn->prepare($query);
    $stmt->bindValue(":order_id", $orderId);
    $stmt->execute();
    $status=$stmt->fetch();
    closeConnection($conn);
    return $status;
}
function timeSinceOrder($orderTime){
    date_default_timezone_set('Europe/London');

    $date1 = $orderTime;
    $date2 = date("Y-m-d H:i:s");

    $date1Timestamp = strtotime($date1);
    $date2Timestamp = strtotime($date2);

    $interval = $date2Timestamp - $date1Timestamp;

    return $interval;
}
function timeFormat($interval){
    $time = gmdate("i:s", $interval);
    return $time;
}
function getAllEmployees(){
    $conn = getConnection();
    $query="SELECT *, employees.id AS user_id, roles.role_name AS role FROM employees INNER JOIN roles ON employees.role_id=roles.id";
    $stmt=$conn->prepare($query);
    $stmt->execute();
    $allEmployees=$stmt->fetchAll();
    closeConnection($conn);
    return $allEmployees;
}
function getLogin($id){
    $conn = getConnection();
    $query="SELECT * FROM employees WHERE id = :id";
    $stmt=$conn->prepare($query);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $login=$stmt->fetch();
    closeConnection($conn);
    return $login;
}
?>
