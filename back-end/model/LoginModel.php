<?php
$string = file_get_contents("../../auth.json");
$json_a = json_decode($string, true);
$authArray = $json_a;
session_start();
if(isset($_POST)){
    if(isset($_POST['username']) ){
        $username = $_POST['username'];
    }
    if(isset($_POST['password']) ){
        $password = $_POST['password'];
    }
}
$loggin = false;
if(!isset($password) OR !isset($username)){
    echo "password";
    $_SESSION['errorStatuts'] = true;
    $_SESSION['errorMessage'] = "mot de passe incorrect";
    header("Location: ../views/login.php");
} else {
    foreach ($authArray as $key => $value){

        if($value['name'] == "$username" && $value['password'] == "$password"){
            $loggin = true;
            break;
        } else{
            $loggin = false;
        }
    }

    if($loggin){
        $_SESSION['errorStatuts'] = false;
        $_SESSION['loggin'] = $loggin;
        $_SESSION['name'] = $username;
        header("Location: ../views/dashboard.php");
    }else{
        $_SESSION['errorStatuts'] = true;
        $_SESSION['errorMessage'] = "mot de passe incorrect";
        header("Location: ../views/login.php");
    }

}
die();