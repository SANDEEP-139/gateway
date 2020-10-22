<!--=== Content Part ===-->

		<div class="container content">
			<div class="row magazine-page">
				<!-- Begin Content -->
				<div class="col-md-10">
                
					<!-- Magazine Slider -->
					<div class="carousel slide carousel-v1 margin-bottom-40" id="myCarousel-1">
						<div class="carousel-inner">
							<div class="item active">
								<img alt="" src="<?php echo base_url('assets/frontend/img/sliders/5.jpg');?>">
								<div class="carousel-caption">
									<p>Creative innovation Digital Marketing & Customized software development firm .</p>
								</div>
							</div>
							<div class="item">
								<img alt="" src="<?php echo base_url('assets/frontend/img/sliders/7.jpg');?>">
								<div class="carousel-caption">
									<p>Complete Brand Promotion & Marketing Services At Gateway .</p>
								</div>
							</div>
							<div class="item">
								<img alt="" src="<?php echo base_url('assets/frontend/img/sliders/11.jpg');?>">
								<div class="carousel-caption">
									<p>Welcome to Gateway Unimart Solutions Technology.</p>
								</div>
							</div>
                            <div class="item">
								<img alt="" src="<?php echo base_url('assets/frontend/img/sliders/6.jpg');?>">
								<div class="carousel-caption">
									<p>We always follow the Major Themes in Inbound Marketing.</p>
								</div>
							</div>
						</div>

						<div class="carousel-arrow">
							<a data-slide="prev" href="#myCarousel-1" class="left carousel-control">
								<i class="fa fa-angle-left"></i>
							</a>
							<a data-slide="next" href="#myCarousel-1" class="right carousel-control">
								<i class="fa fa-angle-right"></i>
							</a>
						</div>
					</div>
					<!-- End Magazine Slider -->

					
				</div>
				<!-- End Content -->

				<!-- Begin Sidebar -->
				<div class="col-md-2">
                
                	<div class="headline"><h2 class="heading-sm">Gallery Stream</h2></div>
					<ul class="list-unstyled blog-photos">
                    <?php foreach($ImageList as $Image):
					//echo var_dump($Image[0]->filepath);
					?>
                        
                   <li><a href="#">
                   <img class="hover-effect" alt="" src="<?php echo base_url('assets/frontend/upload/image/'.$Image->filepath);?>"></a></li>
				<?php endforeach;?>
					
					
					</ul>
                
					<!-- Magazine Posts -->
						<?php /*?>					<div class="row margin-bottom-40">
                    
                    
						<?php /*?><div class="magazine-posts col-md-12 col-sm-6 margin-bottom-30">
							<h3><a href="#">News</a></h3>
							<div class="magazine-posts-img">
								<a href="#"><img class="img-responsive" src="<?php echo base_url('assets/frontend/img/main/img7.jpg');?>" alt=""></a>
								<span class="magazine-badge magazine-badge-red">News</span>
							</div>
						</div><?php */?>
                        <?php /*?><div class="magazine-posts col-md-12 col-sm-6">
							<h3><a href="<?php echo base_url('web/page/website-designing-n-development');?>">Website & Applications</a></h3>
						
							<div class="magazine-posts-img">
								<a href="<?php echo base_url('web/page/website-designing-n-development');?>"><img class="img-responsive" src="<?php echo base_url('assets/frontend/upload/csd.jpg');?>" alt=""></a>
								<span class="magazine-badge magazine-badge-green">Designing & Development</span>
							</div>
						</div><?php */?>
						<?php /*?><div class="magazine-posts col-md-12 col-sm-6">
							<h3><a href="<?php echo base_url('web/page/business-promotion');?>">Promote your Business</a></h3>
						
							<div class="magazine-posts-img">
								<a href="#"><img class="img-responsive" src="<?php echo base_url('assets/frontend/upload/promotion.jpg');?>" alt=""></a>
								<span class="magazine-badge magazine-badge-green">Business Promotion</span>
							</div>
						</div>
					</div><?php */?>
					<!-- End Magazine Posts -->

				</div>
				<!-- End Sidebar -->
			</div>
            <div class="container row magazine-page">
            	
				<!-- Begin Content -->
				<div class="col-md-10">
					
					<div class="magazine-news">
						<div class="row">
                        <div class="margin-bottom-5"><hr class="hr-md"></div>
							<div class="col-md-12">
                            <?php $about=$this->Pagemodel->getpagedata('about-us');?>
								<div class="magazine-news-img">
									<span class="magazine-badge label-red">Gateway Unimart</span>
								</div>
								<h3><a href="#"><?php echo $image[0]['title'];?></a></h3>
								
								<p><?php $imagec = explode(" ", $about[0]['content']);
