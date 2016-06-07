<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CariKendaraan.id</title>
<?php include('style.php'); ?>
</head>
<body class="wp-automobile">
<div class="wrapper">
<?php include('header.php'); ?>
	<!-- Main Start -->
	<div class="main-section"> 
		<!--Main Banner-->
			<div id="cbp-fwslider" class="cbp-fwslider">
				<ul>
					<li><a href='#'><img src='assets/images/big/bg.jpg'/></a>
					<li><a href='#'><img src='assets/images/big/bg.jpg'/></a>
					<li><a href='#'><img src='assets/images/big/bg.jpg'/></a>
				</ul>
			</div>
		<!--Main Banner--> 
		<?php
			require_once("config/connect.php");
			require_once("controller/fungsiAll.php");
            require_once("controller/globalfunction.php");

            $accesskey = (string)GetAccessKey();

            $ck = new Kendaraan();
        ?>
		<!--Main Banner form-->
		<div class="page-section" style="background: rgba(36, 41, 49, 1); padding-top:33px;-webkit-box-shadow: 0 0 5px rgba(0,0,0,.4), inset 1px 2px rgba(255,255,255,.3);-moz-box-shadow: 0 0 5px rgba(0,0,0,.4), inset 1px 2px rgba(255,255,255,.3);box-shadow: 0 0 5px rgba(0,0,0,.4), inset 0px 2px rgba(255,255,255,.3);border: solid 1px #242931;">
			<div class="container">
				<div class="row">
					<div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row"> 
							<!--Element Section Start-->
							<div class="main-search">
								<form id="frm-cat" method="post">
									<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
										<div class="search-input"> <i class="icon-search2"></i>
											<input type="text" placeholder="Search by Keyword" />
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
										<div class="select-dropdown">
											<select class="chosen-select" id="seo_jns" name="seo_jns">
												<!-- <option value="" selected="selected">Select Brand</option> -->
											</select>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
										<div class="select-dropdown">
											<select class="chosen-select" id="seo_kat" name="seo_kat">
												<!-- <option selected="selected">Select Type</option> -->
											</select>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
										<div class="select-dropdown">
											<select class="chosen-select" id="seo_skat" name="seo_skat">
												<!-- <option selected="selected">Select Type</option> -->
											</select>
										</div>
									</div>
									<div class="col-lg-1 col-md-1 col-sm-3 col-xs-12">
										<div class="search-btn">
											<input type="button" value="submit" class="cs-bgcolor">
											<label><a href="#">ADVANCE SEARCH</a></label>
										</div>
									</div>
								</form>
							</div>
							<!--Element Section End--> 
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Main Banner form-->
		<!--full width category section-->
		<div class="page-section" style="background:#edf0f5 url(assets/extra-images/full-width-img-01.png) no-repeat; padding:100px 0 0 0;">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<div style="min-height:510px;"></div>
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<div class="row"> 
							<!--Element Section Start-->
							<div class="catagory-section">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-element-title">
										<h3>Browse cars by make</h3>
										<span class="cs-color">We currently have 428,897 cars available</span> </div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="cs-catagory">
										<ul>
											<li><a href="#"><span>Alfa Romeo</span><small>(256)</small></a></li>
											<li><a href="#"><span>Alpine</span><small>(157)</small></a></li>
											<li><a href="#"><span>Alpine</span><small>(145)</small></a></li>
											<li><a href="#"><span>Aston Martin</span><small>(456)</small></a></li>
											<li><a href="#"><span>Audi</span><small>(856)</small></a></li>
											<li><a href="#"><span>Bently</span><small>(125)</small></a></li>
											<li><a href="#"><span>BMW</span><small>(562)</small></a></li>
											<li><a href="#"><span>Bugatti</span><small>(562)</small></a></li>
										</ul>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="cs-catagory">
										<ul>
											<li><a href="#"><span>Ferrari</span><small>(256)</small></a></li>
											<li><a href="#"><span>Fiat</span><small>(157)</small></a></li>
											<li><a href="#"><span>Lamborghini</span><small>(145)</small></a></li>
											<li><a href="#"><span>Lancia</span><small>(456)</small></a></li>
											<li><a href="#"><span>Land Rover</span><small>(856)</small></a></li>
											<li><a href="#"><span>Maserati</span><small>(125)</small></a></li>
											<li><a href="#"><span>McLaren</span><small>(562)</small></a></li>
											<li><a href="#"><span>Mercedes-Benz</span><small>(562)</small></a></li>
										</ul>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<div class="cs-catagory">
										<ul>
											<li><a href="#"><span>Mini</span><small>(256)</small></a></li>
											<li><a href="#"><span>Opel</span><small>(157)</small></a></li>
											<li><a href="#"><span>Peugeot</span><small>(145)</small></a></li>
											<li><a href="#"><span>Porsche</span><small>(456)</small></a></li>
											<li><a href="#"><span>Renault</span><small>(856)</small></a></li>
											<li><a href="#"><span> Rolls-Royce</span><small>(125)</small></a></li>
											<li><a href="#"><span>Vauxhall</span><small>(562)</small></a></li>
											<li><a href="#"><span>Volkswagen</span><small>(562)</small></a></li>
										</ul>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="button_style cs-button"> <a href="#">Search for cars</a> </div>
								</div>
							</div>
							<!--Element Section End--> 
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--full width category section--> 
		<!--tabs section-->
		<div class="page-section" style="padding-top:70px; padding-bottom:65px;">
			<div class="container">
				<div class="row">
					<div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-12 col-md-12 co-sm-12 col-xs-12"><!--Element Section Start-->
								<div class="cs-section-title">
									<h3 style="text-transform:uppercase !important;">Perfect Cars for you</h3>
									<p style="text-transform:uppercase;font-size:11px;color:#999999 !important;">It will help us find the Toyota you're looking for in your area.</p>
								</div>
								<!--Tabs Start-->
								
								<div class="cs-tabs full-width">
									<ul class="nav nav-tabs">
										<li class="active"><a data-toggle="tab" href="#home">New Cars</a></li>
										<li><a data-toggle="tab" href="#menu1">Used Cars</a></li>
										<li><a data-toggle="tab" href="#menu2">Featured Cars</a></li>
										<li><a data-toggle="tab" href="#menu3">Bikes and Trucks</a></li>
									</ul>
									<div class="tab-content">
										<div id="home" class="tab-pane fade in active">
											<div class="row">
												<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
													<div class="auto-listing auto-grid">
														<div class="cs-media">
															<figure> <img src="assets/extra-images/listing-Grid-img1.jpg" alt="#"/>
																<figcaption> <span class="auto-featured">Featured</span> </figcaption>
															</figure>
														</div>
														<div class="auto-text"> <span class="cs-categories"><a href="#">Timlers Motors</a></span>
															<div class="post-title">
																<h6><a href="shop-detail.php">Mazda CX-5 SX, V6, ABS, Sunroof </a></h6>
																<div class="auto-price"><span class="cs-color">$25,000</span> <em>MSRP $27,000</em></div>
															</div>
															<div class="btn-list"> <a href="javascript:void(0)" class="btn btn-danger collapsed" data-toggle="collapse" data-target="#list-view"></a>
																<div id="list-view" class="collapse">
																	<ul>
																		<li>30/36 est. mpg 18</li>
																		<li>Black front grille with chrome accent</li>
																		<li>Cruise control</li>
																		<li>Remote keyless entry system</li>
																		<li>Tilt 3-spoke steering wheel with audio controls</li>
																		<li>15-in. alloy wheels</li>
																	</ul>
																</div>
															</div>
															<div class="cs-checkbox">
																<input type="checkbox" name="list" value="check-listn" id="check-list">
																<label for="check-list">Compare</label>
															</div>
															<a href="shop-detail.php" class="View-btn">View Detail<i class=" icon-arrow-long-right"></i></a> </div>
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
													<div class="auto-listing auto-grid">
														<div class="cs-media">
															<figure> <img src="assets/extra-images/listing-Grid-img2.jpg" alt="#"/></figure>
														</div>
														<div class="auto-text"> <span class="cs-categories"><a href="#">Timlers Motors</a></span>
															<div class="post-title">
																<h6><a href="shop-detail.php">Mazda CX-5 SX, V6, ABS, Sunroof </a></h6>
																<div class="auto-price"><span class="cs-color">$25,000</span> <em>MSRP $27,000</em></div>
															</div>
															<div class="btn-list"> <a href="javascript:void(0)" class="btn btn-danger collapsed" data-toggle="collapse" data-target="#list-view1"></a>
																<div id="list-view1" class="collapse">
																	<ul>
																		<li>30/36 est. mpg 18</li>
																		<li>Black front grille with chrome accent</li>
																		<li>Cruise control</li>
																		<li>Remote keyless entry system</li>
																		<li>Tilt 3-spoke steering wheel with audio controls</li>
																		<li>15-in. alloy wheels</li>
																	</ul>
																</div>
															</div>
															<div class="cs-checkbox">
																<input type="checkbox" name="list" value="check-listn" id="check-list1">
																<label for="check-list1">Compare</label>
															</div>
															<a href="shop-detail.php" class="View-btn">View Detail<i class=" icon-arrow-long-right"></i></a> </div>
													</div>
												</div>
												<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
													<div class="auto-listing auto-grid">
														<div class="cs-media">
															<figure> <img src="assets/extra-images/listing-Grid-img3.jpg" alt="#"/></figure>
														</div>
														<div class="auto-text"> <span class="cs-categories"><a href="#">Timlers Motors</a></span>
															<div class="post-title">
																<h6><a href="shop-detail.php">Mazda CX-5 SX, V6, ABS, Sunroof </a></h6>
																<div class="auto-price"><span class="cs-color">$25,000</span> <em>MSRP $27,000</em></div>
															</div>
															<div class="btn-list"> <a href="javascript:void(0)" class="btn btn-danger collapsed" data-toggle="collapse" data-target="#list-view2"></a>
																<div id="list-view2" class="collapse">
																	<ul>
																		<li>30/36 est. mpg 18</li>
																		<li>Black front grille with chrome accent</li>
																		<li>Cruise control</li>
																		<li>Remote keyless entry system</li>
																		<li>Tilt 3-spoke steering wheel with audio controls</li>
																		<li>15-in. alloy wheels</li>
																	</ul>
																</div>
															</div>
															<div class="cs-checkbox">
																<input type="checkbox" name="list" value="check-listn" id="check-list2">
																<label for="check-list2">Compare</label>
															</div>
															<a href="shop-detail.php" class="View-btn">View Detail<i class=" icon-arrow-long-right"></i></a> </div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--Tabs End--> 
								<!--Element Section End--></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--tabs section--> 
		<!--Latest Model Auto Slider Start-->
		<div class="page-section" style="background: rgba(237, 240, 245, 1); padding-top:70px; padding-bottom:70px;">
			<div class="container">
				<div class="row">
					<div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row"> 
							<!--Element Section Start-->
							<div class="cs-auto-listing cs-auto-box">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-element-title">
										<h2>Latest Released Car Models</h2>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<ul class="cs-auto-box-slider row">
										<li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<div class="cs-media"> <span class="featured"></span>
												<figure> <a href="shop-detail.php"> <img src="assets/extra-images/latest-model-01.jpg" alt=""/> </a>
													<figcaption> </figcaption>
												</figure>
												<div class="caption-text"> <a href="#">
													<h2> Avalon Hybrid
														Built for the
														endless weekend. </h2>
													</a> </div>
											</div>
											<div class="auto-text cs-bgcolor"> <span>$28,000</span><small>MSRP $35,000</small> <a href="shop-detail.php" class="cs-button pull-right"><i class="icon-arrow_forward
