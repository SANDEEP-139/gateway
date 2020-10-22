<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs breadcrumbs-dark">
			<div class="container">
			<h1 class="pull-left"><?php //echo ucfirst($slug);?> Category: <?php echo $Category[0]->category_name;?></h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?php echo base_url();?>">Home</a></li>
					<li><a href="<?php echo base_url('web/showFeaturedPageCategory/'.$slug);?>"><?php echo ucfirst($slug);?> Category</a></li>
					<li class="active"><?php echo $Category[0]->category_name;?></li>
				</ul>
			</div>
		</div><!--/breadcrumbs-->
		<!--=== End Breadcrumbs ===-->

		<!-- Four Columns 
        category pages
        -->
		<div class="container content">
			

			<div class="row  margin-bottom-30">
            
				<div class="col-sm-2" ></div>
                <div class="col-sm-7" >
                
                <?php if(!empty($ImageList)){ foreach($ImageList as $Image){?>
                <section style="border-top:5px solid #6098db;border-radius:5px;background-color:rgba(226,230,231,0.80);padding-left:10px;padding-right:10px;padding-top:10px;">
               <h4><a href="<?php echo base_url('web/showFeaturedPageDetail/'.$slug.'/'.$Image->id);?>"><?php echo $Image->title;?></a></h4>
              <img class="img-responsive img-bordered full-width" 
          src="<?php echo base_url('assets/frontend/upload/featuredpage/'.$Image->filepath);?>" style="height:400px;" alt="" title="<?php echo $Image->title;?>">
					
                        <h6>
                       <i class="fa fa-calendar"></i><?php echo date('d/m/Y', $Image->createdon);?>  &nbsp;&nbsp;&nbsp;<i class="fa fa-user"></i> By Gatway Unimart &nbsp;&nbsp;&nbsp;<i class="fa fa-folder-open-o"></i><?php echo $Category[0]->category_name;?></h6>
                        
                  <h5 style="color:#323232;">
						     <?php
          $blogdetail=explode(" ",$articlelist->content);
		  $showdetail=implode(" ", array_splice($blogdetail, 0, 100));
		  echo $showdetail;
		  echo $Image->content;?></h5>
                         <hr/>
                          </section>
                       
					 <?php }}else{?>
						 <div class="text-center margin-bottom-50">
                No Data Found !
				</div>
						 
						 
						 <?php }?>
                       
				</div>
                
            
                
                <div class="col-sm-3">
                  <h2 style="border-left:2px solid #6098db;background-color:rgba(203,236,247,1.00);padding-left:2%;">Latest Blog</h2>
					<?php if(!empty($ImageList)){ foreach($ImageList as $Image){?>
                     <img class="img-responsive img-bordered" 
          src="<?php echo base_url('assets/frontend/upload/featuredpage/'.$Image->filepath);?>" style="height:70px;width:70px;" alt="" title="<?php echo $Image->title;?>">
						<h5><a href="<?php echo base_url('web/showFeaturedPageDetail/'.$slug.'/'.$Image->id);?>">
						<?php echo $Image->title;?></a></h5>
                        <h6>
                       
                        <?php echo date('d/m/Y', $Image->createdon);?> / By Gatway Unimart
                         <hr/>
                        </h6>
                       
					 <?php }}else{?>
						 <div class="text-center margin-bottom-50">
                No Data Found !
				</div>
						 
						 
						 <?php }?>
                <h2 style="border-left:2px solid #6098db;background-color:rgba(203,236,247,1.00);padding-left:2%;">Blog Category</h2>
					<?php if(!empty($Category)){ foreach($Category as $categorylst){?>
						<h4><a href="<?php echo base_url('web/showFeaturedPage/'.$slug.'/'.$categorylst->id);?>" style="color:gray;">
						<?php echo $categorylst->category_name;?></a>
                        <hr/>
                        </h4>
                        
                       
					 <?php }} else{?>
				</div>
               
                <div class="text-center margin-bottom-50">
                No Data Found !
				</div>
			<?php }?>
			</div>

			</div>

			
		</div>
		<!-- End Four Columns -->
