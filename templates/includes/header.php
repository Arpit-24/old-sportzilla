<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SportZilla</title>

    <link href="<?php echo BASE_URI."templates/"?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URI."templates/"?>font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo BASE_URI."templates/"?>css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
   
    <!-- Toastr style -->
    <link href="<?php echo BASE_URI."templates/"?>css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo BASE_URI."templates/"?>js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="<?php echo BASE_URI."templates/"?>css/animate.css" rel="stylesheet">
    <link href="<?php echo BASE_URI."templates/"?>css/style.css" rel="stylesheet">
    <link href="<?php echo BASE_URI."templates/"?>css/custom.css" rel="stylesheet">

</head>

<body class="top-navigation" style="background: #0a0a19;">
<!--<a href="https://www.facebook.com/oasis.bitspilani?fref=ts" target="_blank" style="position:fixed;top:100px;"><img width="100px" src="<?php echo BASE_URI.'templates/images/oasis.jpg'?>" ></a> -->
    <div id="wrapper">
        <div id="page-wrapper" >
       <div class="row border-bottom ">
        <nav class="navbar navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <i class="fa fa-reorder"></i>
                </button>
                <a href="#" class="navbar-brand" style="background:#ED5565;font-weight:bold">SportZilla</a>
            </div>
            <div class="navbar-collapse collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a aria-expanded="false" role="button" href="layouts.html"> Coding Club, BITS Pilani</a>
                    </li>
                    <li>
                    <a href="#instructions" data-toggle="modal" data-target="#instructionsModal" >Instructions</a>
                    </li>
                    <li>
                    <a href="https://www.facebook.com/codingclubpilani?fref=ts" target="_blank" >Contact Us</a>
                    </li>
                   
                    <!-- <li class="dropdown">
                        <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Menu item <span class="caret"></span></a>
                        <ul role="menu" class="dropdown-menu">
                            <li><a href="">Menu item</a></li>
                            <li><a href="">Menu item</a></li>
                            <li><a href="">Menu item</a></li>
                            <li><a href="">Menu item</a></li>
                        </ul>
                    </li> -->

                </ul>
                <ul class="nav navbar-top-links navbar-right">
                 <li>
                    <a href="https://www.facebook.com/codingclubpilani?fref=ts">Points : <?php echo $points->score;?></a>
                    </li>
                    <li>
                        <a href="<?php echo BASE_URI;?>logout.php">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
        </div>