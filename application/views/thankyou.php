<?php $setting = $this->Pagemodel->getsetting();?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<head>
	<title><?php echo $title;?></title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="<?php echo $setting[0]['keyword']; ?>">
    	<meta name="description" content="<?php echo $setting[0]['description']; ?>">
	<meta name="author" content="ssak solution services">
	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo $this->Webmodel->getLogo();?>">

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

	<!-- CSS Global Compulsory -->
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/plugins/bootstrap/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/style.css');?>">

	<!-- CSS Header and Footer -->
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/headers/header-v4.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/footers/footer-v1.css');?>">

	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/plugins/animate.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/plugins/line-icons/line-icons.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/plugins/font-awesome/css/font-awesome.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/plugins/fancybox/source/jquery.fancybox.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/plugins/cube-portfolio/cubeportfolio/css/cubeportfolio.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/plugins/cube-portfolio/cubeportfolio/custom/custom-cubeportfolio.css');?>">

	<!-- CSS Page Style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/pages/blog_magazine.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/pages/portfolio-v1.css');?>">

	<!-- CSS Theme -->
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/theme-colors/blue.css');?>" 
    id="style_color">
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/theme-skins/dark.css');?>">

	<!-- CSS Customization -->
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/custom.css');?>">
<style>
h3,h4,h5{
	color:#2c98db;
	}
	.blog-photos li {
	display: inline;
}

.blog-photos li img {
	width: 58px;
	height: 58px;
	margin: 0 2px 8px;
}

.blog-photos li img:hover {
	box-shadow: 0 0 0 2px #72c02c;
}
</style>

</head>

<body>

<?php echo $setting[0]['analytics_code']; ?>
	<div class="wrapper">
		<!--=== Header v4 ===-->
		<div class="header-v4">
			<!-- Topbar -->
			<div class="topbar-v1">
					<div class="container">
					<div class="row">
						<div class="col-md-6">
							<ul class="list-inline top-v1-contacts">
								<li>
									<i class="fa fa-envelope"></i> <a href="mailto:<?php echo $setting[0]['email'];?>"><?php echo $setting[0]['email'];?></a>
								</li>
								<li>
									<i class="fa fa-phone"></i> <?php echo $setting[0]['phone'];?>
								</li>
							</ul>
						</div>

						<div class="col-md-6">
							<ul class="list-inline top-v1-data">
								<li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i></a></li>
								<li><a href="https://www.facebook.com/gatway.unimart" target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
								
							</ul>
                          
						</div>
					</div>
				</div>
			</div>
			<!-- End Topbar -->

			<!-- Navbar -->
			<div class="navbar navbar-default mega-menu" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<div class="row">
							<div class="col-md-4">
								<a class="navbar-brand img-responsive" href="<?php echo base_url();?>">
									<img  id="logo-header" src="<?php echo $this->Webmodel->getLogo() ;?>" style="width: 295px; height: 80px; margin-top: -18px;" alt="Logo" />
                                   
								</a>
                              
							</div>
							 <div class="col-sm-6">
								 <a href="#">
               
                                </a>
							</div>
						</div>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<span class="full-width-menu">Menu Bar</span>
							<span class="icon-toggle">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</span>
						</button>
					</div>
				</div>

				<div class="clearfix"></div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-responsive-collapse">
					<div class="container">
						<ul class="nav navbar-nav">
							<li><a href="<?php echo base_url();?>">Home</a></li>
                            <li><a href="<?php echo base_url('web/page/about-us');?>">About us</a></li>
                            <li><a href="<?php echo base_url('web/showFeaturedPageCategory/blog/8');?>">Blog</a></li>
						<?php /*?>	<li class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
									Gallery
								</a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo base_url('web/showImageCategory');?>">Images</a></li>
                                    <li><a href="<?php echo base_url('web/showVidCategory');?>">Videos</a></li>
                                    <li><a href="<?php echo base_url('web/showYoutubeCategory');?>">You Tube Video</a></li>
                                    <li><a href="<?php echo base_url('web/showAudioCategory');?>">Songs</a></li>
							
								</ul>
							</li><?php */?>
								<li class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
									Services
								</a>
                            <ul class="dropdown-menu">
                                     <li><a href="<?php echo base_url('web/page/software-development');?>">
