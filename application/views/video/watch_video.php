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
                <div class="col-md-8">
                <video width="100%" height="450" controls autoplay>
                <?php $exten= explode('.', $VideoDetail[0]->filepath);?>
  <source src="<?php echo base_url('assets/frontend/upload/video/'.$VideoDetail[0]->filepath);?>" type="video/<?php echo $exten[1];?>">
  <source src="movie.ogg" type="video/ogg">
Your browser does not support the video tag.
</video>
<p style="text-align:left;"><strong>Video Title: <?php echo $VideoDetail[0]->title;?></strong></p>
<p style="text-align:left;"><strong>Description:</strong> <?php echo $VideoDetail[0]->content;?></p>

                </div>
               <div class="col-md-4">
                    <?php if(!empty($VidList)){ foreach($VidList as $Video){?>
                    <div class="row  margin-bottom-20">
							
								   <?php if($Video->filepath!=''){
	$exten= explode('.', $Video->filepath);
	?>
    <div class="col-md-6">
    <div class="responsive-video">
    <a href="<?php echo base_url('web/watchVideo/'.$Category[0]->id.'/'.$Video->id);?>">
   <video width="150" height="90">
  <source src="<?php echo base_url('assets/frontend/upload/video/'.$Video->filepath);?>" type="video/<?php echo $exten[1];?>">
  <source src="movie.ogg" type="video/ogg">
Your browser does not support the video tag.
</video>

</a>
</div>
<?php }else{?>
	<img src="<?php echo base_url('assets/frontend/img/NotAvailable.gif');?>" alt="Ambedkartv" title="Not Available" style="width:150px; height:100px;"/>
    <?php }?>
    </div>
	<div class="col-md-6" style="text-align:left;">
    <p style="text-align:left;"><strong><?php echo $Video->title;?></strong></p>
     <p style="text-align:left;"><?php  $pieces = explode(" ", $Video->content);
$first_part = implode(" ", array_splice($pieces, 0, 20));echo $first_part;?>...</p>
    </div>					
					</div>
                    <?php }}?>
                    
                </div>
                
                </div>
			</div>
                
			</div>

			

			
		</div>
		<!-- End Four Columns -->
