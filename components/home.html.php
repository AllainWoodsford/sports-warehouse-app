    <!--Hidden on Small Site Banner-->
    <div class="site-main__banner" data-bgimage="assets/images/banner.jpg">
            <!--Overlay Shopnow-->
            <div role="banner" aria-label="website banner design" aria-description="Image of soccer field and soccer ball for design" class="site-main__banner__overlay">
                <p class="site-main__banner__overlay-text">View our brand new range of</p>
                <h1 class="site-main__banner__overlay-heading ">Sports balls</h1>
                <a href="browseProduct.php?categoryId=-1&categoryName=All Products" aria-label="Shop now button" type="button" class="is-hover-opacity-50 site-main__banner__overlay-btn">Shop now</a>
            </div>
            <!--Indicators Hidden on SM-->
            <div class="site-main__banner__indicators">
                <button aria-label="banner image btn" aria-description="changes banner image" class="site-main__banner__indicators-btn"></button>
                <button aria-label="banner image btn" aria-description="changes banner image" class="site-main__banner__indicators-btn"></button>
                <button aria-label="banner image btn" aria-description="changes banner image" class="site-main__banner__indicators-btn"></button>
            </div>
        </div>
        <?php
          $heading = "Featured Products";
          include "./siteMainSubheading.php";
        ?>
        <!--WHERE PHP TEMPLATE SHOULD LOAD -->
       <?php 
            include "./products.html.php";
       ?>
       <?php
          $heading = "Our brands and partnerships";
          include "./siteMainSubheading.php";
        ?>
     
       <div class="site-main__branding">
            <div class="site-main__branding__wrapper">
                <p class="site-main__branding__wrapper-text">These are some of our top brands and partnerships</p>
                <p class="site-main__branding__wrapper-text"><span class="is-blue">The best of the best is here.</span></p>
            </div>
            <div class="site-main__branding__logos">  
                        <img loading="lazy" src="assets/images/logo_nike.png" alt="logo Nike">
                        <img loading="lazy" src="assets/images/logo_adidas.png" alt="logo Adidas">
                        <img loading="lazy" src="assets/images/logo_skins.png" alt="logo Skins">        
                        <img loading="lazy" src="assets/images/logo_asics.png" alt="logo Asics">
                        <img loading="lazy" src="assets/images/logo_newbalance.png" alt="logo New Balance">
                        <img loading="lazy" src="assets/images/logo_wilsons.png" alt="logo Wilson">    
            </div>
        </div>
