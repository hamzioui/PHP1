<?php
include 'layout/header.php';
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
                        Create new page
                    </h1>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <form class="form-horizontal" role="form" action="../model/pageModel.php" method="post">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name page</label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" name="pagename" placeholder="put the name page" class="col-xs-10 col-sm-5" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Name title</label>

                                <div class="col-sm-9">
                                    <input type="text" id="form-field-1" name="pagetitle" placeholder="put the title page" class="col-xs-10 col-sm-5" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-6">Content</label>

                                <div class="col-sm-9">
                                    <textarea data-rel="tooltip" name="content" data-placement="bottom" class="form-control" id="form-field-8" placeholder="Default Text" style="margin: 0px 66.3125px 0px 0px; width: 451px; height: 79px;"></textarea>
                                    <span class="help-button" data-rel="popover" data-trigger="hover" data-placement="left" data-content="do not put the html and body tags" title="important">?</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-12 col-sm-3">Include Navbar</label>
                                <div class="controls col-xs-12 col-sm-9">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <label>
                                                <input name="header" class="ace ace-switch" type="checkbox">
                                                <span class="lbl"></span>
                                            </label>
                                        </div>
                                    </div>
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