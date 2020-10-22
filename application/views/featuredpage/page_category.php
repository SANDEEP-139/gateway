<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs breadcrumbs-dark">
			<div class="container">
				<h1 class="pull-left"><?php if($slug=='blog'){echo 'Blog';}else{echo ucfirst($slug);}?> Category</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?php echo base_url();?>">Home</a></li>
					
					<li class="active"><?php echo ucfirst($slug);?> Category</li>
				</ul>
			</div>
		</div>
		<!--=== End Breadcrumbs ===-->

		<!--=== Content Part ===-->
		<div class="container content-sm portfolio-4-columns">
			<div class="row">
            
            <div class="col-md-9">
           <?php if(!empty($ImageList[0])){ foreach($ImageList as $Image){
			   //echo var_dump($Image);exit;
			   ?>
            
            <h4><a href="<?php echo base_url('web/showFeaturedPageDetail/'.$slug.'/'.$Image->id);?>">
			<?php echo $Image->title;?></a>
            </h4>
            
            <h6> Posted <?php echo date('d/m/Y',$Image->createdon);?> / By Gatway Unimart </a></h6>
           <?php if(!empty($Article[0])){ foreach($Article as $articlelist){
			  //echo var_dump($articlelist);exit;
			  if($articlelist->title==$Image->title){
			  // echo var_dump($articlelist);?>
               <img class="img-responsive img-bordered" 
          src="<?php echo base_url('assets/frontend/upload/featuredpage/'.$Article[0]->filepath);?>" style="max-height:200px;max-width:200px;" alt="" title="<?php echo $Article[0]->title;?>"><?php
          $blogdetail=explode(" ",$articlelist->content);
		  $showdetail=implode(" ", array_splice($blogdetail, 0, 100));
		  echo $showdetail;
		 
		  ?>
          
		  <a href="<?php echo base_url('web/showFeaturedPageDetail/'.$slug.'/'.$Image->id);?>">[..]</a>
		  <?php
            
             }}}}}?>
            </div>
				<div class="col-sm-3">
                  <h2 style="border-left:2px solid #6098db;background-color:rgba(203,236,247,1.00);padding-left:2%;">Latest Blog</h2>
					<?php if(!empty($ImageList[0])){ foreach($ImageList as $image){?>
						<h4><a href="<?php echo base_url('web/showFeaturedPageDetail/'.$slug.'/'.$image->id);?>">
						<?php echo $image->title;?></a></h4>
                        <h6>
                       
                        <?php echo date('d/m/Y', $image->createdon);?> / By Gatway Unimart
                         <hr/>
                        </h6>
                       
					 <?php }}else{}?>
                <h2 style="border-left:2px solid #6098db;background-color:rgba(203,236,247,1.00);padding-left:2%;">Blog Category</h2>
					<?php if(!empty($CategoryList[0])){ foreach($CategoryList as $category){?>
						<h4><a href="<?php echo base_url('web/showFeaturedPage/'.$slug.'/'.$category->id);?>">
						<?php echo $category->category_name;?></a></h4>
                        <h6>
                       
                        <?php //echo date('d/m/Y', $category->createdon);?> 
                       
                        </h6>
                       
					 <?php }}else{?>
				</div>
               
                <div class="text-center margin-bottom-50">
                No Data Found !
				</div>
			<?php }?>
			<!--/row-->
</div>
			<!--/row-->
		</div><!--/container-->
		<!--=== End Content Part ===-->
        </div></div>