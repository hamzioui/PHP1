<?php
session_start();
$myFile ="../../auth.json";


$password ="";
$username = "";
$arr_data = array();

if(isset($_POST)){
    if(isset($_POST['username']) ){
        $username = $_POST['username'];
    }
    if(isset($_POST['password']) ){
        $password = $_POST['password'];
    }
}

if($password == "" && $username == ""){
    $_SESSION['errorStatuts'] = true;
    $_SESSION['errorMessage'] = "Please fill all the fields";
}else{
    $formdata = array(
        'name'=> $username,
        'password'=> $password
    );


    $jsondata = file_get_contents($myFile);
    $arr_data = json_decode($jsondata, true);

    array_push($arr_data,$formdata);

    //Convert updated array to JSON
    $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

    //write json data into data.json file
    if(file_put_contents($myFile, $jsondata)) {
        echo 'Data successfully saved';
        $_SESSION['errorStatuts'] = true;
        $_SESSION['errorMessage'] = "user $username has been created";
    }
    else
        echo "error";

}