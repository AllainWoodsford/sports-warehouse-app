<?php if(!empty($successMessage)): ?>
<div class="site-main__error">
    <h2 class="is-blue">Success!</h2>
    <p class="site-main__branding__wrapper-text"><?= htmlspecialchars($successMessage) ?? "Something went wrong!"?></p>
</div>
<?php endif ?>