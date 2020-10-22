<div class="content-wrapper">
    <section class="content-header">
        <h1><a href="#">Update Audio</a>
            <small>edit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Update Audio</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Audio</h3>
                    </div>
                   <?php echo $this->session->flashdata('msg'); ?>
                   <?php echo form_open_multipart('backend/web/updateAudio/'.$EditAudio[0]['id']);?>
                        <div class="box-body">
                        	
                            <div class="form-group">
                                <label for="title">Image Title</label>
                                <input type="text" id="title" class="form-control" name="pagetitle" value="<?php echo $EditAudio[0]['title'];?>"/>
                                <span class="text-danger"><?php echo form_error('pagetitle'); ?></span>
                            </div>
                            <div class="form-group">
                            <label for="title">Image Description</label>
                            
      						<textarea class="form-control summernote" style="margin-top: 30px;" name="description" cols="4" rows="5">
                            <?php echo $EditAudio[0]['content'];?>
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
             <h3 class="box-title">Image Category(s)</h3>
             </div>
             <span class="text-danger"><?php echo form_error('categoryid'); ?></span>
             <div class="box-body" style="height:250px; overflow:scroll;">
              <?php $data = explode(',', $EditAudio[0]['category_ids']); ?>
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
                        		<option value="0" <?php echo $EditAudio[0]['status']==0?'selected':''; ?>>Inactive</option>
                                    <option value="1" <?php echo $EditAudio[0]['status']==1?'selected':''; ?>>Active</option>
                      			</select>
                                <span class="text-danger"><?php echo form_error('status'); ?></span>
            </div>
                        <div class="form-group">
                           <label>Set featured image</label>
                                <input type="file" class="form-control" style="height:auto;" name="feature_img" id="feature_img"/>
                                 <span class="text-danger"><?php echo form_error('feature_img'); ?></span>
                            </div>
                            <div class="col-md-12" >
                           <?php if($EditAudio[0]['filepath']!=''){
	$exten= explode('.', $EditAudio[0]['filepath']);
	?><audio width="150" height="100" controls>
  <source src="<?php echo base_url('assets/frontend/upload/audio/'.$EditAudio[0]['filepath']);?>" type="audio/mpeg">
  <source src="movie.ogg" type="audio/ogg">
Your browser does not support the audio tag.
</audio>
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