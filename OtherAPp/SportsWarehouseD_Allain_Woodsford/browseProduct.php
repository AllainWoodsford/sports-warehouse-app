<?php
$categoryId =($_GET["categoryId"]);
$heading = "Browse " . htmlspecialchars(($_GET["categoryName"]));
if($categoryId === null){
    $categoryId = 0;
}
//Login to DB
require_once "classes/DBAccess.php";
include "templates/connectSQL.php";
$sql = "select itemId, itemName, photo, price, salePrice, description from item where item.categoryId = :id limit 30";
//An All Products link has been pressed 
if($categoryId == -1){
    $sql = "select itemId, itemName, photo, price, salePrice, description from item limit 50";
}

ob_start();
if($categoryId != -1){
    $statement = $db->prepareStatement($sql,':id',$categoryId,2);
} else {

    $statement = $db->runStatement($sql);
}



$rows = $statement->fetchAll();
//Some SQL

include_once "components/browse.html.php";
$output = ob_get_clean();
$title = "Sports Warehouse - Products";
include_once "components/layout.html.php";
$db->disconnect();
?>