$first_part = implode(" ", array_splice($imagec, 0, 104)); echo $first_part;?>.. 
<a href="<?php echo base_url('web/page/about-us');?>">Read More</a></p>	
							 <br></div>
                           
							<div class="margin-bottom-35"><hr class="hr-md"></div>
						</div>
					</div>
					<!-- Magazine News -->
					<div class="magazine-news">
						<div class="row">
							<div class="col-md-6">
                            <?php $image=$this->Pagemodel->getRecord('tbl_pages',9);?>
								<div class="magazine-news-img">
									<a href="<?php echo base_url('web/page/software-development');?>">
                                    <img class="img-responsive" src="<?php echo base_url('assets/frontend/upload/'.$image[0]['feature_img']);?>" alt=""></a>
									<span class="magazine-badge label-red"><?php echo $image[0]['title'];?></span>
								</div>
								<?php /*?><h3><a href="#"><?php echo $image[0]['title'];?></a></h3><?php */?>
								
								<?php /*?><p><?php $imagec = explode(" ", $image[0]['content']);
$first_part = implode(" ", array_splice($imagec, 0, 250)); echo $first_part;?>..</p><?php */?>	
							</div>
							<div class="col-md-6">
                            <?php $video=$this->Pagemodel->getRecord('tbl_pages',6);
							$exten= explode('.', $video[0]['feature_img']);
							?>
								<div class="magazine-news-img">
				<a href="<?php echo base_url('web/page/digital-marketing');?>">
                                    <img class="img-responsive" src="<?php echo base_url('assets/frontend/upload/'.$video[0]['feature_img']);?>" alt=""></a>
  
									<span class="magazine-badge label-blue">
									<?php echo $video[0]['title'];?></span>
								</div>
								<?php /*?><h3><a href="#"><?php echo $video[0]['title'];?></a></h3><?php */?>
								
								<?php /*?><p><?php $videoc = explode(" ", $video[0]['content']);
$first_part = implode(" ", array_splice($videoc, 0, 250)); echo $first_part;?>..</p><?php */?>							</div>
						</div>
					</div>
					<!-- End Magazine News -->

					<div class="margin-bottom-35"><hr class="hr-md"></div>

					<!-- Magazine News -->
					<div class="magazine-news">
						<div class="row">
							<div class="col-md-6">
                            <?php $youtube=$this->Pagemodel->getRecord('tbl_pages',8);?>
								<div class="magazine-news-img">
								<a href="<?php echo base_url('web/page/services/lifecycle-marketing');?>">
                                    <img class="img-responsive" src="<?php echo base_url('assets/frontend/upload/'.$youtube[0]['feature_img']);?>" alt=""></a>
									<span class="magazine-badge label-yellow">
									<?php echo $youtube[0]['title'];?></span>
								</div>
								<?php /*?><h3><a href="#"><?php echo $youtube[0]['title'];?></a></h3><?php */?>
								
							<?php /*?>	<p><?php $youtubec = explode(" ", $youtube[0]['content']);
$first_part = implode(" ", array_splice($youtubec, 0, 250)); echo $first_part;?>...</p>	<?php */?>
							</div>
									<div class="col-md-6">
                            <?php $inbound=$this->Pagemodel->getRecord('tbl_pages',7);?>
								<div class="magazine-news-img">
								<a href="<?php echo base_url('web/page/inbound-marketing');?>">
                                    <img class="img-responsive" src="<?php echo base_url('assets/frontend/upload/'.$inbound[0]['feature_img']);?>" alt=""></a>
									<span class="magazine-badge label-green">
									<?php echo $inbound[0]['title'];?></span>
								</div>
								<?php /*?><h3><a href="#"><?php echo $youtube[0]['title'];?></a></h3><?php */?>
							
							<?php /*?>	<p><?php $youtubec = explode(" ", $youtube[0]['content']);
$first_part = implode(" ", array_splice($youtubec, 0, 250)); echo $first_part;?>...</p>	<?php */?>
							</div>						</div>
					</div>
					<!-- End Magazine News -->

					<div class="margin-bottom-15"><hr class="hr-md"></div>

					<!-- Magazine News -->
					
					<!-- End Magazine News -->

					
				</div>
				<!-- End Content -->

				<!-- Begin Sidebar -->
				<?php /*?><div class="col-md-3">
					
	

					<!-- Photo Stream -->
					<div class="headline"><h2 class="heading-sm">Gallery Stream</h2></div>
					<ul class="list-unstyled blog-photos">
                    <?php foreach($ImageList as $Image):
					//echo var_dump($Image[0]->filepath);
					?>
                        
                   <li><a href="#">
                   <img class="hover-effect" alt="" src="<?php echo base_url('assets/frontend/upload/image/'.$Image->filepath);?>"></a></li>
				<?php endforeach;?>
					
					
					</ul>
					<!-- End Photo Stream -->

					<!-- Latest News -->
					<?php /*?><div class="margin-bottom-40">
                    <h3>
                    <a href="<?php echo base_url('web/showFeaturedPageCategory/blog/8') ?>">Blog</a></h3>
                    	
                    <?php  foreach($BlogList as $blog):
					//echo var_dump($blog);?>
                        <div class="magazine-mini-news">
						<strong>
                        <h5>
                           <a href="<?php echo base_url('web/showFeaturedPageCategory/blog/8'); ?>">
						   <?php echo $blog['title']; ?></a></h5></strong>
							<div class="post-author">
                           <span> <?php echo date('d/m/y',$blog['createdon']); ?></span>
                     </div>
							<p><?php echo $blog['content'];?></p>
						</div>
                        <hr class="hr-md" />
                        <?php endforeach;?>
                    	
                        
					
					</div>
					<!-- End Latest News -->
				</div><?php */?>
				<!-- End Sidebar -->
			</div>
	
        </div><!--/container-->
		<!-- End Content Part -->