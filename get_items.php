<?php

$q_hot_drinks="SELECT products.id as item_id, products.name as item_name, price, type.name as type FROM products INNER JOIN categories ON categories.id = products.cat_id INNER JOIN type ON type.id=products.type_id WHERE categories.name='hot drinks'";
$prep_stmt_hot_drinks=$conn->prepare($q_hot_drinks);
$prep_stmt_hot_drinks->execute();
$hot_drinks=$prep_stmt_hot_drinks->fetchAll();

$q_cold_drinks="SELECT products.id as item_id, products.name as item_name, price, type.name as type FROM products INNER JOIN categories ON categories.id = products.cat_id INNER JOIN type ON type.id=products.type_id WHERE categories.name='cold drinks'";
$prep_stmt_cold_drinks=$conn->prepare($q_cold_drinks);
$prep_stmt_cold_drinks->execute();
$cold_drinks=$prep_stmt_cold_drinks->fetchAll();

$q_food="SELECT products.id as item_id, products.name as item_name, price, type.name as type FROM products INNER JOIN categories ON categories.id = products.cat_id INNER JOIN type ON type.id=products.type_id WHERE categories.name='food'";
$prep_stmt_food=$conn->prepare($q_food);
$prep_stmt_food->execute();
$food=$prep_stmt_food->fetchAll();

$q_snacks="SELECT products.id as item_id, products.name as item_name, price, type.name as type FROM products INNER JOIN categories ON categories.id = products.cat_id INNER JOIN type ON type.id=products.type_id WHERE categories.name='snacks'";
$prep_stmt_snacks=$conn->prepare($q_snacks);
$prep_stmt_snacks->execute();
$snacks=$prep_stmt_snacks->fetchAll();

?>
