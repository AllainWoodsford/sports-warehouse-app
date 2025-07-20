<?php

ob_start();
include_once "components/register.html.php";
$output = ob_get_clean();

$title = "Sports Warehouse - Register";
include_once "components/layout.html.php";


/**
 * @param string $fieldName
 * @return string 
 */
function setValue($fieldName){
    return htmlspecialchars($_POST[$fieldName] ?? "");
}

?>