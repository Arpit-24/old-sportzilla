<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SportZilla| Login</title>

    <link href="<?php echo BASE_URI."templates/";?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URI."templates/";?>font-awesome/css/font-awesome.css" rel="stylesheet">
     <!-- Toastr style -->
    <link href="<?php echo BASE_URI."templates/"?>css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URI."templates/";?>css/animate.css" rel="stylesheet">
    <link href="<?php echo BASE_URI."templates/";?>css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">
 <h1 class="logo-name" style="text-align:center">SportZilla</h1>
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

               

            </div>
            <h3>Brainstorming Sports Puzzles</h3>
            <p>Happy Solving..!!
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" action="index.html">
                <!-- <div class="form-group">
                    <input type="email" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="">
                </div> -->
                <a href="<?php if(!empty($authUrl)) echo $authUrl;?>" class="btn btn-block btn-danger btn-outline"><i class="fa fa-google"></i> Login With Gmail</a>

                <a href="#"><small>Login problems?</small></a>
                <!-- <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Create an account</a> -->
            </form>
            <p class="m-t"> <small>coding club &copy; <?php echo date("Y");?></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo BASE_URI."templates/";?>js/jquery-2.1.1.js"></script>
    <script src="<?php echo BASE_URI."templates/";?>js/bootstrap.min.js"></script>
     <!-- Toastr -->
    <script src="<?php echo BASE_URI."templates/"?>js/plugins/toastr/toastr.min.js"></script>
</body>

</html>
