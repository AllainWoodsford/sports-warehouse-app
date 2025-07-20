<?php
if(!isset($_SESSION))
{
session_start();
}
include_once("classes/Auth.php");

ob_start();

$isLoggedIn = Auth::isLoggedIn();
$myUsername = Auth::getLoggedInUsername();
echo $isLoggedIn;
echo $myUsername;
include_once "components/auth.html.php";
$output = ob_get_clean();

$title = "Sports Warehouse - Auth test";
include_once "components/layout.html.php";

?>