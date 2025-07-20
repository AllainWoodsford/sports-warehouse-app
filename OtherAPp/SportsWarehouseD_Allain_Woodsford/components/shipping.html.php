<?php
 include_once "components/checkoutSteps.html.php";
 include_once "components/success.html.php";
 include_once "components/error.html.php";
?>
<section class="site-main__input"> 
        <h2><span class="is-blue">Shipping<span class="is-orange"> Details</span></span></h2> 
       
        <p class="site-main__branding__wrapper-text"><em>What address do you want to send your products to? Please complete the below </em>shipping details:</p>     
        <form id="shippingForm" class="site-main__input__form" action="shipping.php" method="post">
  
            <div class="site-main__input__form__wrapper">   
                    <fieldset>
                    <legend><u>Name:</u></legend> 
                    <div class="site-main__input__form_wrapper__groupedInput">    
                    <label for="firstName">First name:</label>
                    <input class="is-w-400" value="<?= setValue("firstName") ?>" required id="firstName" type="text" name="firstName" placeholder="Enter your first name">
                    <label for="lastname">Last name:</label>
                    <input class="is-w-400" value="<?= setValue("lastName") ?>" required type="text"
                    id="lastName"  name="lastName" placeholder="Enter your last name">
</div>   
                </fieldset>
                    <fieldset>
                    <legend><u>Contact Details:</u></legend> 
                    <div class="site-main__input__form_wrapper__groupedInput">    
                    <label for="Phone">Contact number:</label>
                    <input class="is-w-400" value="<?= setValue("phone") ?>" required id="Phone" type="tel" name="phone" placeholder="Enter your best contact number">
                    <label for="email">Email address:</label>
                    <input class="is-w-400" value="<?= setValue("email") ?>" required type="email"
                    id="email"  name="email" placeholder="Enter your email address">
</div>    
                </fieldset>
                    <fieldset>
                    <legend><u>Shipping address:</u></legend> 
                    <div class="site-main__input__form_wrapper__groupedInput"> 
                    <label for="streetName">Street Name (include number):</label>
                    <input class="is-w-400" value="<?= setValue("street") ?>" required id="streetName" type="text" name="street" placeholder="Enter your Street Name including number i.e. 123 Fake st">
                    <label for="suburb">Enter Suburb/Town:</label>
                    <input class="is-w-400" value="<?= setValue("suburb") ?>" required id="suburb" type="text" 
                    name="suburb" placeholder="Enter your Suburb/Town i.e. Sydney">
                    <label for="postCode">Post Code:</label>
                    <input class="is-w-200" value="<?= setValue("postCode") ?>" required type="number"
                    id="postCode"  name="postCode" placeholder="Enter your Postcode i.e. 2000">
                    <label  for="state">Choose your State:</label>
                    <select class="is-w-200" value="<?= setValue("state") ?>" required id="state" type="select" name="state" placeholder="Choose your state i.e. NSW">
                        <option value="NSW">NSW</option>
                        <option value="NT">NT</option>
                        <option value="QLD">QLD</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="VIC">VIC</option>
                        <option value="WA">WA</option>
                    </select>
                    </div>
                    </fieldset>
                    <div class="site-main__input__form__wrapper__submit is-mt-10">
                    <button type="submit" class="site-main__input__form__wrapper__submit-btn" id="submitShipping" name="submitShipping" value="submitShipping">Submit</button>
                    </div>
                </div>  
        
            </form>
</section>
