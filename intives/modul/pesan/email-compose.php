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

        <title>Intive Studio | Compose Email</title>
        
        <!--bootstrap-wysihtml5-->
        <link href="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css">
        
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
                                <h4 class="pull-left page-title">Compose Mail</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Mail</a></li>
                                    <li class="active">Compose Mail</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            
                            <!-- Left sidebar -->
                            <div class="col-md-4 col-lg-3">
                                <a href="?mod=inbox" class="btn btn-danger waves-effect waves-light btn-block">Back to Inbox</a>
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
                                <h3 class="panel-title m-t-40">Labels</h3>
                                <div class="panel panel-default p-0 p-t-20 m-t-20">
                                    <div class="panel-body p-0">
                                        <div class="list-group no-border">
                                          <a href="#" class="list-group-item no-border"><span class="fa fa-circle text-info pull-right"></span>Web App</a>
                                          <a href="#" class="list-group-item no-border"><span class="fa fa-circle text-warning pull-right"></span>Project 1</a>
                                          <a href="#" class="list-group-item no-border"><span class="fa fa-circle text-purple pull-right"></span>Project 2</a>
                                          <a href="#" class="list-group-item no-border"><span class="fa fa-circle text-pink pull-right"></span>Friends</a>
                                          <a href="#" class="list-group-item no-border"><span class="fa fa-circle text-success pull-right"></span>Family</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <!-- End Left sidebar -->
                            
                            <!-- Right Sidebar -->
                            <div class="col-md-8 col-lg-9">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="btn-toolbar" role="toolbar">
                                            <div class="pull-right">
                                                <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="fa fa-floppy-o"></i></button>
                                                <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="fa fa-trash-o"></i></button>
                                                <button class="btn btn-purple waves-effect waves-light"> <span>Send</span> <i class="fa fa-send m-l-10"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="panel panel-default m-t-20">
                                    <div class="panel-body p-t-30">
                                        
                                        <form role="form">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="To">
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="email" class="form-control" placeholder="Cc">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="email" class="form-control" placeholder="Bcc">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Subject">
                                            </div>
                                            <div class="form-group">
                                                <textarea class="wysihtml5 form-control" placeholder="Message body" style="height: 200px"></textarea>
                                            </div>
                                        </form>
                                    </div> <!-- panel -body -->
                                </div> <!-- panel -->
                            </div> <!-- End Rightsidebar -->
                        
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

        <!--Editor-->
        <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
        <script type="text/javascript" src="assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
    
    </body>
</html>