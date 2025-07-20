
<section class="site-main__input"> 
        <h2><span class="is-blue">Log<span class="is-orange">in</span></span></h2> 
        <?php 
              include "./components/error.html.php";
        ?>
         <?php 
              include "./components/success.html.php";
        ?>
        <a href="register.php" class="site-main__branding__wrapper-text" rel="noreferrer">Don't have an account? <span class="is-blue"><u>Register here</u></span></a> 
        <p class="site-main__branding__wrapper-text"><em>please complete the following to login </em>below:</p>     
        <form id="loginForm" class="site-main__input__form" action="login.php" method="post">
            <fieldset> 
                <legend>Login</legend>   
            <div class="site-main__input__form__wrapper">     
                    <label for="username">Username:</label>
                    <input value="<?= setValue("username") ?>" required id="username" type="text" name="username" placeholder="Enter Username...">
                    <label for="password">Password</label>
                    <input value="<?= setValue("password") ?>" required id="password" type="password" name="password" placeholder="Enter Password...">
                    <div class="site-main__input__form__wrapper__submit is-mt-10">
                    <button type="submit" class="site-main__input__form__wrapper__submit-btn" id="submitLogin" name="submitLogin" value="submitLogin">Login</button>
                    </div>
                </div>  
        </fieldset>       
            </form>
</section>
