<?php
include '../function/function.php';

if(isset($_POST['name'])){
    $name = $_POST['name'];
}
if(isset($_POST['id'])){
    $id = $_POST['id'];
}
if(isset($_POST['description'])){
    $description = $_POST['description'];
}
if(isset($_POST['price'])){
    $price = $_POST['price'];
}
if(isset($_POST['image'])){
    $image = $_POST['image'];
}
if(strlen($name) > 1 && strlen($description) > 1 && strlen($price) > 1 && strlen($image) > 1 && strlen($id) > 5){
    $formdata = array(
        "name"=> $name,
        "description"=> $description,
        "price"=> $price,
        "image"=> $image,
    );

    $success = ModifyProduct($id,$formdata);

    var_dump($success);
   /* if($success){
        $_SESSION['errorStatuts'] = true;
        $_SESSION['errorMessage'] = "products has been created";
    } else {
        var_dump("failed");
    }*/
}