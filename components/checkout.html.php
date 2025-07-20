<?php
 include_once "./checkoutSteps.html.php";
 include_once "./success.html.php";
 include_once "./error.html.php";
 $address = "";
 $firstName = "";
 $lastName = "";
 $email = "";
 $phone = "";
 $validShip = false;
    if(isset($_SESSION["validShipping"])){
        $validShip = unserialize($_SESSION["validShipping"]);
        if($validShip){
            $firstName = unserialize($_SESSION["firstName"]);
            $lastName = unserialize($_SESSION["lastName"]);
            $email = unserialize($_SESSION["email"]);
            $phone = unserialize($_SESSION["phone"]);
            $address = unserialize($_SESSION["fullAddress"]);
        }
    }

?>
<section class="site-main__input">
    <div class="site-main__checkout"> 
        <div class="site-main__checkout__column">
            <!--Narrow Cart -->
                 <!--Address Details-->
                 <div>
                    <h3><span class="is-blue">Order <span class="is-orange">Summary</span></span></h3>
                </div>
                 <div class="site-main__checkout__column__sub">
                    <?php if($validShip): ?>
                        <p><strong><span class="is-blue">Shipping <span class="is-orange">Details:</span></span></strong></p>
                    <p>First name: <?=$firstName?></p>
                    <p>Last name: <?=$lastName?></p>
                    <hr>
                    <p><strong>Contact Details:</strong></p>
                    <p>Contact number: <?=$phone?>
                    <p>Email addresss: <?=$address?>
                    <hr>
                    <p><strong>Delivery Address:</p>
                    <p>Address: <?=$address?>
                    <?php else: ?>
                        <h4><span class="is-orange">Please fillout your shipping details!</span></h4>
                        <a href="shipping.php" rel="noreferrer" aria-label="go to shipping" class="is-button-positive">Go to Shipping Details</a>
                    <?php endif; ?>
                </div>
                 <div class="site-main__checkout__column__sub"> 
                    <?php include_once "./cartNarrow.html.php" ?>
                </div>
        </div>
        <div class="site-main__checkout__column">
                 <!--Payment Details -->
        <h2><span class="is-blue">Check<span class="is-orange">out</span></span></h2>    
        <p class="site-main__branding__wrapper-text"><em>Review your order details, enter your payment information and we will send your order!</em></p>     
        <form id="checkoutForm" class="site-main__input__form" action="checkout.php" method="post">
            <div class="site-main__input__form__wrapper">   
                <fieldset>
                    <legend><u>Payment Details:</u></legend> 
                    <div class="site-main__input__form_wrapper__groupedInput"> 
                        <label for="nameOnCard">Name as it appears on Card:</label>
                            <input  value="<?= setValue("nameOnCard") ?>" required id="nameOnCard" type="text" name="nameOnCard" placeholder="Enter the name as it appears on the Card">   
                        <label for="creditCard">Credit Card Number:</label>
                            <input  value="<?= setValue("creditCardNumber") ?>" required id="creditCardNumber" type="number" name="creditCardNumber" placeholder="Enter your Credit Card Number">
                        <label for="expiry">Expiry Date:</label>
                            <input class="is-w-200"  value="<?= setValue("expiry") ?>" required type="month"
                            id="expiry"  name="expiry" placeholder="Enter your expiry date">
                        <label  for="ccv">CCV</label>
                            <input class="is-w-200"  value="<?= setValue("ccv") ?>" required type="number"
                            id="ccv"  name="ccv" placeholder="Back of Card">
                    </div>    
                </fieldset>
                    <div class="site-main__input__form__wrapper__submit is-mt-10">
                    <button type="submit" class="site-main__input__form__wrapper__submit-btn" id="submitCheckout" name="submitCheckout" value="submitCheckout">Complete Order</button>
                    </div>
                </div>       
            </form>
        </div>
    </div>
</div>
</section>
