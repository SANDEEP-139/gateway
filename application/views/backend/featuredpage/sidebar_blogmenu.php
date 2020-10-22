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