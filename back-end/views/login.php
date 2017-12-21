<?php
include '../function/function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Login Page - It Akademy</title>
    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets/css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="../assets/css/ace.min.css" />
    <link rel="stylesheet" href="../assets/css/ace-part2.min.css" />
    <link rel="stylesheet" href="../assets/css/ace-rtl.min.css" />
    <link rel="stylesheet" href="../assets/css/ace-ie.min.css" />
    <script src="../assets/js/html5shiv.min.js"></script>
    <script src="../assets/js/respond.min.js"></script>
</head>
<body class="login-layout">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <?php showAlert()?>
                    <div class="center">
                        <h1>
                            <i class="ace-icon fa fa-laptop red"></i>
                            <span class="red">It</span>
                            <span class="white" id="id-text2">Akademy</span>
                        </h1>
                    </div>
                    <div class="space-6"></div>
                    <div class="position-relative">
                        <div id="login-box" class="login-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header blue lighter bigger">
                                        <i class="ace-icon fa fa-coffee red"></i>
                                        Please Enter Your Information
                                    </h4>
                                    <div class="space-6"></div>
                                    <form action="../model/LoginModel.php" method="post">
                                        <fieldset>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right"><input type="text" class="form-control" name="username" placeholder="Username" />
                                                    <i class="ace-icon fa fa-user"></i>
                                                </span>
                                            </label>
                                            <label class="block clearfix">
                                                <span class="block input-icon input-icon-right">
												<input type="password" class="form-control" name="password" placeholder="Password" />
												<i class="ace-icon fa fa-lock"></i>
												</span>
                                            </label>
                                            <div class="space"></div>

                                            <div class="clearfix">
                                                <button type="submit" class="width-35 pull-right btn btn-sm btn-danger">
                                                    <i class="ace-icon fa fa-key"></i>
                                                    <span class="bigger-110">Login</span>
                                                </button>
                                            </div>
                                            <div class="space-4"></div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/jquery-2.1.4.min.js"></script>
<script>
    setTimeout(fade_out, 10000);
    function fade_out() {
        $("#alert").fadeOut().empty();
    }
</script>
</body>
</html>
