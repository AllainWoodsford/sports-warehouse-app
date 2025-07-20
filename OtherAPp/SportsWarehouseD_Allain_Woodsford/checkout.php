<?php
if(!isset($_SESSION))
{
    session_start();
   
}

include_once "classes/ShoppingCart.php";

ob_start();

//Check if form submitted
if(isset($_POST["submitCheckout"])){
    //get data
   
    $expiry = strtolower(trim($_POST["expiry"] ?? "")); //trim and set tolower
    $creditCardNumber = trim($_POST["creditCardNumber"] ?? ""); //trimr
    $nameOnCard = strtolower(trim($_POST["nameOnCard"] ?? ""));
    $ccv = trim($_POST["ccv"] ?? "");
 
   
    if($nameOnCard === "" || $creditCardNumber === "" || $ccv === "" || $expiry === ""
    ){
        //error
        $errorMessage = "Error: Invalid Payment Details!";
       
    } else {
        //create new user
        //detect collision
        try {
            $address = "";
            $firstName = "";
            $lastName = "";
            $phone = "";
            $email = "";   
            $validShip = false;
            if(isset($_SESSION["validShipping"])){
                $validShip = unserialize($_SESSION["validShipping"]);
            }
            if(!$validShip){
                $errorMessage = "Error:Please fill-out or correct your shipping details!";
                //display rego form with errors
                include_once "components/checkout.html.php";

            } else {
                $address =  unserialize($_SESSION["fullAddress"]); 
                $firstName = unserialize($_SESSION["firstName"]); 
                $lastName = unserialize($_SESSION["lastName"]);
                $email  = unserialize($_SESSION["email"]); 
                $phone = unserialize($_SESSION["phone"]); 

                if($firstName === "" || $lastName === "" || $phone === "" 
                || $email === "" || $address === ""
                ){
                    //error
                    $errorMessage = "Error: Invalid Shipping Details! Please correct them on the Shipping details page.";
                }else{
                    //Success area here go for query
                    if(isset($_SESSION["cart"])){
                        $cart = unserialize($_SESSION["cart"]);
                        if($cart->getCartCounter() <= 0){
                            $errorMessage = "Error:Please add items to your order!";
                        } else {
                            //Can finally lodge an order
                            //public function saveCart($Address, $ContactNumber, $CreditCardNumber, $CSV, $Email,
                             //$ExpiryDate,  $FirstName, $LastName, $NameOnCard)
                            $cart->saveCart($address, $phone, $creditCardNumber, $ccv, $email, $expiry, $firstName, $lastName, $nameOnCard);
                            $successMessage = "Placed order! We will get in touch if there are any issues!";
                            unset($_SESSION["cart"]);
                        }
                    } else{
                        $errorMessage = "Error:Please add items to your order!";
                    }
                }
            }

        
                //Redirected on success -> if they are still here its an error 
                include_once "components/checkout.html.php"; 
        
        } catch (Exception $e) {
            $errorMessage = "Something went wrong! Please try again later.";
            //display rego form with errors
            if(isset($_SESSION)){
             $_SESSION["validShipping"] = serialize(false);
            }
            include_once "components/checkout.html.php"; 
        }
 
    }


} else {
   
    include_once "components/checkout.html.php"; 
}

$output = ob_get_clean();

$title = "Sports Warehouse - Checkout";
include_once "components/layout.html.php";


/**
 * @param string $fieldName
 * @return string 
 */
function setValue($fieldName){
    return htmlspecialchars($_POST[$fieldName] ?? "");
}

?>