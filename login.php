<?php
require_once "classes/Auth.php";
 if(!isset($_SESSION))
 {
 session_start();
 }

ob_start();
// if(Auth::isLoggedIn())
// {
  
//    header("Location:" . Auth::SuccessPageURL);
//    exit;
// }


//Check if form submitted
if(isset($_POST["submitLogin"])){
    //get data
    $username = strtolower(trim($_POST["username"] ?? "")); //trim and set tolower
    $password = $_POST["password"] ??"";
 
    if($username === "" || $password === "" ){
        //error
        $errorMessage = "Error: Invalid credentials!";
        //display rego form with errors
        include_once "./components/login.html.php";
    } else {
        //create new user
        //detect collision
        try {   

                Auth::login($username, $password);

                //Redirected on success -> if they are still here its an error
                $errorMessage = "Something went wrong! Please try again later.";
                include_once "./components/login.html.php";
        
        } catch (Exception $e) {
            $errorMessage = "Something went wrong! Please try again later.";
            //display rego form with errors
            include_once "./components/login.html.php"; 
        }
 
    }


} else {

    include_once "./components/login.html.php";
}

$output = ob_get_clean();

$title = "Sports Warehouse - Login";
include_once "./components/layout.html.php";


/**
 * @param string $fieldName
 * @return string 
 */
function setValue($fieldName){
    return htmlspecialchars($_POST[$fieldName] ?? "");
}

?>