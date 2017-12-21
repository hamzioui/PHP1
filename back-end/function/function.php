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
    unset($_SESSION['loggin']);
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


function listAllUsers()
{
    $myFile ="../../auth.json";
    $jsondata = file_get_contents($myFile);
    $arr_data = json_decode($jsondata, true);
    return $arr_data;
}

function listAllProducts()
{
    $myFile ="../../products.json";
    $jsondata = file_get_contents($myFile);
    $arr_data = json_decode($jsondata, true);
    return $arr_data;
}

function generateUniqueId(){
    $uniqueId = time() . substr(md5(uniqid(mt_rand(), true)), 15);
    return $uniqueId;
}


function deleteProducts($productId)
{
    $myFile ="../../products.json";
    $arr_data = array();
    $jsondata = file_get_contents($myFile);
    $arr_data = json_decode($jsondata, true);
    if(count($arr_data) > 0 )
    {
        foreach ($arr_data as $key => $value){
            if($value['id'] == $productId){
                unset($arr_data[$key]);
                $arr_data = array_values($arr_data);
            }
        }
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
        if(file_put_contents($myFile, $jsondata)) {
            return true;
        }else{
            return false;
        }
    }
}

function FindProduct($productId)
{
    $myFile ="../../products.json";
    $arr = array();
    $jsondata = file_get_contents($myFile);
    $arr_data = json_decode($jsondata, true);
    if(count($arr_data) > 0 )
    {
        $val = false;
        foreach ($arr_data as $key => $value){
            if($value['id'] === $productId){
                $val = true;
                return $value;

            } else{
                $val = false;
            }
        }
        return $val;
    }
}

function ModifyProduct($productId,$formdata)
{
    $myFile ="../../products.json";
    $arr = array();

    $name = $formdata['name'];
    $description = $formdata['description'];
    $price = $formdata['price'];
    $image = $formdata['image'];
    $jsondata = file_get_contents($myFile);
    $arr_data = json_decode($jsondata, true);
    if(count($arr_data) > 0 )
    {
        foreach ($arr_data as $key => $value){
            if($value['id'] == $productId){
                $arr_data[$key]['name'] = $name;
                $arr_data[$key]['description'] = $description;
                $arr_data[$key]['price'] = $price;
                $arr_data[$key]['image'] = $image;
                $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
                if(file_put_contents($myFile, $jsondata)) {
                    return true;
                }else{
                    return false;
                }
            } else{
                return false;
            }

        }
    }
}

