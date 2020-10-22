<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs breadcrumbs-dark">
			<div class="container">
				<h1 class="pull-left">Gallery (<?php echo $Category[0]->category_name;?>)</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?php echo base_url();?>">Home</a></li>
					<li><a href="<?php echo base_url('web/showImageCategory');?>">Audio</a></li>
					<li class="active"><?php echo $Category[0]->category_name;?></li>
				</ul>
			</div>
		</div><!--/breadcrumbs-->
		<!--=== End Breadcrumbs ===-->

		<!-- Four Columns -->
		<div class="container content">
			

			<div class="row  margin-bottom-30">
                     <?php if(!empty($VidList)){ foreach($VidList as $Video){?>
                    <div class="col-md-4">
							
								   <?php if($Video->filepath!=''){
									   
	$exten= explode('.', $Video->filepath);
	?>
    <div class="responsive-video">
    
   <audio width="250" height="150" controls>
  <source src="<?php echo base_url('assets/frontend/upload/audio/'.$Video->filepath);?>" type="audio/mp3">
  <source src="movie.ogg" type="audio/ogg">
Your browser does not support the Audio tag.
</audio>
<p><strong><?php echo $Video->title;?></strong></p>

</div>
<?php }else{?>
	<img src="<?php echo base_url('assets/frontend/img/NotAvailable.gif');?>" alt="Ambedkartv" title="Not Available" style="width:150px; height:100px;"/>
    <?php }?>
							
					</div>
                    <?php }}?>
			</div>

			

			
		</div>
		<!-- End Four Columns -->
