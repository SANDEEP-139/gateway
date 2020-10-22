<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs breadcrumbs-dark">
			<div class="container">
				<h1 class="pull-left">Images Category</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?php echo base_url();?>">Home</a></li>
					
					<li class="active">Image Category</li>
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
						<img class="img-responsive" src="<?php if(!empty($category->filepath)){echo base_url('assets/frontend/upload/image/'.$category->filepath);}else
							{echo base_url('assets/frontend/img/nophoto.png');}?>" alt="" style="height:150px;" />
						<div class="mask">
							<h2><?php echo $category->category_name;?></h2>
							<a href="<?php echo base_url('web/showImage/'.$category->id);?>" class="info">More</a>
						</div>
					</div>
				</div>
                <?php }}else{?>
                <div class="text-center margin-bottom-50">
				<h2 class="title-v2 title-center">Gallery</h2>
				<p class="space-lg-hor">If you are going to use a <span class="color-green">passage of Lorem Ipsum</span>, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making <span class="color-green">this the first</span> true generator on the Internet.</p>
			</div>
			<?php }?>
			<!--/row-->

			<!--/row-->
		</div><!--/container-->
		<!--=== End Content Part ===-->
        </div>