function Show404Page(){
    return "<div class=\"main-content\">
				<div class=\"main-content-inner\">
					<div class=\"breadcrumbs ace-save-state\" id=\"breadcrumbs\">
						<ul class=\"breadcrumb\">
							<li>
								<i class=\"ace-icon fa fa-home home-icon\"></i>
								<a href=\"#\">Home</a>
							</li>

							<li>
								<a href=\"#\">products Pages</a>
							</li>
							<li class=\"active\">Error 404</li>
						</ul><!-- /.breadcrumb -->

					</div>

					<div class=\"page-content\">
					

						<div class=\"row\">
							<div class=\"col-xs-12\">
								<!-- PAGE CONTENT BEGINS -->

								<div class=\"error-container\">
									<div class=\"well\">
										<h1 class=\"grey lighter smaller\">
											<span class=\"blue bigger-125\">
												<i class=\"ace-icon fa fa-sitemap\"></i>
												404
											</span>
											Product Not Found
										</h1>

										<hr>
										<h3 class=\"lighter smaller\">We looked everywhere but we couldn't find it!</h3>

										<div>
										

											<div class=\"space\"></div>
											<h4 class=\"smaller\">Try one of the following:</h4>

											<ul class=\"list-unstyled spaced inline bigger-110 margin-15\">
												<li>
													<i class=\"ace-icon fa fa-hand-o-right blue\"></i>
													Re-check the url for typos
												</li>

												<li>
													<i class=\"ace-icon fa fa-hand-o-right blue\"></i>
													Read the faq
												</li>

												<li>
													<i class=\"ace-icon fa fa-hand-o-right blue\"></i>
													Tell us about it
												</li>
											</ul>
										</div>

										<hr>
										<div class=\"space\"></div>

										<div class=\"center\">
											<a href=\"javascript:history.back()\" class=\"btn btn-grey\">
												<i class=\"ace-icon fa fa-arrow-left\"></i>
												Go Back
											</a>

											<a href=\"dashboard.php\" class=\"btn btn-primary\">
												<i class=\"ace-icon fa fa-tachometer\"></i>
												Dashboard
											</a>
										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div> <a href=\"#\" id=\"btn-scroll-up\" class=\"btn-scroll-up btn btn-sm btn-inverse\">
    <i class=\"ace-icon fa fa-angle-double-up icon-only bigger-110\"></i>
</a>
</div>
<script src=\"../assets/js/jquery-2.1.4.min.js\"></script>
<script src=\"../assets/js/jquery-1.11.3.min.js\"></script>

<script type=\"text/javascript\">
    if('ontouchstart' in document.documentElement) document.write(\"<script src='assets/js/jquery.mobile.custom.min.js'>\"+\"<\"+\"/script>\");
</script>

<script src=\"../assets/js/bootstrap.min.js\"></script>
<script src=\"../assets/js/jquery-ui.custom.min.js\"></script>
<script src=\"../assets/js/jquery.ui.touch-punch.min.js\"></script>
<script src=\"../assets/js/chosen.jquery.min.js\"></script>
<script src=\"../assets/js/spinbox.min.js\"></script>
<script src=\"../assets/js/bootstrap-datepicker.min.js\"></script>
<script src=\"../assets/js/bootstrap-timepicker.min.js\"></script>
<script src=\"../assets/js/moment.min.js\"></script>
<script src=\"../assets/js/jquery.dataTables.min.js\"></script>
<script src=\"../assets/js/jquery.dataTables.bootstrap.min.js\"></script>
<script src=\"../assets/js/dataTables.buttons.min.js\"></script>
<script src=\"../assets/js/daterangepicker.min.js\"></script>
<script src=\"../assets/js/bootstrap-datetimepicker.min.js\"></script>
<script src=\"../assets/js/bootstrap-colorpicker.min.js\"></script>
<script src=\"../assets/js/jquery.knob.min.js\"></script>
<script src=\"../assets/js/autosize.min.js\"></script>
<script src=\"../assets/js/jquery.inputlimiter.min.js\"></script>
<script src=\"../assets/js/jquery.maskedinput.min.js\"></script>
<script src=\"../assets/js/bootstrap-tag.min.js\"></script>
<script src=\"../assets/js/ace-elements.min.js\"></script>
<script src=\"../assets/js/ace.min.js\"></script>
</body>
</html>";
}


function createProducts($formData){
    $myFile ="../../products.json";
    $arr_data = array();
    $jsondata = file_get_contents($myFile);
    $arr_data = json_decode($jsondata, true);
    array_push($arr_data,$formData);
    $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

    if(file_put_contents($myFile, $jsondata)) {
        return true;
    }else{
        return false;
    }
}

function addToCart($productId){
    $arr = array();
    //unset($_SESSION['cart']);
    $myFile ="../../products.json";
    $arr = array();
    $jsondata = file_get_contents($myFile);
    $arr_data = json_decode($jsondata, true);
    $currentKey=0;
    $currentState = false;
    if(count($arr_data) > 0 )
    {
        $val = false;
        foreach ($arr_data as $key => $value){
            if($value['id'] === $productId){
                if(isset($_SESSION['cart'])){
                    $sessionCart = $_SESSION['cart'];
                    if(is_array($sessionCart)){

                        echo '<pre>' . var_export($_SESSION['cart'], true) . '</pre>';
                        foreach ($sessionCart as $key1 => $val2){
                            if($val2['id'] === $productId){
                                $currentKey = $key1;
                                $currentState = true;

                            }else{
                                $currentState = false;
                            }
                        }
                        if($currentState === true){
                            $sessionCart[$currentKey]['nbr'] = $sessionCart[$currentKey]['nbr']+1;
                            $_SESSION['cart'] = $sessionCart;
                        } else{
                            $formdata = array(
                                'nbr' => 1,
                                'name' => $value['name'],
                                'description' => $value['description'],
                                'price' => $value['price'],
                                'image' => $value['image'],
                                'id' => $value['id'],
                            );
                            $sessionCart[] = $formdata;
                            $_SESSION['cart'] = $sessionCart;
                        }


                    }
                    return true;

                }else{
                    $formdata = array(
                        'nbr' => 1,
                        'name' => $value['name'],
                        'description' => $value['description'],
                        'price' => $value['price'],
                        'image' => $value['image'],
                        'id' => $value['id'],
                    );

                    $sessionCart[]=$formdata;
                    $_SESSION['cart'] = $sessionCart;
                    return true;
                }

            } else{
                $val = false;
            }
        }
        return $val;
    }


    var_dump($_SESSION['cart']);
}

function listCart(){
    $arr = array();
    if(isset($_SESSION['cart'])){
        $sessionCart = $_SESSION['cart'];
        if(is_array($sessionCart)){
            return $sessionCart;
        }else{
            return $arr;
        }
    }else{
        return $arr;
    }
}
function TotalCart(){
    $arr = array();
    $total =0;
    $totalprice = 0;
    if(isset($_SESSION['cart'])){
        $sessionCart = $_SESSION['cart'];
        if(is_array($sessionCart)){
            foreach ($sessionCart as $key =>$value){
                $total += $value['nbr'];
                $currentprice = $value['nbr'] * $value['price'];
                $totalprice+=$currentprice;
            }
            $_SESSION['total'] = $total;
            $_SESSION['totalprice'] = $totalprice;

            $arr[] = $total;
            $arr[] = $totalprice;
            return $arr;
        }else{
            return false;
        }
    }else{
        return false;
    }
}