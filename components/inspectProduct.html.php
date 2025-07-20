<section class="site-main__inspect-product">
    
<?php 
    include "./error.html.php";
?>
<?php 
    include "./success.html.php";
?>

<?php if(empty($rows)): ?>
    <p>No products found! please try another search </p>
<?php else: ?>
<?php foreach($rows as $row): 
 $prodId = $row["itemId"];
 $price = $row["price"];
 $salePrice = $row["salePrice"];
 if($salePrice === null){
    $salePrice = 0;
 }
 $photo = $row["photo"];
 $descripton = $row["description"];
 $productName = $row["itemName"];    
?>
    
<img  onerror="this.src='assets/images/notFound.png';" loading="lazy" class="site-main__inspect-product__details-img" src="assets/images/<?= $photo ?>" alt="<?=$description?>" />
    <div class="site-main__inspect-product__details">
        <h4><?=$productName?></h4>
        <p>***</p> 
        <form id="inspectProductForm" action="inspectProduct.php?itemId=<?=$prodId?>" method="post">
            <hr>
            <div class="site-main__inspect-product__details-quantity">
                <?php if($salePrice > 0): ?>
                <!--PRODUCT CARD WITH SALE -->
                    <p><span class="is-orange">$<?=$salePrice?><br class="is-hidden-lg"></span><span class="site-main__products__card__textBlock-text"> WAS</span> 
                    <span class="site-main__products__card__textBlock-textDecorated">$<?=$price?></span></p>  
                <?php else : ?>
                    <!--PRODUCT CARD NO SALE -->
                    <p>$<?= $price ?></p>    
                <?php endif; ?>
                <div class="site-main__inspect-product__details-quantity__inputs">
                    <label for="productQuantity">Quantity:</label>
                    <input name="productQuantity" id="productQuantity" min="1" max="99" value="1"  type="number" class="site-main__inspect-product__details-quantity__inputs-text "/>
                    <button class="is-button-positive" type="button" onclick="modifyValue(true)">+</button>
                    <button class="is-button-delete" type="button" onclick="modifyValue(false)">-</button>
                </div>

            </div>
            <hr>
            <p><?=$descripton?></p>
            <hr>
            <div class="site-main__inspect-product__details-quantity__inputs">
                <button name="addToCart" id="addToCart" type="submit" value="<?=$prodId?>" class="is-button-positive">Add To Cart</button>
                <a href="cart.php" rel="noreferrer" class="is-button-delete" aria-label="go to checkout">Go to Checkout</a>
            <div>
        </form>
    </div>
<?php endforeach; ?>
<?php endif ?>
<script>
   function modifyValue(increment)
    {
        var value = parseInt(document.getElementById('productQuantity').value, 10);
        value = isNaN(value) ? 1 : value;
        //increment if true add to number
        if(increment){
            value++;
        } else {
            value --;
            if(value <= 1){
                value = 1;
            }
        }
      
        document.getElementById('productQuantity').value = value;
    }

</script>
</section>