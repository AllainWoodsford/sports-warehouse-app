<?php if(!empty($errorMessage)): ?>
<div class="site-main__error is-orange">
    <h2>Error</h2>
    <p class="site-main__branding__wrapper-text"><?= htmlspecialchars($errorMessage) ?? "Something went wrong!"?></p>
</div>
<?php endif ?>