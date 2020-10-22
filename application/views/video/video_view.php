<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs breadcrumbs-dark">
			<div class="container">
				<h1 class="pull-left">Video (<?php echo $Category[0]->category_name;?>)</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?php echo base_url();?>">Home</a></li>
					<li><a href="<?php echo base_url('web/showVidCategory');?>">Video</a></li>
					<li class="active"><?php echo $Category[0]->category_name;?></li>
				</ul>
			</div>
		</div><!--/breadcrumbs-->
		<!--=== End Breadcrumbs ===-->

		<!-- Four Columns -->
		<div class="container content">
			

			<div class="row  margin-bottom-30">
           
                <div class="text-center margin-bottom-50">
				<h2 class="title-v2 title-center">Video</h2>
				<div class="row  margin-bottom-30">
                
               
                    <?php if(!empty($VidList)){ foreach($VidList as $Video){?>
                    <div class="col-md-3">
							
								   <?php if($Video->filepath!=''){
									   
	$exten= explode('.', $Video->filepath);
	?>
    <div class="responsive-video">
    <a href="<?php echo base_url('web/watchVideo/'.$Category[0]->id.'/'.$Video->id);?>">
   <video width="250" height="150">
  <source src="<?php echo base_url('assets/frontend/upload/video/'.$Video->filepath);?>" type="video/<?php echo $exten[1];?>">
  <source src="movie.ogg" type="video/ogg">
Your browser does not support the video tag.
</video>
<p><strong><?php echo $Video->title;?></strong></p>
</a>
</div>
<?php }else{?>
	<img src="<?php echo base_url('assets/frontend/img/NotAvailable.gif');?>" alt="Ambedkartv" title="Not Available" style="width:150px; height:100px;"/>
    <?php }?>
							
					</div>
                    <?php }}?>
                    
                
                
                </div>
			</div>
                
			</div>

			

			
		</div>
		<!-- End Four Columns -->
