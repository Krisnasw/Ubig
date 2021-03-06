<?php
    error_reporting(E_ALL);
    date_default_timezone_set("Asia/Jakarta");

    if (empty($_SESSION['tipeuser']) AND empty($_SESSION['passuser'])) {
        # code...
        echo "<link href='css/style.css' rel='stylesheet' type='text/css'>
        <center>Untuk mengakses halaman ini, Anda harus login <br>";
        echo "<a href=index.php><b>LOGIN</b></a></center>";
    }

    $ck = new Kendaraan();

    if (isset($_POST['addkat'])) {
        # code...
        $kat = $_POST['pft'];

        $ck->newKategori($kat);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Intive Studio">

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
        
    </head>


    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- Top Bar Start -->
            <!-- Top Bar End -->

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
                                <h4 class="pull-left page-title">General elements</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">General elements</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Input Artikel</h3></div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form">                                    
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Judul</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="Judul Artikel" name="judul">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Waktu</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" disabled name="waktu" readonly value="<?=date('s-m-Y');?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">Author</label>
                                                <div class="col-md-10">
                                                    <input type="text" class="form-control" value="<?=$_SESSION['nama'];?>" name="author" readonly disabled>
                                                </div>
                                            </div>         
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Isi</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Pilih Kategori</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control">

                                            <?php

                                                $kat = $ck->showKat();
                                                while ($row = $kat->fetch_array()) {
                                                    # code...
                                            ?>
                                                        <option><?=$row['nama_kat']?></option>
                                            <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group pull-right">
                                                <button name="add" type="submit" class="btn btn-primary waves-effect waves-light m-b-5">Simpan</button>
                                            </div>
                           
                                        </form>
                                    </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div> <!-- End row -->

                        <!-- Input groups -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Tambah Kategori</h3></div>
                                    <div class="panel-body">
                                    
                                        <form class="form-horizontal" role="form" method="POST">
                                            <div class="form-group">

                                                <label class="col-md-2 control-label" for="example-input1-group1">Nama Kategori</label>
                                                <div class="col-md-7">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                                        <input type="text" name="pft" class="form-control" placeholder="Kategori Baru">
                                                    </div>
                                                </div>

                                            </div> <!-- form-group -->

                                            <div class="form-group pull-right">
                                                <button name="addkat" type="submit" class="btn btn-primary waves-effect waves-light m-b-5">Simpan</button>
                                            </div>
                                          
                                        </form>
                                    
                                   </div> <!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col -->
                        </div> <!-- End row -->

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                <footer class="footer text-right">
                    2015 © Moltran.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- Main  -->
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