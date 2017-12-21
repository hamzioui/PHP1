<?php
include '../function/function.php';

if(isset($_GET['productId'])) {
    $productId = $_GET['productId'];
   $sucess = addToCart($productId);
   if($sucess){
       header("Location: ../template/index.php");
   }
}