"></i></a> </div>
										</li>
										<li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<div class="cs-media">
												<figure> <a href="shop-detail.php"> <img src="assets/extra-images/latest-model-02.jpg" alt=""/> </a>
													<figcaption> </figcaption>
												</figure>
												<div class="caption-text"> <a href="#">
													<h2> Speed Dual-Clutch 
														Featured Special 
														New ReLease </h2>
													</a> </div>
											</div>
											<div class="auto-text cs-bgcolor"> <span>$20,045</span><small>MSRP $32,000</small> <a href="shop-detail.php" class="cs-button pull-right"><i class="icon-arrow_forward
"></i></a> </div>
										</li>
										<li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
											<div class="cs-media">
												<figure> <a href="shop-detail.php"> <img src="assets/extra-images/latest-model-03.jpg" alt=""/> </a>
													<figcaption> </figcaption>
												</figure>
												<div class="caption-text"> <a href="#">
													<h2> All New 
														BMW ADAPTIVE DRIVE HEAD
														uP DISPLAY </h2>
													</a> </div>
											</div>
											<div class="auto-text cs-bgcolor"> <span>$20,045</span><small>MSRP $32,000</small> <a href="shop-detail.php" class="cs-button pull-right"><i class="icon-arrow_forward
"></i></a> </div>
										</li>
										
									</ul>
								</div>
							</div>
							<!--Element Section End--> 
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Latest Model Auto Slider End-->
		<div class="page-section" style=" padding-top:70px; padding-bottom:50px;">
			<div class="container">
				<div class="row">
					<div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="row"> 
							<!--Element Section Start-->
							<div class="cs-blog cs-blog-grid">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-element-title">
										<h2>WHAT'S TRENDING in Car World</h2>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="cs-blog-listing blog-grid">
										<div class="cs-media">
											<figure> <a href="blog-post.php"><img src="assets/extra-images/blog-listing-1.jpg" alt="" /></a>
												<figcaption>
													<div class="caption-text"><span>STICKY POST</span></div>
												</figcaption>
											</figure>
										</div>
										<div class="blog-text">
											<div class="post-option"> <span class="post-date">Vehicles</span> </div>
											<div class="post-title">
												<h4><a href="blog-post.php">Avalon Hybrid Built for the endless weekend.</a></h4>
											</div>
											<p>Norwegian airline website named Widerøe generated a tremendous amount of buzz and a lot of very happy customers this weekend.</p>
											<div class="post-meta">
												<figure><img src="assets/extra-images/blog-grid-1.jpg" alt="" /></figure>
												<span class="post-by">Anselm Hannemann</span> <em>August 15, 2015</em> </div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="cs-blog-listing blog-grid">
										<div class="cs-media">
											<figure> <a href="#"><img src="assets/extra-images/blog-listing-2.jpg" alt="" /></a>
												<figcaption></figcaption>
											</figure>
										</div>
										<div class="blog-text">
											<div class="post-option"> <span class="post-date">Motors</span> </div>
											<div class="post-title">
												<h4><a href="blog-post.php">Speed Dual-Clutch Featured Special New ReLease</a></h4>
											</div>
											<p>Website named Widerøe generated a tremendous amount of buzz and a lot of very happy customers this weekend when word got out that supposed.</p>
											<div class="post-meta">
												<figure><img src="assets/extra-images/blog-grid-2.jpg" alt="" /></figure>
												<span class="post-by">Arashasghari</span> <em>September 30, 2015</em> </div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="cs-blog-listing blog-grid">
										<div class="cs-media">
											<figure> <a href="#"><img src="assets/extra-images/blog-listing-3.jpg" alt="" /></a>
												<figcaption></figcaption>
											</figure>
										</div>
										<div class="blog-text">
											<div class="post-option"> <span class="post-date">Cars and Races</span> </div>
											<div class="post-title">
												<h4><a href="blog-post.php">Human laws, but we cannot resist natural ones</a></h4>
											</div>
											<p>Amount of buzz and a lot of very happy customers this weekend when word got out that supposed unintentional error in their reservation.</p>
											<div class="post-meta">
												<figure><img src="assets/extra-images/blog-grid-3.jpg" alt="" /></figure>
												<span class="post-by">Darrellwhitelaw</span> <em>October 9, 2015</em> </div>
										</div>
									</div>
								</div>
							</div>
							<!--Element Section End--> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Main End -->
	<?php include('footer.php'); ?>
	
