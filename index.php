<?php
if(!isset($_SESSION))
{
session_start();
}


//Login to DB
require_once "classes/DBAccess.php";
include "templates/connectSQL.php";


ob_start();

//var_dump( ini_get('output_buffering') ); 
//Get 5 featured products
$sql = "select itemId, itemName, photo, price, salePrice, description from item where item.featured = 1 LIMIT 5";
$rows = $db->executeSQL($sql);

//Load Template
include_once "components/home.html.php";



$output = ob_get_clean();

//Set title and bring in layout
$title = "Sports Warehouse - Home";
include_once "components/layout.html.php";

$db->disconnect();
?>