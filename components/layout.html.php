<?php 
if(!isset($_SESSION))
{
    session_start();
   
}
$curPageName =  trim(substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1));
if(isset($_POST["headerCartButton"]) ){
 
    if(isset($_SESSION["showCart"])){
        $showCart = !unserialize($_SESSION["showCart"]);
        $_SESSION["showCart"] =  serialize($showCart);
    } else {
        $_SESSION["showCart"] =  serialize(true);
    }
    ##echo "<meta http-equiv='refresh' content='0'>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/style.css">
    <script src="https://kit.fontawesome.com/6be0388533.js" crossorigin="anonymous"></script>
    <title><?= $title ?></title>
</head>
<body>
<div class="site-wrapper">
<?php include "./header.html.php"; ?>
    <main class="site-main">
        <?= $output ?? "no template" ?>
        <?php include_once "./cart.html.php"; ?>
    </main>
 <?php include "./footer.html.php"; ?>
 <!--By AWoodsford Web-UX navy-->
   <?php 
   include "../js/lazyLoadBanner.php"; 
  ?>
  <?php include "../js/menuButtons.php";
  ?> 
</div>  
</body>
</html>