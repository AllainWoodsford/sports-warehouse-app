<?php
require_once "classes/Auth.php";


if(!isset($_SESSION))
   {
   session_start();
   }
   
Auth::protect();
require_once("classes/DBAccess.php");
include  "templates/connectSQL.php";
ob_start();



try {

    if(isset($_POST["submitManageProduct"])){
        $formMode = $_POST["formMode"] ?? "NA";
        if($formMode !== "NA"){
            $prodTitle = htmlspecialchars($_POST["prodTitle"]) ??"";
            $prodID = htmlspecialchars($_POST["productID"]) ?? -1;
            $prodDesc = htmlspecialchars($_POST["prodDescription"]) ??"";
            $prodPhoto = htmlspecialchars($_POST["photoPath"]) ??"";
            $prodCategoryID = htmlspecialchars($_POST["prodCategoryID"]) ?? 0;
            $prodSalePrice = htmlspecialchars($_POST["salePrice"]) ??0;
            $prodPrice = htmlspecialchars($_POST["Price"]) ?? 1;
            $prodFeatured = htmlspecialchars($_POST["featured"]) ?? 0;
            if($formMode === "add"){
                //add a new product
                if($prodPrice <= -1 || $prodSalePrice >= $prodPrice || $prodTitle === "" || $prodFeatured > 1 || $prodFeatured < 0 ){
                    $errorMessage = "Invalid new Product Entry";
                }else {
                    //Attempt SQL
                    $sql = "INSERT INTO item (itemName, photo, price, salePrice, item.description, featured, item.categoryId) VALUES (:itemName, :photo, :price, :salePrice, :itemDescription, :featured, :categoryID);";
                    $statment = $db->prepareQuery($sql);
                    $statment->execute(array(
                        ':itemName' => $prodTitle,
                         ':photo' => $prodPhoto,
                          ':price' =>  $prodPrice,
                           ':salePrice' => $prodSalePrice,
                            ':itemDescription' => $prodDesc,
                             ':featured' => $prodFeatured,
                             ':categoryID' => $prodCategoryID
                            
                    ));
                   $successMessage = "Success added a new product!";
                }
            } elseif($formMode === "edit"){
                if($prodPrice <= -1 || $prodSalePrice >= $prodPrice || $prodTitle === "" || $prodFeatured > 1 || $prodFeatured < 0  || $prodID  === -1){
                    $errorMessage = "Invalid new Product Entry";
                }else{
                    $sql = "update item set itemName = :itemName , photo = :photo, price = :price , salePrice = :salePrice , item.description = :itemDescription , featured = :featured, item.categoryId = :categoryID where itemId = :prodID";
                    $statment = $db->prepareQuery($sql);
                    $statment->execute(array(
                        ':itemName' => $prodTitle,
                         ':photo' => $prodPhoto,
                          ':price' =>  $prodPrice,
                           ':salePrice' => $prodSalePrice,
                            ':itemDescription' => $prodDesc,
                             ':featured' => $prodFeatured,
                             ':categoryID' => $prodCategoryID,
                             ':prodID' =>  $prodID
                            
                    ));
                   $successMessage = "Success updated product " . $prodTitle;
                }
            } elseif($formMode === "delete"){
                if($prodID  === -1){
                    $errorMessage = "Invalid deletion request";
                } else {
                    $sql = "delete from item where itemId = :prodID limit 1";
                    $statment = $db->prepareQuery($sql);
                    $statment->execute(array(
                        ':prodID' => $prodID     
                    ));
                   $successMessage = "Success deleted Product " . $prodTitle;
                }
            }
            
        }
       
    }


    $sql = "select * from item left join category on item.categoryId = category.categoryId;";

    $statement = $db->runStatement($sql);
    $rows = $statement->fetchAll();
    
} catch (Exception $e) {
    $errorMessage = "Something went wrong Try again later!" . $e->getMessage();
}
include_once "components/manageProducts.html.php";
$output = ob_get_clean();
$db->disconnect();
$title = "Sports Warehouse - Manage Products";
include_once "components/layout.html.php";

?>