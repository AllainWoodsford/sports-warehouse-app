<?php
require_once "classes/Auth.php";


if(!isset($_SESSION))
   {
   session_start();
   }
   
Auth::protect();
require_once("classes/DBAccess.php");
include  "templates/connectSQL.php";

$sql = "SELECT categoryId , categoryName from category where categoryId = :id limit 1";
ob_start();

try {
    if(isset($_POST["submitCategoryForm"])){
        //DO FORM STUFF
        $formTitle = htmlspecialchars($_POST["catTitle"]) ??"";
        if($formTitle === "" || strlen($formTitle) >= 100){
            $errorMessage = "Invalid Category name input";
        } else {
            $sql = "Insert into category(categoryName) values(:catName)";
            $statement = $db->prepareQuery($sql);
            $statement->execute(array(
                ':catName' => $formTitle      
            ));
            $successMessage = "Added new category: " . $formTitle;
        }
      
    } else {
        //DO PARAM STUFF
        $removeID = -1;
        $updateID =  -1;
        $updateName = "";
        
        if(isset($_GET["updateID"])){
            $updateID = $_GET["updateID"] ?? -1;
        }
        if(isset($_GET["updateName"])){
            $updateName =  htmlspecialchars($_GET["updateName"]) ?? "";
        }
        if(isset($_GET["removeID"])){
           $removeID =  $_GET["removeID"] ?? -1;
        }
    
        if($removeID !== -1){
            //we can remove something
            $sql = "select categoryId from category where categoryId != :id";
            $statement = $db->prepareStatement( $sql, ':id',intval($removeID),2 );
            $otherCategories = $statement->fetchAll();
            if(count($otherCategories) <= 0){
                $errorMessage = "failed to delete you need at least one category";
            }else{
                $existingCat = $otherCategories[0];
               
                //Update items with different category id thats not being deleted
                $sql = "Update item set item.categoryId = :id where item.categoryId = :deleteID";
                $statement = $db->prepareQuery($sql);
                $statement->execute(array(
                    ':id' => $existingCat["categoryId"],
                     ':deleteID' => $removeID          
                ));
                //Delete the category
                $sql = "DELETE from category where categoryId = :id limit 1";
                $statement = $db->prepareStatement( $sql, ':id',intval($removeID),2 );
                $successMessage = "Successfully deleted database category";
            }
    
           
        }
        elseif($updateID !== -1 && $updateName !== ""){
             //$statment, $param, $paramVal, $paramType
             $statement = $db->prepareStatement( $sql, ':id',intval($updateID),2 );
             $cats = $statement->fetchAll();
             $updateRequired = false;
             foreach($cats as $cat){
                if($cat["categoryName"] !== $updateName){
                    $updateRequired = true;
                    break;
                 }
             }
             if($updateRequired){
                $sql = "UPDATE category set categoryName =? where categoryId =? limit 1";
                $statement = $db->prepareMultiParamStatement($sql, $updateName, 1, $updateID, 2);
                $successMessage = "Successfully updated the database category";
             
            } 
        }
    }
 
} catch (Exception $e) {
    $errorMessage = "Something went wrong adding item to cart! Try again later " . $e->getMessage();
}

include_once "components/manageCategories.html.php";

$output = ob_get_clean();
$db->disconnect();
$title = "Sports Warehouse - Manage Categories";
include_once "components/layout.html.php";

?>