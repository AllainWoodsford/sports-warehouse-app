<?php
if(!isset($_SESSION))
{
    session_start();
   
}

include_once "components/success.html.php";
include_once "components/error.html.php";   
 
include_once "templates/getCategoriesNoLimit.php";
               


?>
<!-- CART -->
<?php if(isset($_SESSION["username"]) and !empty($rows)): ?>
    <section class="site-main__cart-wide">
    <h2><span class="is-blue">Manage <span class="is-orange">Products:</span></span></h2>
    <div class="site-main__checkout"> 
        <div class="site-main__checkout__column">   
    <div class="site-main__cart__wrapper"> 
               <!-- Loop for category items -->      
        <?php 

            foreach($rows as $row): 
            $itemId = $row["itemId"];
            $price = $row["price"];
            $salePrice = $row["salePrice"];
            if($salePrice === null){
               $salePrice = 0;
            }
            $photo = $row["photo"];
            $description = $row["description"];
            $productName = $row["itemName"]; 
            $featured = $row["featured"]; 
            $categoryId = $row["categoryId"];
            $categoryName = $row["categoryName"]; 
        ?>
        <article class="site-main__cart__card">
   
        <div class="site-main__checkout__column__sub">
                <img onerror="this.src='assets/images/notFound.png';" loading="lazy" class="site-main__products__card-img" src="assets/images/<?= $photo ?>" alt="<?=$description?>" >
                <p><strong>ID:<span id="itemObjectID-<?=$itemId?>"><?=$itemId?></span>:</strong></p> 
                <p><strong>Name:<span id="itemObjectName-<?=$itemId?>"> <?=$productName?></span>:</strong></p> 
                <p><strong>Category:<span id="itemObjectCategoryName-<?=$itemId?>"><?=$categoryName?></span>:</strong></p> 
                <p class="is-hidden">CategoryId:<span id="itemObjectCategoryID-<?=$itemId?>"><?=$categoryId?></span></p>
                <p><strong>Price:<span id="itemObjectPrice-<?=$itemId?>"><?=$price?></span>:</strong></p> 
                <p><strong>Sale price:<span id="itemObjectSalePrice-<?=$itemId?>"><?=$salePrice?></span>:</strong></p>
                <p><strong>Photo path:<span id="itemObjectPhotoPath-<?=$itemId?>"><?=$photo?></span>:</strong></p> 
                <p><strong>Featured?:<span id="itemObjectFeatured-<?=$itemId?>"><?=$featured?></span>:</strong></p> 
                <hr> 
                <p><strong>Description:<span id="itemObjectDescription-<?=$itemId?>"><?=$description?></span>:</strong></p> 
                <hr>
                    <div class="site-main__cart__card-buttons">
                        <button onclick="updateManageProduct(<?=$itemId?>)" id="cartCardUpdate<?=$itemId?>" class="is-button-positive" type="button" aria-label="fills out form for this product <?=$productName?> so you can edit it">Edit Product</button>
                    </div>             
        </div>
        </article>
        <?php endforeach; ?>
        </div>
            </div>
                <div class="site-main__checkout__column">
                <h2><span id="manageFormAction"class="is-blue">Adding a Product</span></h2>
                <p aria-label="instructions" class="site-main__branding__wrapper-text"><em>Click items in the left to edit existing ones, or use the form as is to add new ones</em></p>     
        <form id="manageProductForm" class="site-main__input__form" action="manageProducts.php" method="post">
            <div class="site-main__input__form__wrapper">
                       
                <fieldset>
                    <legend><u>Product details:</u></legend> 
                    <div class="site-main__input__form_wrapper__groupedInput">
                        <input aria-label="hidden its the product id in the database" type="hidden" id="productID" value="" name="productID" >
                        <input aria-label="hidden its the category id in the database" type="hidden" id="prodCategoryID" value="" name="prodCategoryID" >
                        <input aria-label="hidden its what the form will do" type="hidden" id="formMode" value="add" name="formMode" >
                    <label for="prodTitle">Product title:</label>
                        <input  max="100" aria-label="name of the product" value="" required id="prodTitle" type="text" name="prodTitle" placeholder="Enter Product Title"> 

                    <label for="prodDescription">Product description:</label>
                        <textarea  style="resize:none;" aria-label="product description" value=""  id="prodDescription"  name="prodDescription" placeholder="Enter Product Description" rows = "10" cols = "20" ></textarea>    
                    <label for="photoPath">Photopath:</label>
                        <input  aria-label="enter product photo path in assets" value="" id="photoPath" type="text"  name="photoPath" placeholder="Enter Photograph Path">     
                    <label for="featured">Featured:</label>
                        <input aria-label="featured is either 1 or 0, 1 is featured yes" value="" id="featured" type="number" min="0" max="1"  name="featured" placeholder="Enter 1 featrued or 0 not featured">
                    <label for="salePrice">Sale Price:</label>
                        <input aria-label="sale price to display an item on sale" value="" id="salePrice" type="number" min="0" max="" step="0.01"   name="salePrice" placeholder="Enter Sale Price">          
                    <label for="Price">Price:</label>
                        <input aria-label="items actual price" value="" id="Price" type="number" min="1"  step="0.01"   name="Price" placeholder="Enter Price"> 
                    <?php 
                        include_once "templates/getCategoriesNoLimit.php";
                        if(!empty($categoryRows)):
                    ?>
                    <label for="prodCategory">Category:</label>
                        <select onchange="updateCategorySelection()" id="prodCategory" type="select" value="" name="prodCategory" placeholder="Choose your items category for search">
                        <option selected="selected" name="catOption0" id="catOption0" value="0">None</option>
                    <?php
                        $index = 0;
                        foreach ($categoryRows as $catRow):
                            $catID = $catRow["categoryId"];
                            $catName = $catRow["categoryName"];
                            $index ++;
                    ?>
                    <option name="catOption<?=$catID?>" id="catOption<?=$index?>" value="<?=$catID?>"><?=$catName?></option>
                    <?php endforeach;?>
                        </select>
                    <?php endif; ?>                  
                </fieldset>
                    <div class="site-main__input__form__wrapper__submit is-mt-10">
                    <button onclick="resetForm()" type="button" class="is-hidden site-main__input__form__wrapper__submit-btn" id="cancelEditting" name="cancelEditting" value="cancelEditting">Cancel Editting</button>
                    <button onclick="markForDeletion()" type="button" class="is-hidden site-main__input__form__wrapper__submit-btn" id="deleteItemBtn" name="deleteItemBtn" value="deleteItemBtn">Delete Item</button>
                    <button type="submit" class="site-main__input__form__wrapper__submit-btn" id="submitManageProduct" name="submitManageProduct" value="submitManageProduct">Manage Product</button>
                    </div>
                </div>       
            </form>
                </div>
            </div>
    </section>