Software Development
</a></li>
                    <li><a href="<?php echo base_url('web/page/custom-web-application-development');?>">
Custom Web Application Development
</a></li>
   <li><a href="<?php echo base_url('web/page/website-designing-n-development');?>">Website Designing & Development</a></li>
					<li><a href="<?php echo base_url('web/page/digital-marketing');?>">Digital Marketing</a></li>
                   <li><a href="<?php echo base_url('web/page/inbound-marketing');?>">Inbound Marketing</a></li>
                        
         
          
                <li><a href="<?php echo base_url('web/page/interior-designing');?>">
Interior Designing
</a></li>
        <li><a href="<?php echo base_url('web/page/loan-n-finance');?>">
Loan & Finance
</a></li>
        <li><a href="<?php echo base_url('web/page/licensing-n-taxation');?>">
Licensing  & Taxation
</a></li>

							
								</ul>
                            
                            </li>
							
                             <li><a href="<?php echo base_url('web/page/business-promotion');?>">Business Promotion</a></li>
                            <li><a href="<?php echo base_url('web/page/career');?>">Career & Jobs</a></li>
                            <li><a href="<?php echo base_url('web/contact');?>">Contact us</a></li>
							
						</ul>
                            
                            </li>
							
                            
							
						</ul>

						<!-- Search Block -->
						<ul class="nav navbar-nav navbar-border-bottom navbar-right">
							<li class="no-border">
								<i class="search fa fa-search search-btn"></i>
								<div class="search-open">
									<div class="input-group animated fadeInDown">
										<input type="text" class="form-control" placeholder="Search">
										<span class="input-group-btn">
											<button class="btn-u" type="button">Go</button>
										</span>
									</div>
								</div>
							</li>
						</ul>
						<!--End Search Block -->
					</div><!--/end container-->
				</div><!--/navbar-collapse-->
			</div>
			<!-- End Navbar -->
		</div>
		<!--=== End Header v4 ===-->

 
<div class="container text-xs-center">
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8" style="border:4px groove lightgray;border-radius:10px;margin-top:2%;margin-bottom:2%;">
  <h1 class="display-3">Thank You!</h1>
  <p class="lead">We'll contact you soon for further information.</p>
  <hr>
  <p>
    Having trouble? <a href="<?php echo base_url('web/contact');?>">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="<?php echo base_url();?>" role="button">Continue to Homepage</a>
  </p>
</div>
<div class="col-sm-2"></div>
</div>

