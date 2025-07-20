<?php
if(!isset($_SESSION))
{
    session_start();
   
}
     include_once "../classes/ShoppingCart.php";
     $cart = null;
     $cartCounter = 0;  
     if(isset($_SESSION)){
         if(isset($_SESSION["cart"])){
             $cart = unserialize($_SESSION["cart"]);
         }
         if($cart !== null){      
            $cartItems = $cart->getItems();
            $cartCounter = count($cartItems);          
         }
    }
?>
<!-- CART -->
    <?php if($cartCounter > 0): ?>
        <section class="site-main__cart-narrow">
        <p>Cart (<?=$cartCounter?> items)</p>
        <div class="site-main__cart__wrapper">         
    <?php 
    $sumTotal = 0;
    foreach($cartItems as $item): 
        $itemName = $item->getItemName();
        $price = $item->getPrice();
        $quantity = $item->getQuantity();
        $itemId = $item->getItemId();
        $photo = $item->getPhoto();
        $priceActual = $price * $quantity;
        $sumTotal += $priceActual;
    ?>
        
        <div class="site-main__cart__card">
            <img  onerror="this.src='assets/images/notFound.png';" src="assets/images/<?=$photo?>" alt="picture of <?=$itemName?>"/>
            <div>
                <p><?=$itemName?></p> 
                <?php if($quantity > 1): ?>
                    <p>price per item $<strong><?=$price?></strong></p>
                    <p>Quantity: <em>x<?=$quantity?></em></p>  
                    <hr>
                    <p>Subtotal: <strong>$<?=$priceActual?></strong></p>
                <?php else: ?>
                    <p>price <strong>$<?=$priceActual?></strong></p>
                <?php endif; ?>     
            </div>
        </div>

    <?php endforeach; ?>
        </div>
        <hr>
        <h4>Total: $<?=$sumTotal?></h4>
        <a href="cart.php" rel="noreferrer" aria-label="Go back to cart" class="is-button-positive">Go back to Cart</a>
    </section>
    <?php else: ?>
        <section class="site-main__cart-narrow">
        <h4>Cart</h4>
        <p>No Items in Cart.</p>
        </section>
    <?php endif; ?>