<?php else: ?>
<p>please <a href="login.php" rel="noreferrer"><span class="is-blue">Login</span></a></p>
<?php endif; ?>
<script>
        function markForDeletion(){
            document.getElementById('formMode').value = "delete" ;
            var prodTitle = document.getElementById('prodTitle').innerText;
            document.getElementById('manageFormAction').innerText = "Deleting " + prodTitle;  
            document.getElementById('deleteItemBtn').setAttribute("class","is-hidden site-main__input__form__wrapper__submit-btn") ; 
            document.getElementById('manageProductForm').setAttribute("class","is-grey-bg  site-main__input__form") ; 
            document.getElementById('submitManageProduct').innerText = "Delete Product";                
            //Disable Form Elements
          
            var prodTitle =document.getElementById('prodTitle').readOnly = true;       
            var prodCategory =document.getElementById('prodCategory').readOnly = true;    
            var prodDesc =document.getElementById('prodDescription').readOnly = true;       
            var prodPhoto =document.getElementById('photoPath').readOnly = true;       
            var salePrice =document.getElementById('salePrice').readOnly = true;
            var prodCategory =document.getElementById('prodCategory').readOnly = true;  
            var price =document.getElementById('Price').readOnly = true;   
            var featured =document.getElementById('featured').readOnly = true;       
        }

        function enableFormElements(){
            var prodTitle =document.getElementById('prodTitle').readOnly = false;       
            var prodCategory =document.getElementById('prodCategory').readOnly = false;    
            var prodDesc =document.getElementById('prodDescription').readOnly = false;       
            var prodPhoto =document.getElementById('photoPath').readOnly = false;       
            var salePrice =document.getElementById('salePrice').readOnly = false;
            var prodCategory =document.getElementById('prodCategory').readOnly = false;    
            var price =document.getElementById('Price').readOnly =false;   
            var featured =document.getElementById('featured').readOnly = false;       
        }

        function updateCategorySelection(){
            var categoryObject = document.getElementById('prodCategoryID');
            var selectionObject = document.getElementById('prodCategory');
            var selectionValue =  document.getElementById('catOption' + selectionObject.selectedIndex);
            categoryObject.value = selectionValue.value;
            
          
        }
        function updateManageProduct(id){
         
            enableFormElements();
               //Get item from database values
            var itemObjectID = document.getElementById('itemObjectID-' + id).innerText;       
            var itemObjectName = document.getElementById('itemObjectName-' + id).innerText;
            var itemObjectPrice = document.getElementById('itemObjectPrice-' + id).innerText;
            var itemObjectSalePrice = document.getElementById('itemObjectSalePrice-' + id).innerText;       
            var itemObjectPhotoPath = document.getElementById('itemObjectPhotoPath-' + id).innerText;
            var itemObjectFeatured = document.getElementById('itemObjectFeatured-' + id).innerText;
            var itemObjectDescription = document.getElementById('itemObjectDescription-' + id).innerText;
            var itemObjectCategoryName = document.getElementById('itemObjectCategoryName-' + id).innerText;
            var itemObjectCategoryID = document.getElementById('itemObjectCategoryID-' + id).innerText;
            document.getElementById('submitManageProduct').innerText = "Manage Product";                      
            //Get Form Elements
            document.getElementById('manageFormAction').innerText = "Editing Product" + itemObjectName; 
            document.getElementById('formMode').value = "edit" ;  
            document.getElementById('cancelEditting').setAttribute("class","site-main__input__form__wrapper__submit-btn") ;     
            var prodID = document.getElementById('productID').setAttribute("value", itemObjectID);       
            var prodTitle =document.getElementById('prodTitle').setAttribute("value", itemObjectName);       
            var prodCategory =document.getElementById('prodCategory');    
            var prodDesc =document.getElementById('prodDescription').value = itemObjectDescription;       
            var prodPhoto =document.getElementById('photoPath').setAttribute("value", itemObjectPhotoPath);       
            var salePrice =document.getElementById('salePrice');
            salePrice.setAttribute("value", itemObjectSalePrice); 
            salePrice.setAttribute("max", itemObjectPrice);      
            var price =document.getElementById('Price').setAttribute("value", itemObjectPrice);   
            var featured =document.getElementById('featured').setAttribute("value", itemObjectFeatured);        
            document.getElementById('deleteItemBtn').setAttribute("class","site-main__input__form__wrapper__submit-btn") ;         
            document.getElementById('prodCategoryID').value = itemObjectCategoryID; 
            for(let i = 0; i <  prodCategory.options.length; i++){
               opt = document.getElementById('catOption' + i);
             
               if(opt.value === itemObjectCategoryID ){
                prodCategory.selectedIndex = i;
                    break;
               }
            }
            document.getElementById('manageProductForm').setAttribute("class","site-main__input__form") ;                 
        }
        function resetForm(){
            enableFormElements();
            var prodID = document.getElementById('productID').setAttribute("value", "");       
            var prodTitle =document.getElementById('prodTitle').setAttribute("value", "");       
            var prodDesc =document.getElementById('prodDescription').value = "";       
            var prodPhoto =document.getElementById('photoPath').setAttribute("value", "");       
            var salePrice =document.getElementById('salePrice').value = "";
            var price =document.getElementById('Price').setAttribute("value", "");   
            var featured =document.getElementById('featured').setAttribute("value", "");     
            
            var category =document.getElementById('prodCategory').value = ""; 
            document.getElementById('manageProductForm').setAttribute("class","site-main__input__form") ;                 
            document.getElementById('prodCategoryID').value = ""; 
            document.getElementById('formMode').value = "add" ;
            document.getElementById('deleteItemBtn').setAttribute("class","is-hidden site-main__input__form__wrapper__submit-btn") ;         
            document.getElementById('manageFormAction').innerText = "Adding Product";  
            document.getElementById('cancelEditting').setAttribute("class","is-hidden site-main__input__form__wrapper__submit-btn") ;   
            document.getElementById('submitManageProduct').innerText = "Manage Product";                      
        }      
        </script>