</div>
<!--=== Footer Version 1 ===-->
		<div class="footer-v1">
			<div class="footer">
				<div class="container">
					<div class="row">
						<!-- About -->
						<div class="col-md-3 md-margin-bottom-40">
							<a href="<?php echo base_url();?>"><img id="logo-footer" class="footer-logo" src="<?php echo $this->Webmodel->getLogo() ;?>" style="width: 100%; height: 90px;" alt=""></a>
							<p>Promoters don’t just materialize out of thin air: they start  asstart as strangers, visitors, contacts, and customers. Specific marketing actions and tools help to transform those strangers into leads and promoters</p>
						</div><!--/col-md-3-->
						<!-- End About -->

						<!-- Latest -->
						<div class="col-md-3 md-margin-bottom-40">
							<div class="headline"><h2>Page(s)</h2></div>
							<ul class="list-unstyled link-list">
								<li><a href="<?php echo base_url('web/page/interior-design');?>">Interior Design</a> <i class="fa fa-angle-right"></i></li>
								<li><a href="<?php echo base_url('web/page/services');?>">Services</a> <i class="fa fa-angle-right"></i></li>
                                <li><a href="<?php echo base_url('web/page/business-promption');?>">Promotion</a> <i class="fa fa-angle-right"></i></li>
                                <li><a href="<?php echo base_url('web/page/career');?>">Career & Jobs</a> <i class="fa fa-angle-right"></i></li>
                                <li><a href="<?php echo base_url('web/page/contact');?>">Contact</a> <i class="fa fa-angle-right"></i></li>
							</ul>
						</div><!--/col-md-3-->
						<!-- End Latest -->

						<!-- Link List -->
						<div class="col-md-3 md-margin-bottom-40">
							<div class="headline"><h2>Location</h2></div>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3559.7088994479027!2d80.9430339645219!3d26.84920963315489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd085deba9c3%3A0xfc9699bbda92686d!2sChitrahar+Building%2C+Nawal+Kishore+Rd%2C+Hazratganj%2C+Lucknow%2C+Uttar+Pradesh+226001!5e0!3m2!1sen!2sin!4v1489045361481" width="270" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div><!--/col-md-3-->
						<!-- End Link List -->

						<!-- Address -->
						<div class="col-md-3 map-img md-margin-bottom-40">
							<div class="headline"><h2>Contact Us</h2></div>
							<address class="md-margin-bottom-40">
								<i class="fa fa-home"></i> <?php echo $setting[0]['address'];?> <br />
								<i class="fa fa-phone"></i> <?php echo $setting[0]['phone'];?> <br />
								<i class="fa fa-envelope"></i> <a href="mailto:<?php echo $setting[0]['email'];?>" class=""><?php echo $setting[0]['email'];?></a>
							</address>
						</div><!--/col-md-3-->
						<!-- End Address -->
					</div>
				</div>
			</div><!--/footer-->

			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<p>
			&copy; 2015  All Rights Reserved by <a href="#"><?php echo $setting[0]['title'];?></a>.
								
							</p>
						</div>
						<div class="col-md-3">
							<p>
							
                             Design &amp; Developed by: <a href="https://www.ssak.co.in" target="_blank">SSAK</a>
							</p>
						</div>
						<!-- Social Links -->
						<div class="col-md-3">
							<ul class="footer-socials list-inline">
								<li>
									<a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
										<i class="fa fa-facebook"></i>
									</a>
								</li>
								<li>
									<a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Skype">
										<i class="fa fa-skype"></i>
									</a>
								</li>
								<li>
									<a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google Plus">
										<i class="fa fa-google-plus"></i>
									</a>
								</li>
								<li>
									<a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
										<i class="fa fa-linkedin"></i>
									</a>
								</li>
								
								<li>
									<a href="#" class="tooltips" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
										<i class="fa fa-twitter"></i>
									</a>
								</li>
								
							</ul>
						</div>
						<!-- End Social Links -->
					</div>
				</div>
			</div><!--/copyright-->
		</div>
		<!--=== End Footer Version 1 ===-->
	</div><!--/wrapper-->


	<!--=== End Style Switcher ===-->

	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/plugins/jquery/jquery.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/plugins/jquery/jquery-migrate.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/plugins/bootstrap/js/bootstrap.min.js');?>"></script>
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/plugins/back-to-top.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/plugins/smoothScroll.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/plugins/cube-portfolio/cubeportfolio/js/jquery.cubeportfolio.min.js');?>"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/custom.js');?>"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/app.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/plugins/fancybox/source/jquery.fancybox.pack.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/plugins/fancy-box.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/plugins/cube-portfolio/cube-portfolio-4.js');?>"></script>
<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
			FancyBox.initFancybox();
			StyleSwitcher.initStyleSwitcher();
		});
	</script>
	<!--[if lt IE 9]>
	<script src="<?php echo base_url('assets/frontend/plugins/respond.js');?>"></script>
	<script src="<?php echo base_url('assets/frontend/plugins/html5shiv.js');?>"></script>
	<script src="<?php echo base_url('assets/frontend/plugins/placeholder-IE-fixes.js');?>"></script>
	<![endif]-->
<!-- Google Code for leads Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 858821122;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "14Y-CMKxu28QgqTCmQM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/858821122/?label=14Y-CMKxu28QgqTCmQM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

</body>
</html>