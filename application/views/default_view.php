<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs breadcrumbs-dark">
			<div class="container">
				<h1 class="pull-left"><?php echo $pagedata[0]['title'];?></h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?php echo base_url();?>">Home</a></li>
					
					<li class="active"><?php echo $pagedata[0]['title'];?></li>
				</ul>
			</div>
		</div>
		<!--=== End Breadcrumbs ===-->

		<!-- About Me Block -->
		<div class="container content-sm">
			<div class="row about-me">
             <?php if(empty($pagedata[0]['feature_img'])){?>
             <div class="col-sm-12">
			
					<?php echo $pagedata[0]['content'];?>
				</div>
                <?php } else{?>
				<div class="col-sm-4 shadow-wrapper md-margin-bottom-40">
					<div class="box-shadow shadow-effect-2">
						<img class="img-responsive img-bordered full-width" 
                        src="<?php echo base_url('assets/frontend/upload/'.$pagedata[0]['feature_img']);?>" alt="" title="<?php echo $pagedata[0]['title'];?>">
					</div>
				</div>

				<div class="col-sm-8">
				
					<?php echo $pagedata[0]['content'];?>
				</div>
                
                <?php }?>
			</div>
		</div>
		<!-- End About Me Block -->