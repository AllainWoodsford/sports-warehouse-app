
<?php 
            include "components/error.html.php";
        ?>
           <?php 
              include "components/success.html.php";
        ?>
<section class="site-main__input"> 
        <h2><span class="is-blue">Reset <span class="is-orange">password</span></span></h2> 
     
        <?php if(isset($_SESSION["username"])): ?>
            <form id="resetPasswordForm" class="site-main__input__form" action="resetPassword.php" method="post">
            <fieldset> 
                <legend>Reset Password</legend>   
            <div class="site-main__input__form__wrapper">     
                    <label for="username">Current Password:</label>
                    <input value="<?= setValue("current") ?>" required id="username" type="password" name="currentPassword" placeholder="Enter current password">
                    <label for="password">Password</label>
                    <input value="<?= setValue("password") ?>" required id="password" type="password" name="password" placeholder="Enter a new password">
                    <label for="confirmPassword">confirmPassword</label>
                    <input value="<?= setValue("confirmPassword") ?>" required id="confirmPassword" type="password" name="confirmPassword" placeholder="Enter new password again">
                    <div class="site-main__input__form__wrapper__submit is-mt-10">
                    <button type="submit" class="site-main__input__form__wrapper__submit-btn" id="submitResetPassword" name="submitResetPassword" value="submitResetPassword">Update Password</button>
                    </div>
                </div>  
        </fieldset>       
            </form>
        <?php else: ?>
        <p class="is-black">you aren't logged in <a href="login.php" rel="noreferrer"><span class="is-blue">Go to login</span</a>
        <?php endif; ?>
</section>
