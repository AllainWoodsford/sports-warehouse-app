<?php

if(!isset($_SESSION))
 {
 session_start();
 }

$itemId =($_GET["itemId"]);
$heading = "Inspect Product";
if($itemId === null){
    $itemId = 0;
}
//Login to DB
require_once "./classes/DBAccess.php";
include "templates/connectSQL.php";
$sql = "select itemId, itemName, photo, price, salePrice, description from item where itemId = :id limit 1";
//An All Products link has been pressed 
include_once "./classes/ShoppingCart.php";
ob_start();
try {
    $statement = $db->prepareStatement($sql,':id',$itemId,2);
    $rows = $statement->fetchAll();
    //Some SQL
    if(isset($_POST["addToCart"])){
        //get data
       
        $quantity = $_POST["productQuantity"] ?? 0; //trim and set tolower
        $itemId = $_POST["addToCart"] ?? 0;
    
        if($quantity === 0){
            //failure
            $errorMessage = "Something went wrong adding item to cart! Try again later";
        } else {
            
            $row = $rows[0];
    
            try {
              
                //want to create an item add it to existing shoppingOrder if existing or append
                //to a new order
                
                $itemCart = null;
                if(! isset($_SESSION["cart"])){
                    $itemCart = new ShoppingCart();
    
                } else {
                    $itemCart = unserialize($_SESSION["cart"]);
                }
    
                if(  $itemCart === null){
                    //Something wrong with creating the cart I guess or fetching from session
                    $errorMessage = "Something went wrong adding item to cart! Try again later";
                } else {
                    //we are good to add the product here
                    $price = $row["price"];
                    if($row["salePrice"] > 0){
                        $price = $row["salePrice"];
                    }
                      //$itemName, $quantity, $price, $productID
                    $item = new CartItem($row["itemName"] ,$quantity ,$price  ,$itemId, $row["photo"]);
                    $itemCart->addItem($item);
                 
                    $_SESSION["cart"] =  serialize($itemCart);
                    $successMessage = "added " . $row["itemName"].  " x " . $quantity . " to cart!";
                    unset($_POST["addToCart"]);
                }
    
               
            } catch (Exception $e) {
                $errorMessage = "Something went wrong adding item to cart! Try again later";
            }
         
    
        }
       
    }
    

} catch(Exception $e) {
    $errorMessage = "something went wrong!";
}


include_once "./components/inspectProduct.html.php";

//Output
$output = ob_get_clean();
$title = "Sports Warehouse - View Item";
include_once "./components/layout.html.php";
?>