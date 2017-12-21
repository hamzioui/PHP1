<?php
include 'layout/header.php';
if(isset($_GET['productId'])) {
    $productId = $_GET['productId'];
    $result = FindProduct($productId);
    $name = $result['name'];
    $description = $result['description'];
    $price = $result['price'];
    $image = $result['image'];
    if($result === false){
        $render = Show404Page();
        echo  $render;
        die();
    }
    //var_dump($result);

}
?>
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Create page</a>
                    </li>
                </ul>
            </div>
            <div class="page-content">
                <div class="page-header">
                    <h1>
                        Create products
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <form class="form-horizontal" role="form" action="../model/productsModel.php" method="post">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name</label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" name="name" placeholder="put the name" class="col-xs-10 col-sm-5" value="<?=$name?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Description</label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" name="description" placeholder="put the product description" class="col-xs-10 col-sm-5" value="<?=$description?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Prix</label>

                                <div class="col-sm-9">
                                    <input type="number" id="form-field-1" name="price" placeholder="put product price" class="col-xs-10 col-sm-5" value="<?=$price?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Curent image</label>

                                <div class="col-sm-9">
                                  <img src="<?=$image?>" height="150" width="150">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Image</label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" name="image" placeholder="put the image link" class="col-xs-10 col-sm-5" value="<?=$image?>" />
                                </div>
                            </div>

                    </div>
                    <div class="form-group" style="text-align: center">
                        <button type="submit" class="btn btn-app btn-grey btn-xs radius-4" style="text-align: center">
                            <i class="ace-icon fa fa-floppy-o bigger-160"></i>

                            Save
                            <span class="badge badge-transparent">
												<i class="light-red ace-icon fa fa-asterisk"></i>
											</span>
                        </button>
                    </div>
                    </form>

                    <div class="hr hr-18 dotted hr-double"></div>

                </div><!-- /.col -->
            </div>
        </div>

    </div>
    </div>
<?php
include 'layout/footer.php';
?>