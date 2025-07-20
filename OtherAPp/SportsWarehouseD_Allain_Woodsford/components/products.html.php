<?php 
     include "components/error.html.php";
?>
<section class="site-main__products" aria-description="search results will appear below" aria-label="search results">
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

<article id="product-<?=$prodId?>" aria-label='Product <?=$productName?>'  class="site-main__products__card">
<a aria-label="View <?=$productName?> in more detail" href="inspectProduct.php?itemId=<?=$prodId?>" rel="noreferrer">   
<img  onerror="this.src='assets/images/notFound.png';" loading="lazy" class="site-main__products__card-img" src="assets/images/<?= $photo ?>" alt="<?=$description?>" >
    <div class="site-main__products__card__textBlock">
        <?php if($salePrice > 0): ?>
            <!--PRODUCT CARD WITH SALE -->
             <p><span class="is-orange">$<?=$salePrice?><br class="is-hidden-lg"></span><span class="site-main__products__card__textBlock-text"> WAS</span> 
            <span class="site-main__products__card__textBlock-textDecorated">$<?=$price?></span></p>  
        <?php else : ?>
            <!--PRODUCT CARD NO SALE -->
            <p>$<?= $price ?></p>    
        <?php endif; ?>
    </div>
    <p class="site-main__products__card__productName"><?=$productName?></p>
    </a>
</article>
<?php endforeach; ?>
<?php endif ?>
</section>