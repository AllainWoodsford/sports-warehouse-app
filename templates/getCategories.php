<?php
    require_once("classes/DBAccess.php");
    include  "templates/connectSQL.php";

    $sql = "SELECT DISTINCT categoryId ,categoryName from category limit 12";
    $categoryRows = $db->executeSQL($sql);

    

    $db->disconnect();
    
?>