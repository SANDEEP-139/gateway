<?php $setting = $this->Pagemodel->getsetting();?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<title><?php echo $setting[0]['title'];?></title>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?php echo $this->Webmodel->getLogo() ;?>"/>

	<!-- Web Fonts -->
	<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>
	<!-- CSS Global Compulsory-->
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/plugins/bootstrap/css/bootstrap.min.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/style.css');?>">
	<!-- CSS Implementing Plugins -->
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/plugins/animate.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/plugins/line-icons/line-icons.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/frontend/plugins/font-awesome/css/font-awesome.css');?>">
	<!-- CSS Page Style -->
	<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/pages/page_coming_soon.css');?>">
	<!-- CSS Theme -->
   <link rel="stylesheet" href="<?php echo base_url('assets/frontend/assets/css/theme-colors/default.css');?>" id="style_color">
</head>

<body class="coming-soon-page">
	<div class="coming-soon-wrapper coming-soon-border">

		<!--=== Content Part ===-->
		<div class="container cooming-soon-content g-block-middle">
			<!-- Coming Soon Content -->
			<div class="row">
				<div class="col-md-12 coming-soon">
					<h1>Coming Soon</h1>
					<p><?php echo $setting[0]['title'];?></p><br>
					<form>
						<div class="input-group col-md-4 col-md-offset-4">
							<input type="text" class="form-control" placeholder="Your Email">
							<span class="input-group-btn">
								<button class="btn-u" type="button">Subscribe</button>
							</span>
						</div><!-- /input-group -->
					</form>
				</div>
			</div>

			<!-- Coming Soon Plugn -->
			<div class="coming-soon-plugin" style="height: 200px;">
				<div id="defaultCountdown"></div>
			</div>
		</div><!--/container-->
		<!--=== End Content Part ===-->

		<!--=== Sticky Footer ===-->
		<div class="sticky-footer">
			<p class="copyright-space">
				2016 &copy; <?php echo $setting[0]['title'];?>. ALL Rights Reserved.
			</p>
		</div>
		<!--=== End Sticky-Footer ===-->
	</div>

	<!-- JS Global Compulsory -->
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/plugins/jquery/jquery.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/plugins/jquery/jquery-migrate.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/plugins/bootstrap/js/bootstrap.min.js');?>"></script>
	<!-- JS Implementing Plugins -->
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/plugins/back-to-top.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/plugins/smoothScroll.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/plugins/countdown/jquery.plugin.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/plugins/countdown/jquery.countdown.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/plugins/backstretch/jquery.backstretch.min.js');?>"></script>
	<!-- JS Customization -->
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/custom.js');?>"></script>
	<!-- JS Page Level -->
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/app.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/pages/page_coming_soon.js');?>"></script>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			App.init();
			PageComingSoon.initPageComingSoon();
		});
	</script>

	<!-- Background Slider (Backstretch) -->
	<script>
		$.backstretch([
			"<?php echo base_url('assets/frontend/img/bg/14.jpg');?>",
			"<?php echo base_url('assets/frontend/img/bg/17.jpg');?>",
			"<?php echo base_url('assets/frontend/img/bg/2.jpg');?>"
			], {
				fade: 1000,
				duration: 7000
			});
	</script>
	<!--[if lt IE 9]>
	<script src="<?php echo base_url('assets/frontend/plugins/respond.js');?>"></script>
	<script src="<?php echo base_url('assets/frontend/plugins/html5shiv.js');?>"></script>
	<script src="<?php echo base_url('assets/frontend/plugins/placeholder-IE-fixes.js');?>"></script>
	<![endif]-->
</body>

</html>
