<?php
if(!isset($_SESSION))
{
    session_start();
   
}
     include_once "../classes/ShoppingCart.php";
     $cart = null;
     $cartCounter = 0;
     $showCart = false;
     $wideCart = false;
     $curPageName =  trim(substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1));

     if(isset($_SESSION)){
        if(isset($_SESSION["showCart"])){
            $showCart = unserialize($_SESSION["showCart"]);
            if($curPageName === "checkout.php"){
                $showCart = false;
                $_SESSION["showCart"] = serialize(false);
            }else {           
                if($curPageName === "cart.php"){
                $showCart = true;
                $wideCart = true;
            }
        
         if(isset($_SESSION["cart"]) && $showCart === true){
             $cart = unserialize($_SESSION["cart"]);
         }
         if($cart !== null){
           
            $cartItems = $cart->getItems();
            $cartCounter = count($cartItems);          
         }
            }
        }
     }elseif($curPageName === "cart.php"){
        $showCart = true;
        $wideCart = true;
    }
   
  

?>
<!-- CART -->
<?php if($showCart): ?>
    <?php if($cartCounter > 0): ?>
        <?php if($wideCart === true): ?>
        <section class="site-main__cart-wide">
        <?php else: ?>
        <section class="site-main__cart">
        <form method="post" id="cartElementForm">
            <div class="site-main__cart-close">
            <input type="hidden" name="headerCartButton" value="<?=$showCart ?>">
                                    
            <button class="is-button-delete" type="submit" name="headerCartButton" id="cartElementFormSubmit" ><i class="fa-solid fa-xmark is-mr-5 fa-lg"></i>Close</button>
            </div>   
        </form>
        <?php endif; ?>
    
      
        <p>Cart</p>
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
                <p>$<?=$priceActual?></p>    
                    <label for="cartCard<?=$itemId?>">Quantity:</label>
                    <input  id="cartCard<?=$itemId?>" onchange="updateItem(<?=$itemId?>)" type="number"  min="1" max="99" value="<?=$quantity?>"/> 
                    <div class="site-main__cart__card-buttons">
                        <a id="cartCardUpdate<?=$itemId?>" class="is-button-delete" type="button" rel="noreferrer" href="cart.php?updateId=<?=$itemId?>&updateAmount=<?=$quantity?>" >Update</a>
                        <a class="is-button-delete" type="button" rel="noreferrer"  href="cart.php?removeId=<?=$itemId?>">Remove</a>
                    </div>             
            </div>
        </div>

    <?php endforeach; ?>
        </div>

        <hr>
        <h4>Total: $<?=$sumTotal?></h4>
        <?php 
                $validShip = false;
            if(isset($_SESSION["validShipping"])){
                $validShip = unserialize($_SESSION["validShipping"]);
            } 
        ?>
        <?php if($curPageName === "cart.php"): ?>
            <?php if($validShip):?>
            <a href="checkout.php" rel="noreferrer" aria-label="Go to Checkout" class="is-button-positive">Checkout</a>
            <?php else: ?>
                <a href="shipping.php" rel="noreferrer" aria-label="Go to Shipping Details" class="is-button-positive">Shipping Details</a>
            <?php endif; ?>
        <?php else: ?>
            <a href="cart.php" rel="noreferrer" aria-label="View Cart" class="is-button-positive">View Details</a>
            <?php if($validShip):?>
            <a href="checkout.php" rel="noreferrer" aria-label="Go to Checkout" class="is-button-positive">Checkout</a>
            <?php else: ?>
                <a href="shipping.php" rel="noreferrer" aria-label="Go to Shipping Details" class="is-button-positive">Shipping Details</a>
            <?php endif; ?>
        <?php endif; ?>
      
    </section>
    <?php else: ?>
        <?php if($wideCart === true): ?>
        <section class="site-main__cart-wide">
        <?php else: ?>
        <section class="site-main__cart">
        <?php endif; ?>
        <h4>Cart</h4>
        <p>No Items in Cart.</p>
        </section>
    <?php endif; ?>
<?php endif; ?>
<script>
    function updateItem(id){       
        var amount = document.getElementById('cartCard' + id).value;
        var url =document.getElementById('cartCardUpdate' + id);
        url.setAttribute("href","cart.php?updateId=" + id + "&updateAmount=" +amount);
    }
    </script>