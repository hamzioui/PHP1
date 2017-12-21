<?php
session_start();
if(!isset($_SESSION['loggin'])){
//header("Location: ../views/login.php");
    //die("not access");

}
function generateTemplate($title,$body,$header){
    if($header){
        $headerContent = generateHeade();
    } else{
        $headerContent = "";
    }
    return "<!DOCTYPE html>
<html>
<head>
<title>$title</title>
 <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <link rel=\"stylesheet\" href=\"css/bootstrap.css\">
    <link rel=\"stylesheet\" href=\"css/style.css\">
</head>
<body>
$headerContent
$body
<script src=\"https://code.jquery.com/jquery-3.2.1.slim.min.js\" integrity=\"sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN\" crossorigin=\"anonymous\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js\" integrity=\"sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh\" crossorigin=\"anonymous\"></script>
<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js\" integrity=\"sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ\" crossorigin=\"anonymous\"></script>
</body>
</html>";
}


function Iterate()
{
    $allFile= array();
    $dir = '../../template';
    $dh  = opendir($dir);
    $files1 = array();
    while (false !== ($fileName = readdir($dh))) {
        $ext = substr($fileName, strrpos($fileName, '.') + 1);
        if(in_array($ext, array("html")))
            $files1[] = $fileName;
    }

    $i = 0;
    foreach ($files1 as $key => $value){
        $file = "../../template/$value";
        libxml_use_internal_errors(true);
        $page = file_get_contents($file);
        $dom = new DOMDocument;
        $dom->loadHTML($page);
        libxml_use_internal_errors(false);
        preg_match('/<title>(.*?)<\/title>/', $page, $matches);
        preg_match("/<body[^>]*>(.*?)<\/body>/is", $page, $body);
        $allFile[$i]['filename'] = $value;
        $allFile[$i]['title'] = $matches[1];
            $i++;
    }
    return $allFile;

}


function deleteFile($file)
{
    $finalFile = "../../template/$file";
    if (unlink($finalFile)) {
        return true;
    } else {
        return false;
    }
}

function Deconnect()
{
    session_destroy();
    header("Location: ../views/login.php");
    die();
}


function showAlert()
{
    if(isset($_SESSION['errorStatuts'])){
        if($_SESSION['errorStatuts']){
            echo " <div class=\"center\" id=\"alert\">
                        <div class=\"pull-left alert alert-danger no-margin alert-dismissable\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\">
                                <i class=\"ace-icon fa fa-times\"></i>
                            </button>

                            wrong password or login
                        </div>
                    </div>";
        }
    }

}


function generateHeade(){
    return "
    <nav class=\"navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top\">
      <button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarsExampleDefault\" aria-controls=\"navbarsExampleDefault\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
      <a class=\"navbar-brand\" href=\"#\">Navbar</a>

      <div class=\"collapse navbar-collapse\" id=\"navbarsExampleDefault\">
        <ul class=\"navbar-nav mr-auto\">
          <li class=\"nav-item active\">
            <a class=\"nav-link\" href=\"#\">Home <span class=\"sr-only\">(current)</span></a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"#\">Link</a>
          </li>
        </ul>
        <form class=\"form-inline my-2 my-lg-0\">
          <input class=\"form-control mr-sm-2\" type=\"text\" placeholder=\"Search\">
          <button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"submit\">Search</button>
        </form>
      </div>
    </nav>
    ";
}

function findwordTitle($word){
    $str = substr($word[1], 1);
    $reg = '/(?<=\@)(.*?)(?=\@)/';
    if(preg_match('/{h1./', $word[0])){
        if(preg_match($reg, $word[0])){
            preg_match_all($reg, $word[0], $matches, PREG_SET_ORDER, 0);
            $class = $matches[0][0];
            $test = "class='$class'";
            $str = preg_replace('/\@.*?\@|\s*/', '', $str);
            return "<h1 $test>$str</h1>";
        }
        else {
            return "<h1>$str</h1>";
        }
    } else if (preg_match('/{h2./', $word[0])){
        if(preg_match($reg, $word[0])){
            preg_match_all($reg, $word[0], $matches, PREG_SET_ORDER, 0);
            $class = $matches[0][0];
            $test = "class='$class'";
            $str = preg_replace('/\@.*?\@|\s*/', '', $str);
            return "<h2 $test>$str</h2>";
        }
        else {
            return "<h2>$str</h2>";
        }
    }
    else if (preg_match('/{h3./', $word[0])){
        if(preg_match($reg, $word[0])){
            preg_match_all($reg, $word[0], $matches, PREG_SET_ORDER, 0);
            $class = $matches[0][0];
            $test = "class='$class'";
            $str = preg_replace('/\@.*?\@|\s*/', '', $str);
            return "<h3 $test>$str</h3>";
        }
        else {
            return "<h3>$str</h3>";
        }
    }
    else{
        // return "<h3>eee</h3>";
    }

}

function transformPage($page){
    $pages = file_get_contents($page);

    $regex = "#{h(.*)}#isU";
    $reg = '/(?<=\@)(.*?)(?=\@)/';
    $test = preg_replace_callback($regex,"findwordTitle",$pages);
    echo $test;
    file_put_contents($page,$test);
}

function transformToDiv($page){
    $pages = file_get_contents($page);

    $regex = "#{div(.*)}#isU";
    $value = preg_replace_callback($regex,"findwordTitle",$pages);
    echo $value;
    file_put_contents($page,$value);
}

function findDiv($sentence)
{

}