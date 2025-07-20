<?php
require_once "./classes/Auth.php";
require_once("./classes/DBAccess.php");
   include  "./templates/connectSQL.php";
   if(!isset($_SESSION))
   {
   session_start();
   }
   
//Need to protect route
Auth::protect();
ob_start();

//Check if form submitted
if(isset($_POST["submitResetPassword"]) && isset($_SESSION["username"])){
    //get data
    $username = unserialize($_SESSION["username"]) ?? "";
    $currentPassword = $_POST["currentPassword"] ?? ""; //trim and set tolower
    $password = $_POST["password"] ??"";
    $confirmPass = $_POST["confirmPassword"] ??"";
  
    if( $username === ""||$currentPassword === "" || $password === "" || $confirmPass !== $password){
        //error
        $errorMessage = "Passwords dont match or can't be blank";
        //display rego form with errors
        include_once "./components/resetPassword.html.php";
    } else {
        //create new user
        //detect collision
        try {

            $sql = "select userName, password from user where userName = :username";
       
            $statement = $db->prepareStatement($sql, ':username',  $username,1);
          
            $rows = $statement->fetchAll();
            $row = $rows[0];
            
            $oldPassword = $row["password"];

            
            //public static function CheckPassword($currentPassword, $oldPassword)
            if(Auth::CheckPassword( $currentPassword, $oldPassword)){

                $hash = Auth::ReturnHash($password);

                if(Auth::CheckPassword($password, $oldPassword)){
                    $errorMessage = "new password cant be old password";
                    include_once "./components/resetPassword.html.php";
                } else {
                    $sql = "UPDATE user set user.password =? where userName =?  limit 1";
                    $statement = $db->prepareMultiParamStatement($sql, $hash, 1,  $username, 1 );
                    $successMessage = "password updated successfully!";
                    include_once "./components/resetPassword.html.php";
                }       

            } else {
                //no collision load login page and register user
                //An existing user was found collision
                $errorMessage = "Current password invalid";
                //display rego form with errors
                include_once "./components/resetPassword.html.php";
                

            }

        
        } catch (Exception $e) {
            $errorMessage = "Something went wrong! Try again later" . $e->getMessage();
            //display rego form with errors
            include_once "./components/resetPassword.html.php";
          
        }
        //Disp
     
    }


} else {

    include_once "./components/resetPassword.html.php";
}

$output = ob_get_clean();

$title = "Sports Warehouse - Register";
include_once "./components/layout.html.php";


/**
 * @param string $fieldName
 * @return string 
 */
function setValue($fieldName){
    return htmlspecialchars($_POST[$fieldName] ?? "");
}

?>