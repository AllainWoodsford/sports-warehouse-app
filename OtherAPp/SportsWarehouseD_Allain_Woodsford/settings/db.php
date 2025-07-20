<?php
//this file contains the database settings for the application
//it detects if the application is running locally or on a remote server
//the correct database settings are set
//this file needs to be included in all the files that connect to the database
//check if script is running locally
    if($_SERVER["SERVER_NAME"] == "localhost" || $_SERVER["SERVER_ADDR"] == "127.0.0.1")
    {
    //website is running unser locahost - use local DB details
        $dsn = "mysql:host=localhost;dbname=sportswh;charset=utf8";
        $username = "sportswarehouse";
        $password = "123456";
    }
    else
    {
        $dsn = "mysql:host=191.101.79.1;dbname=u891782227_sportswh;charset=utf8";
        $username = "u891782227_sportswhadmin1";
        $password = "gi?iW%DZjDVo]2b:*TZU3h#.-5AsqT78nKCk+125RV744F?+FM*7)Q6AT?!2>uNd0Uw%h6^04K8g2h1iU?xN!#7qLH3uu%!DpXN8"; 
    }
?>