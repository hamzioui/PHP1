<?php
include '../function/function.php';
$name = "";
$description = "";
$price = "";
$image = "";

if(isset($_POST['name'])){
    $name = $_POST['name'];
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
if(strlen($name) > 1 && strlen($description) > 1 && strlen($price) > 1 && strlen($image) > 1){
    $formdata = array(
        "id"=> generateUniqueId(),
        "name"=> $name,
        "description"=> $description,
        "price"=> $price,
        "image"=> $image,
        "created_at"=> date("Y/m/d")
    );

    $success = createProducts($formdata);
    if($success){
        $_SESSION['errorStatuts'] = true;
        $_SESSION['errorMessage'] = "products has been created";
        header("Location: ../views/dashboard.php");
    } else {
        var_dump("failed");
    }
}
die();