<div class="content-wrapper">
    <section class="content-header">
        <h1><a href="#">Update Youtube</a>
            <small>edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Update Youtube</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Youtube</h3>
                    </div>
                   <?php echo $this->session->flashdata('msg'); ?>
                   <?php echo form_open_multipart('backend/web/updateYoutube/'.$EditYoutube[0]['id']);?>
                        <div class="box-body">
                        	
                            <div class="form-group">
                                <label for="title">Image Title</label>
                                <input type="text" id="title" class="form-control" name="pagetitle" value="<?php echo $EditYoutube[0]['title'];?>"/>
                                <span class="text-danger"><?php echo form_error('pagetitle'); ?></span>
                            </div>
                            <div class="form-group">
                            <label for="title">Image Description</label>
                            
      						<textarea class="form-control summernote" style="margin-top: 30px;" name="description" cols="4" rows="5">
                            <?php echo $EditYoutube[0]['content'];?>
     						 </textarea>
                            
                            <span class="text-danger"><?php echo form_error('description'); ?></span>
                            </div>
                            <div class="form-group">
                            	<label>Youtube</label>
                                <input type="text" id="title" class="form-control" name="youtube" value="<?php echo $EditYoutube[0]['filepath'];?>"/>
                                 <span class="text-danger"><?php echo form_error('youtube'); ?></span>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="col-md-12">
            <div class="col-md-12" >
            <div class="box box-primary">
            
             <div class="box-header with-border">
             <h3 class="box-title">Image Category(s)</h3>
             </div>
             <span class="text-danger"><?php echo form_error('categoryid'); ?></span>
             <div class="box-body" style="height:250px; overflow:scroll;">
              <?php $data = explode(',', $EditYoutube[0]['category_ids']); ?>
             <?php if(!empty($CategoryList)){ foreach($CategoryList as $category){
				
				 
				 ?>
              
             <div class="checkbox">
             <label type="checkbox"><input type="checkbox" name="categoryid[]" value="<?php echo $category->id;?>" <?php echo in_array($category->id,$data)=='1'?'checked':'';?>/><?php echo $category->category_name;?>
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
                        		<option value="0" <?php echo $EditYoutube[0]['status']==0?'selected':''; ?>>Inactive</option>
                                    <option value="1" <?php echo $EditYoutube[0]['status']==1?'selected':''; ?>>Active</option>
                      			</select>
                                <span class="text-danger"><?php echo form_error('status'); ?></span>
            </div>
                        
                            <div class="col-md-12" >
                           <?php if($EditYoutube[0]['status']!=''){?>
				<iframe width="100%" height="215" src="<?php echo $EditYoutube[0]['filepath'];?>" frameborder="0" allowfullscreen></iframe>
<?php }else{?>
	<img src="<?php echo base_url('assets/frontend/img/NotAvailable.gif');?>" alt="Ambedkartv" title="Not Available" style="width:150px; height:100px;"/>
    <?php }?>
  							</div>
                        
                            <div class="box-footer">
            <button name="image" value="update" class="btn btn-success">Update</button>
            
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