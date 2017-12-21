<?php
include 'layout/header.php';
$alluser = listAllUsers();
    ?>
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Users</a>
                    </li>
                </ul>
            </div>
            <div class="page-content">
                <div class="page-header">
                    <h1>
                            Users
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <form class="form-horizontal" role="form" action="../model/UsersModel.php" method="post">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Username</label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" name="username" placeholder="put the name page" class="col-xs-10 col-sm-5" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Password</label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" name="password" placeholder="put the title page" class="col-xs-10 col-sm-5" />
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
                <div class="row">
                    <div class="col-xs-12">
                        <table id="simple-table" class="table  table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>lists Users</th>
                                <th>Title</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  foreach($alluser as $key => $rows): ?>
                                <tr>
                                    <td>
                                        <?=$rows['name'];?>
                                    </td>
                                    <td>
                                        <?=$rows['password'];?>
                                    </td>

                                    <td>
                                        <div class="hidden-sm hidden-xs btn-group">
                                            <a href="../model/deleteModel.php?filename=<?=$rows['name'];?>" class="btn btn-xs btn-danger">
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
    </div>
<?php
include 'layout/footer.php';
?>