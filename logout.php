<?php
//remove username from the session
session_start();		
$_SESSION = []; //empty array. 
session_write_close(); 
//redirect the user to the login page
header("Location: " . "login.php");
exit;

?>