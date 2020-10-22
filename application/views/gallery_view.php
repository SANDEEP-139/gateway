<!-- Start Portfolio Section -->
    <div class="container">
        	<div class="cube-portfolio">
					<div id="grid-container" class="cbp-l-grid-agency">
                       <?php foreach($gallerylist as $gallery):?>
						<div class="cbp-item">
							<div class="cbp-caption margin-bottom-20">
								<div class="cbp-caption-defaultWrap">
									<img class="img-responsive"src="<?php echo base_url('assets/frontend/upload/image/'.$gallery['filepath']);?>" alt="" style="min-height:250px;min-width:250px;">
								</div>
								<div class="cbp-caption-activeWrap" >
									<div class="cbp-l-caption-alignCenter">
										<div class="cbp-l-caption-body" >
											<ul class="link-captions no-bottom-space">
												
												<li>
                            <a href="<?php echo base_url('assets/frontend/upload/image/'.$gallery['filepath']);?>" class="cbp-lightbox" data-title="Gatway Unimart">
                                                <i class="rounded-x fa fa-search"></i></a>
                                                </li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="cbp-title-dark">
								<div class="cbp-l-grid-agency-title"><?php echo $gallery['title'];?></div>
					<!--			<div class="cbp-l-grid-agency-desc">Web Design / Graphic</div>-->
							</div>
						</div>
                        <?php endforeach;?>
						
					</div>
				</div>
  </div>      
        <!-- End Portfolio Section -->