</div>
<script src="assets/scripts/responsive.menu.js"></script> 
<script src="assets/scripts/chosen.select.js"></script> 
<script src="assets/scripts/slick.js"></script> 
<script src="assets/scripts/echo.js"></script> 
<!-- Put all Functions in functions.js --> 
<script src="assets/scripts/functions.js"></script>
<script src="assets/scripts/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#mn-pm").addClass("active");
        GetJenis("mobil");
        GetPropinsi();
    });

    $("#seo_kat").change(function () {
        var seo_kat = $('option:selected', "#seo_kat").val();
        GetSubKat(seo_kat);
    });

    $("#seo_skat").change(function () {
        var i_skat = $('option:selected', "#seo_skat").val();
        GetJenis(i_skat);
    });

    $("#i_prop").change(function () {
        var i_prop = $('option:selected', "#i_prop").val();
        GetKota(i_prop);
    });

    function GetSubKat(seo_kat) {
        console.log(seo_kat);
        $.ajax({
            type: 'post',
            url: 'controller/globalfunction.php',
            data: { accesskey:'<?php echo $accesskey ?>' ,ajax: true,action: 'GetSubKat', param: seo_kat},
            success: function (data) {
                $('#seo_skat').html("<option value='' selected='selected'>Pilih Tipe</option>" + data);
                var seo_skat = $("#seo_skat").val();
                GetJenis(seo_skat);
            }
        });
    }

    function GetJenis(seo_skat) {
        $.ajax({
            type: 'post',
            url: 'controller/globalfunction.php',
            data: { accesskey:'<?php echo $accesskey ?>' ,ajax: true,action: 'GetJenis', param: seo_skat},
            success: function (data) {
                $('#seo_jns').html("<option value='' selected='selected'>Semua</option>" + data);
            }
        });
    }

    function GetPropinsi(){
        $.ajax({
            type: 'post',
            url: 'controller/globalfunction.php',
            data: { accesskey:'<?php echo $accesskey ?>' ,ajax: true,action: 'GetPropinsi', param: ''},
            success: function (data) {
                $('#i_prop').html("<option value='' selected='selected'>Semua</option>" + data);
            }
        });
    }

    function GetKota(i_prop){
        $.ajax({
            type: 'post',
            url: 'controller/globalfunction.php',
            data: { accesskey:'<?php echo $accesskey ?>' ,ajax: true,action: 'GetKota', param: i_prop},
            success: function (data) {
                $('#i_kot').html("<option value=''>Semua</option>" + data);
            }
        });
    }

</script>
<script src="assets/js/jquery.cbpFWSlider.min.js"></script>
<script>
$( function() {
	$( '#cbp-fwslider' ).cbpFWSlider();
} );
</script>
</body>

</html>