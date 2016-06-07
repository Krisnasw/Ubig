<?php

    if (empty($_SESSION['tipeuser']) AND empty($_SESSION['passuser'])) {
        # code...
        echo "<link href='css/style.css' rel='stylesheet' type='text/css'>
        <center>Untuk mengakses halaman ini, Anda harus login <br>";
        echo "<a href=index.php><b>LOGIN</b></a></center>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/favicon_1.ico">

        <title>Moltran - Responsive Admin Dashboard Template</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/core.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/components.css" rel="stylesheet" type="text/css">
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css">

        <script src="assets/js/modernizr.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65046120-1', 'auto');
  ga('send', 'pageview');

</script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        
    </head>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <!-- Left Sidebar End -->


    		<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Inbox</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Mail</a></li>
                                    <li class="active">Inbox</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                        
                            <!-- Left sidebar -->
                            <div class="col-lg-3 col-md-4">
                                <a href="email-compose.html" class="btn btn-danger waves-effect waves-light btn-block">Compose</a>
                                <div class="panel panel-default p-0 m-t-20">
                                    <div class="panel-body p-0">
                                        <div class="list-group mail-list">
                                          <a href="#" class="list-group-item no-border active"><i class="fa fa-download m-r-5"></i>Inbox <b>(8)</b></a>
                                          <a href="#" class="list-group-item no-border"><i class="fa fa-star-o m-r-5"></i>Starred</a>
                                          <a href="#" class="list-group-item no-border"><i class="fa fa-file-text-o m-r-5"></i>Draft <b>(20)</b></a>
                                          <a href="#" class="list-group-item no-border"><i class="fa fa-paper-plane-o m-r-5"></i>Sent Mail</a>
                                          <a href="#" class="list-group-item no-border"><i class="fa fa-trash-o m-r-5"></i>Trash <b>(354)</b></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Left sidebar -->
                        
                            <!-- Right Sidebar -->
                            <div class="col-lg-9 col-md-8">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="btn-toolbar" role="toolbar">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-inbox"></i></button>
                                                <button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-exclamation-circle"></i></button>
                                                <button type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-trash-o"></i></button>
                                            </div>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-folder"></i>
                                                <b class="caret"></b>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#fakelink">Action</a></li>
                                                    <li><a href="#fakelink">Another action</a></li>
                                                    <li><a href="#fakelink">Something else here</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#fakelink">Separated link</a></li>
                                                </ul>
                                            </div>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-tag"></i>
                                                <b class="caret"></b>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#fakelink">Action</a></li>
                                                    <li><a href="#fakelink">Another action</a></li>
                                                    <li><a href="#fakelink">Something else here</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#fakelink">Separated link</a></li>
                                                </ul>
                                            </div>
                                            
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                  More
                                                  <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">
                                                  <li><a href="#fakelink">Dropdown link</a></li>
                                                  <li><a href="#fakelink">Dropdown link</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End row -->
                                
                                <div class="panel panel-default m-t-20">
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover mails">
                                                <tbody>

                                                    <tr class="active">
                                                        <td class="mail-select">
                                                            <div class="checkbox checkbox-primary">
                                                                <input id="checkbox17" type="checkbox">
                                                                <label for="checkbox17">
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="mail-rateing">
                                                            <i class="fa fa-star"></i>
                                                        </td>
                                                        <td>
                                                            <a href="email-read.html">Google Inc</a>
                                                        </td>
                                                        <td>
                                                            <a href="email-read.html">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                                        </td>
                                                        <td>
                                                            <i class="fa fa-paperclip"></i>
                                                        </td>
                                                        <td class="text-right">
                                                            10 Feb
                                                        </td>
                                                    </tr>
                                                
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                        <hr>
                                        
                                        <div class="row">
                                            <div class="col-xs-7">
                                                Showing 1 - 20 of 289
                                            </div>
                                            <div class="col-xs-5">
                                                <div class="btn-group pull-right">
                                                  <button type="button" class="btn btn-default waves-effect"><i class="fa fa-chevron-left"></i></button>
                                                  <button type="button" class="btn btn-default waves-effect"><i class="fa fa-chevron-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    </div> <!-- panel body -->
                                </div> <!-- panel -->
                            </div> <!-- end Col-9 -->
                        
                        </div><!-- End row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar nicescroll">
                <h4 class="text-center">Chat</h4>
                <div class="contact-list nicescroll">
                    <ul class="list-group contacts-list">
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-1.jpg" alt="">
                                </div>
                                <span class="name">Chadengle</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <span class="name">Tomaslau</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <span class="name">Stillnotdavid</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-4.jpg" alt="">
                                </div>
                                <span class="name">Kurafire</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-5.jpg" alt="">
                                </div>
                                <span class="name">Shahedk</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-6.jpg" alt="">
                                </div>
                                <span class="name">Adhamdannaway</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-7.jpg" alt="">
                                </div>
                                <span class="name">Ok</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-8.jpg" alt="">
                                </div>
                                <span class="name">Arashasghari</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-9.jpg" alt="">
                                </div>
                                <span class="name">Joshaustin</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-10.jpg" alt="">
                                </div>
                                <span class="name">Sortino</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                    </ul>  
                </div>
            </div>
            <!-- /Right-bar -->


	    </div>
        <!-- END wrapper -->
	
	    <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/js/jquery.app.js"></script>
	
	</body>
</html>