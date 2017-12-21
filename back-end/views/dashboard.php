<?php
include 'layout/header.php';
$allProducts = listAllProducts();
?>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>
                </ul>
            </div>
            <div class="page-content">
                <div class="page-header">
                    <h1>
                        List Products
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <table id="simple-table" class="table  table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>name</th>
                                <th>Description</th>
                                <th>price</th>
                                <th>Image</th>
                                <th>created date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  foreach($allProducts as $key => $rows): ?>
                                <tr>
                                    <td>
                                        <?=$rows['name'];?>
                                    </td>
                                    <td>
                                        <?=$rows['description'];?>
                                    </td>
                                    <td>
                                        <?=$rows['price'];?> €
                                    </td>
                                    <td>
                                        <img src="<?=$rows['image'];?>" height="50" width="50">

                                    </td>
                                    <td>
                                        <?=$rows['created_at'];?>
                                    </td>

                                    <td>

                                        <div class="hidden-sm hidden-xs btn-group">
                                            <a href="product.php?productId=<?=$rows['id'];?>" class="btn btn-xs btn-primary">
                                                <i class="ace-icon fa fa-pencil bigger-120"></i>
                                            </a>
                                        </div>
                                        <div class="hidden-sm hidden-xs btn-group">
                                            <a href="../model/DeleteProducts.php?productId=<?=$rows['id'];?>" class="btn btn-xs btn-danger">
                                                <i class="ace-icon fa fa-trash bigger-120"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
include 'layout/footer.php';
?>