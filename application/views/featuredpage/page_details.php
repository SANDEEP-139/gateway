<!--=== Breadcrumbs ===-->
		<div class="breadcrumbs breadcrumbs-dark">
			<div class="container">
				<h1 class="pull-left"><?php echo $Article[0]->title;?></h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?php echo base_url();?>">Home</a></li>
					<li><a href="<?php echo base_url('web/showFeaturedPageCategory/'.$slug);?>"><?php echo ucfirst($slug);?></a></li>
					<li class="active"><?php echo $Article[0]->title;?></li>
				</ul>
			</div>
		</div><!--/breadcrumbs-->
		<!--=== End Breadcrumbs ===-->

		<!-- Four Columns -->
		<div class="container content-sm">
			<div class="row about-me">
            <div class="col-sm-9">
             <?php if(empty($Article[0]->coverpage)){?>
             
				<div class="col-sm-12 box-shadow shadow-effect-2">
						<img class="img-responsive img-bordered full-width" 
          src="<?php echo base_url('assets/frontend/upload/featuredpage/'.$Article[0]->filepath);?>" style="height:400px;"  alt="" title="<?php echo $Article[0]->title;?>">
          <h6> Posted: <?php echo date('d/m/Y',$Article[0]->createdon);?> / By Gatway Unimart </a></h6>
          <hr/>
					</div>
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
                       
					 <?php }}else{?>
						 <div class="text-center margin-bottom-50">
                No Data Found !
				</div>
						 
						 
						 <?php }?>
                <h2 style="border-left:2px solid #6098db;background-color:rgba(203,236,247,1.00);padding-left:2%;">Blog Category</h2>
					<?php if(!empty($Category)){ foreach($Category as $categorylst){?>
						<h4><a href="<?php echo base_url('web/showFeaturedPage/'.$slug.'/'.$categorylst->id);?>">
						<?php echo $categorylst->category_name;?></a></h4>
                        <h6>
                       
                        <?php //echo date('d/m/Y', $category->createdon);?> 
                       
                        </h6>
                       
					 <?php }} else{?>
				</div>
               
                <div class="text-center margin-bottom-50">
                No Data Found !
				</div>
			<?php }?>
                    </div>
                    <div class="row">
                    <div  class="col-sm-12">
					<?php echo $Article[0]->content;?>
				</div>
                <?php } else{?>
				<div class="col-sm-4 shadow-wrapper md-margin-bottom-40">
					<div class="box-shadow shadow-effect-2">
						<img class="img-responsive img-bordered full-width" 
                        src="<?php echo base_url('assets/frontend/upload/article/'.$Article[0]->coverpage);?>" alt="" title="<?php echo $Article[0]->title;?>">
					</div>
				</div>

				<div class="col-sm-8">
					<?php echo $Article[0]->content;?>
                    <?php if($Article[0]->filepath!=''){?>
                   <br><a href="<?php echo base_url('assets/frontend/upload/article/'.$Article[0]->filepath);?>"> Click Here for More</a>
                    <?php }?>
				</div>
                
                <?php }?>
			</div>
            </div>
               
		</div>
		<!-- End Four Columns -->
