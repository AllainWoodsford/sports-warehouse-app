<?php
if(!isset($_SESSION))
{
    session_start();
   
}


ob_start();



//Check if form submitted
if(isset($_POST["submitShipping"])){
    //get data
    $firstName = strtolower(trim($_POST["firstName"] ?? "")); //trim and set tolower
    $lastName = strtolower(trim($_POST["lastName"] ?? "")); //trim and set tolower
    $phone = trim($_POST["phone"] ?? ""); //trimr
    $email = strtolower(trim($_POST["email"] ?? "")); //trim and set tolower
    $street = strtolower(trim($_POST["street"] ?? "")); //trim and set tolower
    $suburb = strtolower(trim($_POST["suburb"] ?? "")); //trim and set tolower
    $postCode = trim($_POST["postCode"] ?? ""); //trimr
    $state = trim($_POST["state"] ?? ""); //trimr
 
   
    if($firstName === "" || $lastName === "" || $phone === "" || $street === ""
    || $email === "" || $suburb === "" || $postCode === "" || $state === ""
    ){
        //error
        $errorMessage = "Error: Invalid Shipping Details!";
        //display rego form with errors
        include_once "./components/shipping.html.php";
    } else {
        //create new user
        //detect collision
        try {   

            $fullAddress = trim($street . "| " . $suburb . "| " . $postCode . "| " . $state . "| Australia" );          
                    $_SESSION["fullAddress"] = serialize($fullAddress);
                    $_SESSION["firstName"] = serialize($firstName);
                    $_SESSION["lastName"] = serialize($lastName);
                    $_SESSION["email"] = serialize($email);
                    $_SESSION["phone"] = serialize($phone);
                    $_SESSION["validShipping"] = serialize(true);
                    $successMessage = "Shipping details saved!";
                //Redirected on success -> if they are still here its an error 
                include_once "./components/checkout.html.php";
        
        } catch (Exception $e) {
            $errorMessage = "Something went wrong! Please try again later.";
            //display rego form with errors
            if(isset($_SESSION)){
             $_SESSION["validShipping"] = serialize(false);
            }
            include_once "./components/shipping.html.php"; 
        }
 
    }


} else {
 
    include_once "./components/shipping.html.php";
}

$output = ob_get_clean();

$title = "Sports Warehouse - Shipping Details";
include_once "./components/layout.html.php";


/**
 * @param string $fieldName
 * @return string 
 */
function setValue($fieldName){
    return htmlspecialchars($_POST[$fieldName] ?? "");
}

?>