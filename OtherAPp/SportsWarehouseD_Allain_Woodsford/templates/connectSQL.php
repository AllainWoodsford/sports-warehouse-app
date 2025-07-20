
<?php
 //Connects to Database and exposes $db variable
 //Dependencies of:
 //Settings/db.php
 //classes/DBAccess.php
 include "settings/db.php";
 $db = new DBAccess($dsn,$username,$password);
 $db->connect();
?>