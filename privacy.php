<?php

ob_start();
include_once "components/privacy.html.php";
$output = ob_get_clean();

$title = "Sports Warehouse - Privacy Policy";
include_once "components/layout.html.php";

?>