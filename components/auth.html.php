<?php 

include_once("classes/Auth.php");
$isLoggedIn = Auth::isLoggedIn();
$myUsername = Auth::getLoggedInUsername();

?>
<div class="site-main__privacy">
<p>Are we logged in? <?=$isLoggedIn?></p>
<p>Do we have a username? <?=$myUsername?></p>
</div>