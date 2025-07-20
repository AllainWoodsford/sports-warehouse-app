
    <?php
      include_once "classes/ShoppingCart.php";
      include_once "classes/Auth.php";
        $cart = null;
        $cartCounter = 0;
        $showCart = false;
        $showCartText = "View";
        
        if(isset($_SESSION)){
            $username = Auth::getLoggedInUsername();
            if(isset($_SESSION["cart"])){
                $cart = unserialize($_SESSION["cart"]);
            }
            if($cart !== null){
                $cartCounter = $cart->getCartCounter();
            }
            if(isset($_SESSION["showCart"])){
                $showCart = unserialize($_SESSION["showCart"]);
                if($showCart){
                    $showCartText = "Close";
                }
            }
        }
      
    ?>
    <header class="site-header">
        <div class="site-header__topNav">
            <div class="site-header__topNav-wrapper">
                <!-- Hidden Large-->
                <button id="menuButton" name="menuButton" value="menuButton" aria-label="Menu button" type="button" class="site-header__topNav__menuButton is-hidden-lg"><i class="fa-solid fa-bars fa-xl is-mr-10"></i>Menu</button>
                <!-- Overlay for Mobile-->
                <div id="overlayMenu" class="site-header__topNav__overlay is-hidden-lg-imp">    
                        <div class="site-header__topNav__overlay__top">
                            <button id="closeMenuButton" name="closeMenuButton" value="closeMenuButton" class="is-white"><i class="fa-solid fa-xmark fa-2xl"></i><span class="is-hidden">Close Button</span></button>
                        
                                <form method="post" id="cartForm">
                                    <input type="hidden" name="headerCartButton" value="<?=$showCart ?>">
                                    <div class="site-header__topNav-wrapper-form">
                                        <button type="submit" name="headerCartButton1" id="headerCartButton"  class="is-white" type="button" aria-label="Cart"><i class="fa-solid fa-cart-shopping is-mr-5 fa-lg"></i><?=$showCartText?> Cart</button>
                                        <!--Not hidden SM-->
                                        <div name="headerCartButtonLosenge1" id="headerCartButton2" aria-label="Items in Cart" class="site-header__topNav__rightMenu__cartCounter"><p class="site-header__topNav-wrapper__losenge-text"><?=$cartCounter?> items</p></div>
                                    </div>      
                                </form>
                         
                        </div>
                        <nav class="site-header__topNav__overlay__bottom">
                            <div class="site-header__topNav__overlay__bottom-link">
                               
                                <!-- <a href="index.php"class="site-header__topNav__overlay__bottom-btn is-mr-10"><i class="fa-solid fa-lock is-mr-5"></i></a> -->
                                <?php if($username !== ""): ?>
                        <div  aria-label="Account Menu" class="site-header__topNav__overlay__bottom-link"><i class="fa-solid fa-user is-mr-5"></i><?=$username?>
                            <div class="site-header__topNav__overlay__bottom">
                                <a href="resetPassword.php">Update password</a>
                                <a href="manageProducts.php">Manage items</a>
                                <a href="manageCategories.php">Manage categories</a>
                                <a href="logout.php">Logout</a>
                            </div>
                        </div> 
                    <?php else: ?>
            
                    <a href="login.php" aria-label="Login" class="site-header__topNav__overlay__bottom-btn is-mr-10"><i class="fa-solid fa-lock is-mr-5"></i>Login</a>    
                    <?php endif; ?>  
                    
                             
                            </div>
                            <div class="site-header__topNav__overlay__bottom-link">
                                
                                <a aria-label="Home navigation link" href="index.php" rel="noreferrer"><i class="fa-regular fa-circle fa-2xs is-mr-5"></i>Home</a>
                            </div>
                          
                            <div class="site-header__topNav__overlay__bottom-link">
                                <a aria-label="About SportsWarehouse navigation link" href="about.php" rel="noreferrer"><i class="fa-regular fa-circle fa-2xs is-mr-5"></i>About SW</a>
                            </div>
                          
                            <div class="site-header__topNav__overlay__bottom-link">
                                
                                <a aria-label="Contact Us navigation link" href="contact.php" rel="noreferrer"><i class="fa-regular fa-circle fa-2xs is-mr-5"></i>Contact Us</a>
                            </div>
                            
                            <div class="site-header__topNav__overlay__bottom-link">
                                
                                <a aria-label="View Products navigation link" href="browseProduct.php?categoryId=-1&categoryName=All Products" rel="noreferrer"><i class="fa-regular fa-circle fa-2xs is-mr-5"></i>View Products</a>
                            </div> 
                        
                        </nav>       
                </div>
                <!--Hidden Small Top Nav Menu-->
                <nav class="is-hidden-sm site-header__topNav__links">
                    <a class="site-header__topNav__links-link" aria-label="Home navigation link" href="index.php" rel="noreferrer">Home</a>
                    <a class="site-header__topNav__links-link" aria-label="About Sportswarehouse link" href="about.php" rel="noreferrer">About SW</a>
                    <a class="site-header__topNav__links-link" aria-label="Contact Us link" href="contact.php" rel="noreferrer">Contact Us</a>
                    <a class="site-header__topNav__links-link" aria-label="Product navigation link" href="browseProduct.php?categoryId=-1&categoryName=All Products" rel="noreferrer">View Products</a>
                </nav>
                <!--Right side context menu-->
                <div class="site-header__topNav__rightMenu">
                    <!--Hidden SM-->
                    <?php if($username !== ""): ?>
                        <div  aria-label="Account Menu" class="site-header__dropdown site-header__topNav__links-link"><span class="site-header__dropdown-dropbtn"><i class="fa-solid fa-user is-mr-5"></i><?=$username?></span>
                            <div class="site-header__dropdown-content">
                                <a href="resetPassword.php">Update password</a>
                                <a href="manageProducts.php">Manage items</a>
                                <a href="manageCategories.php">Manage categories</a>
                                <a href="logout.php">Logout</a>
                            </div>
                        </div> 
                    <?php else: ?>
                 
                    <a href="login.php" aria-label="Login" class="site-header__topNav__links-link"><i class="fa-solid fa-lock is-mr-5"></i>Login</a>    
                    <?php endif; ?>           
                        <form  method="post" id="cartForm2" >
                        <input type="hidden" name="headerCartButton" value="<?=$showCart ?>">
                        <div class="site-header__topNav-wrapper-form">
                            <button  type="submit" name="headerCartButton2" id="headerCartButton3"  aria-label="Cart" class="site-header__topNav__links-link"><i class="fa-solid fa-cart-shopping is-mr-5"></i><?=$showCartText?> Cart</button>
                            <!--Not hidden SM-->
                            <div name="headerCartButtonLosenge2" id="headerCartButton4" aria-label="Items in Cart" class="site-header__topNav__rightMenu__cartCounter"><p class="site-header__topNav-wrapper__losenge-text"><?=$cartCounter?> items</p></div>
                        </div>
                    </form>   
                </div>
               
            </div>   
        </div>
        <section class="site-header__branding">
            <!--H1 Heading and Logo-->
            <h1 class="is-hidden">SW Sports Warehouse</h1>
            <img loading="lazy" class="site-header__branding__logo" src="assets/images/logo.png" alt="Sports Warehouse logo">
            <div>
                <!--Search Form-->
                <form role="search" action="search.php" method="get" aria-label="search form" aria-description="This form has a search text input and button that allows you to look up Products by their: description, name or category">
                <fieldset>
                    <legend class="is-hidden">Fill in the search box with what product you are looking for such as a name or description or category</legend>
                <label for="searchProductsInput">
                    <span class="is-hidden">Search</span>
                </label>
                <input 
                class="site-header__branding__input__search is-mr-5" 
                id="searchProductsInput" 
                type="search" 
                placeholder="Search products" 
                aria-description="search results will appear below in products section"
                name="search">
                <button type="submit" class="site-header__branding__input__searchButton is-hover-opacity-50" value="search"><i class="fa-solid fa-magnifying-glass site-header__branding__searchButton-img"></i>
                <span class="is-hidden">Submit Search</span>
                </button>
                </fieldset>
                </form>
            </div>
        </section>
        <nav class="site-header__category">
            <!--Category Nav-->
            <div role="navigation" class="site-header__category__items" > 
                <?php 
                    include "templates/getCategories.php";
                    if(!empty($categoryRows)):
                ?>
                <?php
                    foreach ($categoryRows as $catRow):
                        $catID = $catRow["categoryId"];
                        $catName = $catRow["categoryName"];
                ?>
                <a href="browseProduct.php?categoryId=<?=$catID?>&categoryName='<?=$catName?>'" value="<?=$catID?>" id="categoryHeader-<?=$catID?>" aria-label="Browse <?=$catName?>"  class="site-header__category-item">
                    <div class="is-white "><span class="site-header__category-item__btn-margin"><?= $catName ?></span></div>
                    <p class="site-header__category-item__btn-text">></p>
                    </a>  
                <?php endforeach; ?>
                <?php else: ?>
                    <p>No Categories!</p>
                <?php endif; ?>
            </div>  
        </nav>
    </header>