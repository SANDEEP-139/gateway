<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs breadcrumbs-dark">
			<div class="container">
				<h1 class="pull-left">Article (<?php echo $Category[0]->category_name;?>)</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?php echo base_url();?>">Home</a></li>
					<li><a href="<?php echo base_url('web/showArticleCategory');?>">Article Category</a></li>
					<li class="active"><?php echo $Category[0]->category_name;?></li>
				</ul>
			</div>
		</div><!--/breadcrumbs-->
		<!--=== End Breadcrumbs ===-->

		<!-- Four Columns -->
		<div class="container content">
			

			<div class="row  margin-bottom-30">
            <?php if(!empty($ImageList)){ foreach($ImageList as $Image){?>
				<div class="col-md-12 col-sm-6">
               <h2><a href="<?php if($Image->isfile=='1'){echo base_url('assets/frontend/upload/audio/'.$Image->filepath);}else{echo base_url('web/showArticleDetail/'.$Image->id);}?>"><i class="fa fa-angle-double-right"></i><?php echo $Image->title;?></a></h2>
				</div>
                <?php }}else{?> 
                <div class="text-center margin-bottom-50">
				<h2 class="title-v2 title-center">Article</h2>
				<p class="space-lg-hor">No data Found!</p>
			</div>
                <?php }?>
			</div>

			

			
		</div>
		<!-- End Four Columns -->
