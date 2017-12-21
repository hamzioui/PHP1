<?php
include '../function/function.php';

if (!file_exists('../../template')) {
    mkdir('../../template', 0777, true);
}
$filename = $_POST['pagename'];
$content = $_POST['content'];
$pagetitle = $_POST['pagetitle'];
if(isset($_POST['header'])){
    $header = true;
}else{
    $header = false;
}

$template = generateTemplate($pagetitle,$content,$header);
$file = "../../template/$filename.html";

file_put_contents($file, $template);

transformPage($file);

header("Location: ../views/dashboard.php");
