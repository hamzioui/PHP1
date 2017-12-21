<?php
//session_start();
include '../function/function.php';
//if(!$_SESSION['loggin']){
  //  die("not access");
   //header("Location: index.php");
//}

if(isset($_GET['filename'])) {
    $filename = $_GET['filename'];
    $sucess = deleteFile($filename);
    if($sucess){

        header("Location: ../views/dashboard.php");
        die();
    }else{
        var_dump("not sucess");
        die();
    }

}