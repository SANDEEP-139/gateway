<link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/pages/page_404_error.css');?>">

<div class="breadcrumbs breadcrumbs-dark">
			<div class="container">
				<h1 class="pull-left">404<?php echo $pagedata[0]['title'];?></h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?php echo base_url();?>">Home</a></li>
					
					<li class="active">404</li>
				</ul>
			</div>
		</div>
		<!--=== End Breadcrumbs ===-->

		<!--=== Content Part ===-->
		<div class="container content">
			<!--Error Block-->
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="error-v1">
						<span class="error-v1-title">404</span>
						<span>That’s an error!</span>
						<p>The requested URL was not found on this server. That’s all we know.</p>
						<a class="btn-u btn-bordered" href="<?php echo base_url();?>">Back Home</a>
					</div>
				</div>
			</div>
			<!--End Error Block-->
		</div>
		<!--=== End Content Part ===-->