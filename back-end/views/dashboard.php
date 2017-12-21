<?php
include 'layout/header.php';
$allfile = Iterate();
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
                        List page
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <table id="simple-table" class="table  table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Page Name</th>
                                <th>Title</th>

                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  foreach($allfile as $key => $rows): ?>
                            <tr>
                                <td>
                                    <a href="../../template/<?=$rows['filename'];?>" target="_blank"><?=$rows['filename'];?></a>
                                </td>
                                <td>
                                    <?=$rows['title'];?>
                                </td>

                                <td>
                                    <div class="hidden-sm hidden-xs btn-group">
                                        <a href="../model/deleteModel.php?filename=<?=$rows['filename'];?>" class="btn btn-xs btn-danger">
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