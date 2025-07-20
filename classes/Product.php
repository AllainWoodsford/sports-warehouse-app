<?php
//this class is part of the business layer it uses the DBAccess class
require_once("DBAccess.php");
class Product
{
//private properties
private $_productName;
private $_productId;
private $_price;
private $_db;
//constructor sets up the database settings and creates a DBAccess object
public function __construct()
 {
 //get database settings
 include "settings/db.php";
 try
 {
 //create database object
 $this->_db = new DBAccess($dsn, $username, $password);
 }
 catch (PDOException $e)
 {
 die("Unable to connect to database, ". $e->getMessage());
 }
 }
//set and get methods
//get product ID, there is no set as the primary key should not be changed
public function getProductID()
 {
 return $this->_productId;
 }

 public function getProductName()
 {
 return $this->_productName;
 }
//get the price
public function getPrice()
 {
 return $this->_price;
 }

//get a product from the database for the id supplied
public function getProduct($id)
 {
    try
    {
        //connect to db
        $pdo = $this->_db->connect();
        //set up SQL and bind parameters
        $sql = "select productId, productName, unitPrice from products where productId =
        :productId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':productId', $id, PDO::PARAM_INT);
        //execute SQL
        $rows = $this->_db->executeSQL($stmt);
        //get the first row as it is a primary key there will only be one row
        $row = $rows[0];
        //populate the private properties with the retreived values
        $this->_productId = $row["productId"];
        $this->_productName = $row["productName"];
        $this->_price = $row["unitPrice"];
    }
    catch (PDOException $e)
    {
        throw $e;
    }
 }

//get all products limiting to 9just for exercise purposes
public function getProducts()
 {
    try
    {
        //connect to db
        $pdo = $this->_db->connect();
        //set up SQL
        $sql = "select productId, productName, unitPrice from products limit 9";
        $stmt = $pdo->prepare($sql);
        //execute SQL
        $rows = $this->_db->executeSQL($stmt);
        return $rows;
    }
    catch (PDOException $e)
    {
        throw $e;
    }
 }

}
?>