
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Carikendaraan.id</title>
    <meta name="author" content="ukieweb" />
    <meta name="keywords" content="soon, css3, template, html5 template" />
    <meta name="description" content="Clock - Page Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Font Awesome -->
    <link type="text/css" media="all" href="assets/fa.min.css" rel="stylesheet" />
    <!-- Libs CSS -->
    <link type="text/css" media="all" href="assets/bp.min.css" rel="stylesheet" />
    <!-- Template CSS -->
    <link type="text/css" media="all" href="assets/style.css" rel="stylesheet" />
    <!-- Responsive CSS -->
    <link type="text/css" media="all" href="assets/respons.css" rel="stylesheet" />
    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/img/favicon.png" />
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Exo+2:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>

</head>
<body>

    <!-- Load page -->
    <div class="animationload">
        <div class="loader"></div>
    </div>
    <!-- End load page -->


    <!-- Content Wrapper -->
    <div id="wrapper">

        <!-- Clock -->
        <div class="clock">
            <div class="small"></div>
            <div class="big"></div>
            <div class="circle"></div>
        </div>
        <!-- End Clock -->

        <h3 class="title">Harap Tunggu ...</h3>

        <!-- Watch -->
        <div id="watch">

            <!-- Days -->
            <div class="dash days_dash">
                <div class="digit">0</div>
                <div class="digit">0</div>
                <span class="dash_title">Days</span>
            </div>
            <!-- End Days -->

            <!-- Hours -->
            <div class="dash hours_dash">
                <div class="digit">0</div>
                <div class="digit">0</div>
                <span class="dash_title">Hours</span>
            </div>
            <!-- End Hours -->

            <!-- Minutes -->
            <div class="dash minutes_dash">
                <div class="digit">0</div>
                <div class="digit">0</div>
                <span class="dash_title">Minutes</span>
            </div>
            <!-- End Minutes -->

            <!-- Seconds -->
            <div class="dash seconds_dash">
                <div class="digit">0</div>
                <div class="digit">0</div>
                <span class="dash_title">Seconds</span>
            </div>
            <!-- End Seconds -->

        </div>
        <!-- End Watch -->

    </div>
    <!-- end Content Wrapper -->

    <!-- Footer -->
    <footer id="footer">
        <div class="container">

            <!-- footer socials -->
            <div class="row">

                <div class="footer_socials col-sm-12 text-center">

                    <div class="contact_icons">
                        
                    </div>

                    <div class="copyright">Carikendaraan @ 2016 All Right Reserved</div>

                </div>

            </div>
            <!-- end footer socials -->

        </div>
        <!-- end container -->
    </footer>
    <!-- end footer -->


    <!-- Scripts -->
    <script src="assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/bp.min.js" type="text/javascript"></script>
    <script src="assets/js/custom.js" type="text/javascript"></script>
    <script src="assets/js/jquery.nicescroll.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.lwtCountdown-1.0.js" type="text/javascript"></script>
    <script src="assets/js/scripts.js" type="text/javascript"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        // Set the Countdown
        jQuery(document).ready(function() {
            $('#watch').countDown({
                targetOffset: {
                    'day':      0,
                    'month':    0,
                    'year':     0,
                    'hour':     0,
                    'min':      0,
                    'sec':      5
                }, 
                // onComplete function
                onComplete: function() { window.location.href = 'http://mooc.seamolec.org'; }
            });
        });
    </script>
</body>
</html>