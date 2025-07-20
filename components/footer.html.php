<footer class="site-footer">
        <!--Inner footer-->
        <div class="site-footer__navigation">
            <!--Site Navigation Footer-->
            <div role="navigation" class="site-footer__navigation__margin">
                <section class="site-footer__navigation__margin-subsection">
                    <h3 class="site-footer__navigation__margin__heading">Site navigation</h3>
                    <nav class="site-footer__navigation__margin__links">
                        <div class="site-footer__navigation__margin__links-item">
                            <div class="site__footer__navigation__margin__links-rect"></div>
                            <a href="index.php" aria-label="home link" rel="”noreferrer”">Home</a>
                        </div>
                        <div class="site-footer__navigation__margin__links-item">
                            <div class="site__footer__navigation__margin__links-rect"></div>
                            <a href="about.php" aria-label="about sports warehouse link" rel="”noreferrer”">About SW</a>
                        </div>
                        <div class="site-footer__navigation__margin__links-item">
                            <div class="site__footer__navigation__margin__links-rect"></div>
                            <a href="contact.php" aria-label="contact us link" rel="”noreferrer”">Contact us</a>
                        </div>
                        <div class="site-footer__navigation__margin__links-item">
                            <div class="site__footer__navigation__margin__links-rect"></div>
                            <a href="browseProduct.php?categoryId=-1&categoryName=All Products" aria-label="products link" rel="”noreferrer”">View products</a>
                        </div>
                        <div class="site-footer__navigation__margin__links-item">
                            <div class="site__footer__navigation__margin__links-rect"></div>
                            <a href="privacy.php" aria-label="privacy policy" rel="”noreferrer”">Privacy policy</a>
                        </div>
                    </nav>
                </section>
                <!--Product Categories Hidden on Small-->
                <section role="navigation" aria-label="product category links" class="site-footer__navigation__margin-subsection site-footer__navigation__margin-subsection__products is-hidden-sm is-orange-bg">
                    <h3 class="site-footer__navigation__margin__heading">Product categories</h3>
                    <nav class="site-footer__navigation__margin__links">
                        <?php
                              include "../templates/getCategories.php";
                              if(!empty($categoryRows)):
                        ?>
                        <?php 
                            foreach ($categoryRows as $catRow):
                                $catID = $catRow["categoryId"];
                                $catName = $catRow["categoryName"];
                        ?>
                        <div class="site-footer__navigation__margin__links-item">
                            <div class="site__footer__navigation__margin__links-rect"></div>
                            <a href="browseProduct.php?categoryId=<?=$catID?>&categoryName='<?=$catName?>'" id="footerCatLink-<?=$catID?>" href="/Products/<?=$catName?>" aria-label="product <?=$catName?> link" rel="”noreferrer”"><?=$catName?></a>
                        </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <p>No Categories!</p>
                        <?php endif; ?>
                    </nav>
                </section>
                <!--Socials -->
                <section class="site-footer__navigation__margin-subsection">
                    <h3 class="site-footer__navigation__margin__heading">Contact Sports Warehouse</h3>
                    <div role="navigation" aria-label="social media links" class="site__footer__socials is-pb-15">
                        <div class="site__footer__socials__card">  
                            <a aria-label="link to Facebook" rel="noreferrer" href="https://facebook.com">
                                <div class="site__footer__socials__card-border">
                                    <i class="fa-brands fa-facebook-f fa-2xl "><span class="is-hidden">Facebook Link</span></i>
                                </div>
                            </a>
                            <a class="site__footer_socials__card-text" href="https://facebook.com">Facebook</a>  
                        </div>
                        <div class="site__footer__socials__card">  
                            <a rel="noreferrer" href="https://twitter.com">
                                <div class="site__footer__socials__card-border">
                                    <i class="fa-brands fa-twitter fa-2xl "><span class="is-hidden">Twitter Link</span></i>
                                </div>
                            </a>
                            <a class="site__footer_socials__card-text" href="https://twitter.com">Twitter</a>  
                        </div>
                         <div class="site__footer__socials__card">  
                            <a rel="noreferrer" href="https://telegram.com">
                                <div class="site__footer__socials__card-border">
                                    <i class="fa-solid fa-paper-plane fa-2xl "><span class="is-hidden">Telegram Link</span></i>
                                </div>
                            </a>
                            <a class="site__footer_socials__card-text" href="https://telegram.com">Telegram</a>  
                        </div>
                    </div>
                </section>   
            </div>
        </div>
        <p class="is-pb-15 site-footer__copyright-text">© Copyright <script>document.write(new Date().getFullYear())</script>2023 Sports Warehouse. <br class="is-hidden-lg">All rights reserved. <br class="is-hidden-lg"> Website made by Awesomesauce Design <br class="is-hidden-lg"> &amp; Allain Woodsford.</p>
    </footer>



