<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs breadcrumbs-dark">
			<div class="container">
				<h1 class="pull-left"><?php echo $Article[0]->title;?></h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?php echo base_url();?>">Home</a></li>
					<li><a href="<?php echo base_url('web/showArticleCategory');?>">Article</a></li>
					<li class="active"><?php echo $Article[0]->title;?></li>
				</ul>
			</div>
		</div><!--/breadcrumbs-->
		<!--=== End Breadcrumbs ===-->

		<!-- Four Columns -->
		<div class="container content-sm">
			<div class="row about-me">
             <?php if(empty($Article[0]->coverpage)){?>
             <div class="col-sm-12">
			
					<?php echo $Article[0]->content;?>
				</div>
                <?php } else{?>
				<div class="col-sm-4 shadow-wrapper md-margin-bottom-40">
					<div class="box-shadow shadow-effect-2">
						<img class="img-responsive img-bordered full-width" 
                        src="<?php echo base_url('assets/frontend/upload/article/'.$Article[0]->coverpage);?>" alt="" title="<?php echo $Article[0]->title;?>">
					</div>
				</div>

				<div class="col-sm-8">
					<?php echo $Article[0]->content;?>
                    <?php if($Article[0]->filepath!=''){?>
                   <br><a href="<?php echo base_url('assets/frontend/upload/article/'.$Article[0]->filepath);?>"> Click Here for More</a>
                    <?php }?>
				</div>
                
                <?php }?>
			</div>
		</div>
		<!-- End Four Columns -->
