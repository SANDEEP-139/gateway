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
          
             <div class="col-sm-12">
			
					<?php echo $pagedata[0]['content'];?>
				</div>
               
                
           
			</div>
		</div>
		<!-- End About Me Block -->