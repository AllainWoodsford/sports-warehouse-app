
<section class="site-main__input"> 
        <h2><span class="is-blue">Reg<span class="is-orange">ister</span></span></h2> 
        <?php 
            include "components/error.html.php";
        ?>
           <?php 
              include "components/success.html.php";
        ?>
        <a href="login.php" class="site-main__branding__wrapper-text" rel="noreferrer">Already have an account? <span class="is-blue"><u>Login instead</u></span></a> 
        <p class="site-main__branding__wrapper-text"><em>please complete the following to register an account </em>below:</p>
            <form id="registerForm" class="site-main__input__form" action="register.php" method="post">
            <fieldset> 
                <legend>Register</legend>   
            <div class="site-main__input__form__wrapper">     
                    <label for="username">Username:</label>
                    <input value="<?= setValue("username") ?>" required id="username" type="text" name="username" placeholder="Enter Username...">
                    <label for="password">Password</label>
                    <input value="<?= setValue("password") ?>" required id="password" type="password" name="password" placeholder="Enter Password...">
                    <label for="confirmPassword">confirmPassword</label>
                    <input value="<?= setValue("confirmPassword") ?>" required id="confirmPassword" type="password" name="confirmPassword" placeholder="Enter Password Again...">
                    <div class="site-main__input__form__wrapper__submit is-mt-10">
                    <button type="submit" class="site-main__input__form__wrapper__submit-btn" id="submitCreateUser" name="submitCreateUser" value="submitCreateUser">Register</button>
                    </div>
                </div>  
        </fieldset>       
            </form>
</section>
