<div class="content-wrapper">
    <section class="content-header">
        <h1><a href="#">Add <?php echo ucfirst($slug);?></a>
            <small>new</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Add <?php echo ucfirst($slug);?></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add <?php echo ucfirst($slug);?></h3>
                    </div>
                   <?php echo $this->session->flashdata('msg'); ?>
                   <?php echo form_open_multipart('backend/web/AddFeaturedPage/'.$slug);?>
                        <div class="box-body">
                        	<div class="form-group">
								<?php echo form_label('Featured Page'); ?>
                                <?php echo form_input(array('class'=>'form-control', 'value'=>$slug, 'name' => 'featuredpage', 'readonly'=>'readonly')); ?>
                                <?php echo form_error('category_name', '<p class="text-danger">', '</p>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="title"><?php echo ucfirst($slug);?> Title</label>
                                <input type="text" id="title" class="form-control" name="pagetitle" placeholder="Enter Title Here"/>
                                <span class="text-danger"><?php echo form_error('pagetitle'); ?></span>
                            </div>
                            <div class="form-group">
                            <label for="title"><?php echo ucfirst($slug);?> Description</label>
                            
      						<textarea class="form-control summernote" style="margin-top: 30px;" name="description" placeholder="Type some text" cols="4" rows="5">
     						 </textarea>
                            
                            <span class="text-danger"><?php echo form_error('description'); ?></span>
                            </div>
                            
                        </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="col-md-12">
            <div class="col-md-12" >
            <div class="box box-primary">
            
             <div class="box-header with-border">
             <h3 class="box-title"><?php echo ucfirst($slug);?> Category(s)</h3>
             </div>
             <span class="text-danger"><?php echo form_error('categoryid'); ?></span>
             <div class="box-body" style="height:250px; overflow:scroll;">
             <?php if(!empty($CategoryList)){ foreach($CategoryList as $category){
				
				 
				 ?>
              
             <div class="checkbox">
             <label type="checkbox"><input type="checkbox" name="categoryid[]" value="<?php echo $category->id;?>"/><?php echo $category->category_name;?>
            </label>
            </div>
            <?php }}else{echo 'No Data Found!';}?>
             </div>
             <div class="box-footer">
            
            </div>
            </div></div>
     		
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Featured Image</h3>
                    </div>
                    <div class="form-group">
            <label>Live Status</label>
                                <select class="form-control" name="status">
                        		<option value="1" selected>Active</option>
                        		<option value="0">Inactive</option>
                      			</select>
                                <span class="text-danger"><?php echo form_error('status'); ?></span>
            </div>
                        <div class="box-body">
						<div class="form-group">
                        <img id="image_upload_preview" src="" alt=""/>
                            	<label>Upload image</label>
                                <input type="file" class="form-control" style="height:auto;" name="feature_img" id="feature_img"/>
                                 <span class="text-danger"><?php echo form_error('feature_img'); ?></span>
                            </div>
                            
                        </div>
                        
                            <div class="box-footer">
            <button name="image" value="submit" class="btn btn-success">Submit</button>
            
            </div>
                    <?php echo form_close(); ?>
                    </div>
               </div>
             
            </div>
        </div>
    </section>
</div>
 
<script>
function slugname(){
	var slug=document.getElementById('title').value;
	var slugname=slug.replace(new RegExp(/([ .*+?^=;!:${}()|\[\]\/\\])/, 'g')  ,'-');
	var x= document.getElementById('permalink').innerHTML='<?php echo base_url("web/page");?>/'+slugname.toLowerCase();
	permalinkvalue.value=x;
	}
function readURL(input) {
if (input.files && input.files[0]) {
	var reader = new FileReader();

	reader.onload = function (e) {
		$('#image_upload_preview').attr('src', e.target.result);
		$("#image_upload_preview").css("height", "150px");
		$("#previous_img").hide();
	}

	reader.readAsDataURL(input.files[0]);
}
}

$("#feature_img").change(function () {
readURL(this);
});
</script>