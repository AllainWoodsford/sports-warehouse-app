<?php
if(!isset($_SESSION))
{
    session_start();
   
}

include_once "./success.html.php";
include_once "./error.html.php";   

?>
<!-- CART -->
<?php if(isset($_SESSION["username"])): ?>
    <section class="site-main__cart-wide">
    <h2><span class="is-blue">Manage <span class="is-orange">Categories:</span></span></h2>
    <div class="site-main__checkout"> 
        <div class="site-main__checkout__column">
        <form id="manageCategoryForm" class="site-main__input__form" action="manageCategories.php" method="post">
            <div class="site-main__input__form__wrapper">          
                <fieldset>
                    <legend><u>Add a new product category:</u></legend> 
                        <div class="site-main__input__form_wrapper__groupedInput">   
                        <label for="catTitle">Category title:</label>
                            <input  max="100" aria-label="name of new Category for Products" value="" required id="catTitle" type="text" name="catTitle" placeholder="Enter Product category title">                      
                </fieldset>
                    <div class="site-main__input__form__wrapper__submit is-mt-10">  
                        <button type="submit" class="site-main__input__form__wrapper__submit-btn" id="submitCategoryForm" name="submitCategoryForm" value="submitCategoryForm">Add Category</button>
                    </div>
                </div>       
            </form>
        </div>
        <div class="site-main__checkout__column">      
            <div class="site-main__cart__wrapper"> 
               <!-- Loop for category items -->      
            <?php 
                include_once "../templates/getCategoriesNoLimit.php";
                foreach ($categoryRows as $catRow):
                    $catID = $catRow["categoryId"];
                    $catName = $catRow["categoryName"];
            ?>
            <article class="site-main__cart__card">
                <div class="is-w-400">        
                    <p>Category Id: <?=$catID?></p> 
                    <p>Category Name: <?=$catName?></p> 
                        <label for="manageCard<?=$catID?>">Update Category:</label>
                        <input id="manageCard<?=$catID?>" onchange="updateManageItem(<?=$catID?>)" type="text" value="<?=$catName?>"/> 
                        <div class="site-main__cart__card-buttons is-mt-10">
                            <a id="manageCardUpdate<?=$catID?>" class="is-button-delete" type="button" rel="noreferrer" href="manageCategories.php?updateID=<?=$catID?>&updateName=<?=$catName?>" >Update Category</a>
                            <a class="is-button-delete" type="button" rel="noreferrer"  href="manageCategories.php?removeID=<?=$catID?>">Delete Category</a>
                        </div>             
                </div>
                </article>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
       
    </section>
<?php else: ?>
<p>please <a href="login.php" rel="noreferrer"><span class="is-blue">Login</span></a></p>
<?php endif; ?>
<script>
        function updateManageItem(id){       
            var amount = document.getElementById('manageCard' + id).value;
            var url =document.getElementById('manageCardUpdate' + id);
            url.setAttribute("href","manageCategories.php?updateID=" + id + "&updateName=" +amount);
        }
        </script>


