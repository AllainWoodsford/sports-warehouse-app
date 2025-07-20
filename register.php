<?php
require_once "classes/Auth.php";
require_once("classes/DBAccess.php");
   include  "templates/connectSQL.php";

   if(Auth::isLoggedIn())
   {
      header("Location:" . Auth::SuccessPageURL);
      exit;
   }



ob_start();

//Check if form submitted
if(isset($_POST["submitCreateUser"])){
    //get data
    $username = strtolower(trim($_POST["username"] ?? "")); //trim and set tolower
    $password = $_POST["password"] ??"";
    $confirmPass = $_POST["confirmPassword"] ??"";
    if($username === "" || $password === "" || $confirmPass !== $password){
        //error
        $errorMessage = "Valid username and password are required";
        //display rego form with errors
        include_once "components/register.html.php";
    } else {
        //create new user
        //detect collision
        try {

            $sql = "select userName from user where userName = :username";
       
            $statement = $db->prepareStatement($sql, ':username',  $username,1);
          
            $rows = $statement->fetchAll();
            $count = count($rows);
        
            if($count > 0){
                //An existing user was found collision
                $errorMessage = "Error registering account! Username already exists!";
                //display rego form with errors
                include_once "components/register.html.php";
            } else {
                //no collision load login page and register user
                $newUserId = Auth::createUser($username, $password);

                $successMessage = "New user added successfully, ID: " . strval($newUserId);
                include_once "components/login.html.php";
            }

        
        } catch (Exception $e) {
            $errorMessage = "Error registering account " . $e->getMessage();
            //display rego form with errors
            include_once "components/register.html.php";
          
        }
        //Disp
     
    }


} else {

    include_once "components/register.html.php";
}

$output = ob_get_clean();

$title = "Sports Warehouse - Register";
include_once "components/layout.html.php";


/**
 * @param string $fieldName
 * @return string 
 */
function setValue($fieldName){
    return htmlspecialchars($_POST[$fieldName] ?? "");
}

?>