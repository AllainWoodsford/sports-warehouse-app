<?php

ob_start();
include_once "components/contact.html.php";
$output = ob_get_clean();

$title = "Sports Warehouse - Contact Us";
include_once "components/layout.html.php";

?>