<?php 
   require_once("classes/DBAccess.php");
   include  "templates/connectSQL.php";

   
    ob_start();
    try {
        if(isset($_GET["search"])){
            $search = $_GET["search"];
            //search for products that match the search
            $sql = "select distinct itemId, itemName, photo, price, salePrice, description from item left join category c on c.categoryId = item.categoryId where (item.itemName like :search or item.description like :search or c.categoryName like :search) limit 30";
            $statement = $db->prepareStatement($sql, ':search', '%' . $search . '%',1);
           
            $rows = $statement->fetchAll();
            $count = count($rows);
            //Prevent XSS Scripting
            if($count <= 0 or $count >= 50){
                $errorMessage = "We're sorry your search: " .htmlspecialchars($search)  . " was either too long or did not find any products";
                $heading = "Search results: " . htmlspecialchars($search);
                include_once "./components/browse.html.php";
            }
            else{

                $heading = "Search results: " . htmlspecialchars($search);
                include_once "./components/browse.html.php";
            }
            
        } else {
            $errorMessage = "Please enter something into the search bar";
            $heading = "invalid search";
            include_once "./components/browse.html.php";
        }
    } catch(Exception $e) {
        $heading = "Something went wrong!";
        $errorMessage = htmlspecialchars($e->getMessage());
        include_once "./components/browse.html.php";
    }
                 
    $output = ob_get_clean();
   
    $title = "Sports Warehouse - Search Results";
    include_once "./components/layout.html.php";

    $db->disconnect();
?>