<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs breadcrumbs-dark">
			<div class="container">
				<h1 class="pull-left">Youtube Video (<?php echo $Category[0]->category_name;?>)</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?php echo base_url();?>">Home</a></li>
					<li><a href="<?php echo base_url('web/showYoutubeCategory');?>">Youtube Video</a></li>
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
    <a href="<?php echo base_url('web/watchYoutube/'.$Category[0]->id.'/'.$Video->id);?>">
   <iframe width="300" height="215" src="<?php echo $Video->filepath;?>" frameborder="0"></iframe>
<p><strong><?php echo $Video->title;?></strong></p>
</a>
</div>
<div><a href="<?php echo base_url('web/watchYoutube/'.$Category[0]->id.'/'.$Video->id);?>" class="btn btn-block btn-eventful">View in New Tab</a></div>
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
