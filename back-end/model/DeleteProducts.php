<?php
include '../function/function.php';

if(isset($_GET['productId'])) {
    $productId = $_GET['productId'];
    deleteProducts($productId);
   /* if($sucess){

        header("Location: ../views/dashboard.php");
        die();
    }else{
        var_dump("not sucess");
        die();
    }*/

}