<?php

ob_start();
include_once "components/about.html.php";
$output = ob_get_clean();

$title = "Sports Warehouse - About Us";
include_once "components/layout.html.php";

?>