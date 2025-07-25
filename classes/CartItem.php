<?php
class CartItem
{
private $_itemName;
 private $_quantity;
 private $_price;
 private $_productID;
 private $_photo;
 //optional photo
 //constructor
 public function __construct($itemName, $quantity, $price, $productID, $photo)
 {
 $this->_itemName = $itemName;
 $this->_quantity = (int)$quantity;
 $this->_price = (float)$price;
 $this->_productID = (int)$productID;
 $this->_photo = $photo;
 }

 //get quantity
 public function getQuantity()
 {
 return $this->_quantity;
 }

 public function getPhoto(){
    return $this->_photo;
 }
 //set quantity
 public function setQuantity($value)
 {
 if($value >= 0)
 {
 $this->_quantity = (int)$value;
 }
 else
 {
 throw new Exception("Quantity must be positive");
 }
 }
 //get price
 public function getPrice()
 {
 return $this->_price;
 }
 //get Item ID
 public function getItemId()
 {
 return $this->_productID;
 }
 //get Item name
 public function getItemName()
 {
 return $this->_itemName;
 }
}
?>