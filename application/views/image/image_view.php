<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs breadcrumbs-dark">
			<div class="container">
				<h1 class="pull-left">Gallery (<?php echo $Category[0]->category_name;?>)</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?php echo base_url();?>">Home</a></li>
					<li><a href="<?php echo base_url('web/showImageCategory');?>">Image</a></li>
					<li class="active"><?php echo $Category[0]->category_name;?></li>
				</ul>
			</div>
		</div><!--/breadcrumbs-->
		<!--=== End Breadcrumbs ===-->

		<!-- Four Columns -->
		<div class="container content">
			

			<div class="row  margin-bottom-30">
            <?php if(!empty($ImageList)){ foreach($ImageList as $Image){?>
				<div class="col-md-3 col-sm-6">
                <div class="view view-tenth" style="height:200px;">
					<a href="<?php if(!empty($Image->filepath)){echo base_url('assets/frontend/upload/image/'.$Image->filepath);}else
							{echo base_url('assets/frontend/img/nophoto.png');}?>" rel="gallery2" class="fancybox img-hover-v1" title="<?php echo $Image->title.', '.$Category[0]->category_name;?>">
						<span><img class="img-responsive" src="<?php if(!empty($Image->filepath)){echo base_url('assets/frontend/upload/image/'.$Image->filepath);}else
							{echo base_url('assets/frontend/img/nophoto.png');}?>" alt="<?php echo $Image->title.', '.$Image->content.', '.$Category[0]->category_name;?>" title="<?php echo $Image->title.', '.$Image->content.', '.$Category[0]->category_name;?>"></span>
					</a>
				</div>
				</div>
                <?php }}else{?> 
                <div class="text-center margin-bottom-50">
				<h2 class="title-v2 title-center">Gallery</h2>
				<p class="space-lg-hor">If you are going to use a <span class="color-green">passage of Lorem Ipsum</span>, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making <span class="color-green">this the first</span> true generator on the Internet.</p>
			</div>
                <?php }?>
			</div>

			

			
		</div>
		<!-- End Four Columns -->
