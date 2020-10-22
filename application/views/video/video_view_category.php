<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs breadcrumbs-dark">
			<div class="container">
				<h1 class="pull-left">Videos Category</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?php echo base_url();?>">Home</a></li>
					
					<li><a href="<?php echo base_url('web/showVidCategory');?>">Videos Category</a></li>
				</ul>
			</div>
		</div>
		<!--=== End Breadcrumbs ===-->

		<!--=== Content Part ===-->
		<div class="container content-sm portfolio-4-columns">
			<div class="row">
            <?php if(!empty($CategoryList[0])){ foreach($CategoryList as $category){?>
				<div class="col-md-3 col-sm-6">
					<div class="view view-tenth">
						<img class="img-responsive" src="<?php if(!empty($category->filepath)){echo base_url('assets/frontend/upload/video/'.$category->filepath);}else
							{echo base_url('assets/frontend/img/nophoto.png');}?>" alt="" style="height:150px;" />
						<div class="mask">
							<h2><?php echo $category->category_name;?></h2>
							<a href="<?php echo base_url('web/showVid/'.$category->id);?>" class="info">More</a>
						</div>
					</div>
				</div>
                <?php }}else{?>
                <div class="text-center margin-bottom-50">
				<h2 class="title-v2 title-center">Video</h2>
				<p class="space-lg-hor">No data Found!</p>
			</div>
			<?php }?>
			<!--/row-->

			<!--/row-->
		</div><!--/container-->
		<!--=== End Content Part ===-->
        </div>