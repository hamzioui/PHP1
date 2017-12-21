<?php
include '../function/function.php';
$allproducts = listAllProducts();
$listCart = listCart();
$render ="";
$rendertotal ="";
if(count($listCart)){
    $render = "<a href='' class='btn btn-primary'>Paid</a>";
    $total =  TotalCart();
    if($total){
        $rendertotal = "
        <div class='row'>
        <div class='col-md-12'>
        total product number : $total[0]  
</div>
        <div class='col-md-12'>
        total product : $total[1] € 
</div>
</div>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">Navbar</a>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<section class="jumbotron text-center">
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="http://what2.co.uk/wp-content/uploads/2013/09/jordans-nike-.png" alt="First slide" height="300">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="https://s-media-cache-ak0.pinimg.com/originals/3d/f7/ce/3df7ce2d58516b8b3876cfc7d9fa3e3e.jpg" alt="Second slide" height="300">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="http://www.kicks-daily.com/wp-content/uploads/2015/09/PNA_081815_Homepage-Hero-Suede-Mono-Pack-background.jpg" alt="Third slide" height="300">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<div class="album text-muted">

        <div class="row">
            <div class="col-md-9">
                <?php  foreach($allproducts as $key => $rows): ?>
                    <div class="card" style="width: 20rem;">
                        <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" style="height: 180px; width: 100%; display: block;" src="<?=$rows['image'];?>" data-holder-rendered="true">
                        <div class="card-body">
                            <h5 class="card-title"><?=$rows['name'];?></h5>
                            <p class="card-text"><?=$rows['description'];?></p>
                            <a href="../model/addTocart.php?productId=<?=$rows['id'];?>" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <div class="col-md-3" style="border: 2px solid grey">
                <h2>Panier</h2>
                <ul class="list-group">

                    <?php  foreach($listCart as $key => $rows): ?>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="<?=$rows['image'];?>" height="50" width="50">
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <p>
                                                <?=$rows['name'];?>
                                            </p>
                                            <p>
                                                <?=$rows['price'];?> €
                                            </p>
                                        </div>
                                        <div class="col-md-2">
                                            <span class="badge badge-default badge-pill"><?=$rows['nbr'];?></span>
                                        </div>

                                    </div>
                                </div>

                            </div>

                        </li>
                    <?php endforeach;?>
                </ul>
                <?php
                echo $rendertotal;
                 echo $render;
                ?>
            </div>
        </div>
</div>

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">Back to top</a>
        </p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script>
    $('.carousel').carousel({
        interval: 2000
    })
</script>
</body>
</html>
