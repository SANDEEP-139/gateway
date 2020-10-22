<!--=== Footer Version 1 ===-->
		<div class="footer-v1">
			<div class="footer">
				<div class="container">
					<div class="row">
						<!-- About -->
						<div class="col-md-3 md-margin-bottom-40">
							<a href="<?php echo base_url();?>"><img id="logo-footer" class="footer-logo" src="<?php echo $this->Webmodel->getLogo() ;?>" style="width: 100%; height:40px;" alt=""></a>
</br>
							<p>Promoters don’t just materialize out of thin air: they start  asstart as strangers, visitors, contacts, and customers. Specific marketing actions and tools help to transform those strangers into leads and promoters</p>
						</div><!--/col-md-3-->
						<!-- End About -->

						<!-- Latest -->
						<div class="col-md-3 md-margin-bottom-40">
							<div class="headline"><h2>Page(s)</h2></div>
							<ul class="list-unstyled link-list">
								
								<li><a href="<?php echo base_url('web/page/services');?>">Services</a> <i class="fa fa-angle-right"></i></li>
                                <li><a href="<?php echo base_url('web/page/business-promotion');?>">Promotion</a> <i class="fa fa-angle-right"></i></li>
                                <li><a href="<?php echo base_url('web/page/career');?>">Career & Jobs</a> <i class="fa fa-angle-right"></i></li>
                                <li><a href="<?php echo base_url('/web/contact');?>">Contact</a> <i class="fa fa-angle-right"></i></li>
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
								<!--<i class="fa fa-home"></i> <?php //echo $setting[0]['address'];?> <br />-->
								<i class="fa fa-phone"></i> <?php //echo $setting[0]['phone'];?> <br />
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
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/js/pages/contact.js');?>"></script>
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
	<!-- Google Code for Remarketing Tag -->
<!--------------------------------------------------
Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. See more information and instructions on how to setup the tag on: http://google.com/ads/remarketingsetup
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 858821122;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/858821122/?guid=ON&amp;script=0"/>
</div>
</noscript>

</body>
</html>