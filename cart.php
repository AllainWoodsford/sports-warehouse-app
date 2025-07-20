<?php

if(!isset($_SESSION))
 {
 session_start();
 }


$heading = "View Cart";

//Login to DB
require_once "./classes/DBAccess.php";
include "./templates/connectSQL.php";
include_once "./classes/ShoppingCart.php";
ob_start();

$removeID = $_GET["removeId"] ?? -1;
$updateID = $_GET["updateId"] ?? -1;
$updateAmnt = $_GET["updateAmount"] ?? 0;
if(isset($_SESSION["cart"])){
    $cart = unserialize($_SESSION["cart"]);
    $cartChanged = false;
    if($removeID !== -1 && $removeID >= 0){
        //Valid ID
        $cartItem = $cart->getCartItemById($removeID);
        if($cartItem !== null){
            $cart->removeItem($cartItem);
            $cartChanged = true;
        }     
    }
    if($updateID !== -1 && $updateAmnt > 0 && $updateID >= 0){     
        $cartItem = $cart->getCartItemById($updateID);
        if($cartItem !== null){
            $cartItemCount = $cartItem->getQuantity();
            if($updateAmnt !== $cartItemCount){              
                    $cartItem->setQuantity($updateAmnt);
                    $cart->setCartItemQuantity($cartItem);
                    $cartChanged = true;           
            }
        }
      
    }

    if($cartChanged){
        $_SESSION["cart"] = serialize($cart);
    }
}

include_once "./components/cartDetails.html.php";

//Output
$output = ob_get_clean();
$title = "Sports Warehouse - View Cart";
include_once "./components/layout.html.php";
?>