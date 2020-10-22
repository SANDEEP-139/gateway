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

<?php //echo $setting[0]['analytics_code']; ?>
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
									<i class="fa fa-envelope"></i> <b style="font-size:14px;"><a href="mailto:<?php echo $setting[0]['email'];?>"><?php echo $setting[0]['email'];?></a></b>
								</li>
								<li>
									<i class="fa fa-phone"></i> <b style="font-size:14px;"><?php echo $setting[0]['phone'];?></b
								></li>
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
								 <span id="BtnContact">
                    <span id="Plus"><span class="glyphicon glyphicon-plus-sign"></span>Enquiry</span>
                    <span id="Minus" style="display: none;"><span class="glyphicon glyphicon-minus-sign"></span>Enquiry</span></span>
                    <div class="col-sm-2 contact" id="Div1" style="display: none;">
                    <span style="color: white; font-weight: bold; text-shadow: 1px 1px 1px black;font-size: 21px;">Contact Form</span>
                   
                    <form action="<?php echo base_url('web/contact'); ?>" method="post" id="sky-form3" class="sky-form contact-style">
						<fieldset class="no-padding">
                        <?php /*?> <?php echo $segment1= $this->uri->segment(1); echo $segment2= $this->uri->segment(2);
						 echo $segment3= $this->uri->segment(3);?>
<input type="hidden" value="<?php echo $segment1;?>" name="hiddensegment1" />
<input type="hidden" value="<?php echo $segment2;?>" name="hiddensegment2" />
<input type="hidden" value="<?php echo $segment3;?>" name="hiddensegment3" /><?php */?>
                        <?php echo $this->session->flashdata('msg'); ?>
							<?php echo form_label('Name'); ?> <span class="color-red">*</span>
							<div class="row sky-space-20">
								<div class="col-md-12 col-md-offset-0">
									<div>
                        
                           <input class="form-control" type="text" name="name" value="<?php echo set_value('name');?>" required  />
                             <?php echo form_error('name', '<p class="text-danger">', '</p>'); ?>
									</div>
								</div>
							</div>

							<?php echo form_label('Email'); ?> <span class="color-red">*</span>
							<div class="row sky-space-20">
								<div class="col-md-12 col-md-offset-0">
									<div>
							    		<input class="form-control" type="text" name="email" value="<?php echo set_value('name');?>" required  />
                             			<?php echo form_error('email', '<p class="text-danger">', '</p>'); ?>

									</div>
								</div>
							</div>

							<?php echo form_label('Message'); ?> <span class="color-red">*</span>
							<div class="row sky-space-20">
								<div class="col-md-12 col-md-offset-0">
									<div>
      <textarea class="form-control" id="Msg" name="message" value="<?php echo set_value('message');?>" required></textarea>

                                   <?php echo form_error('message', '<p class="text-danger">', '</p>'); ?>

									</div>
								</div>
							</div>
							<div class="row margin-bottom-30"></div>
                         
							<div style="float
                            :left;">
                             <?php echo form_submit(array('value' => 'Send', 'name'=>'submit', 'class'=>'btn btn-success pull-right btn-lg')); ?>
                             </div>
						</fieldset>

                           
						<!--/*<div class="message">
							<i class="rounded-x fa fa-check"></i>
							<p>Your message was successfully sent!</p>
						</div>*/-->
					</form>
                    
          
           

</div>
               
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
                            <?php /*?><li><a href="<?php echo base_url('web/showFeaturedPageCategory/blog/8');?>">Blog</a></li>
							<li class="dropdown">
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
         			</ul>
                            
                            </li>
							
                             <li><a href="<?php echo base_url('web/page/business-promotion');?>">Business Promotion</a></li>
                            <li><a href="<?php echo base_url('web/page/career');?>">Career & Jobs</a></li>
                            <li><a href="<?php echo base_url('web/contact');?>">Contact us</a></li>
							
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