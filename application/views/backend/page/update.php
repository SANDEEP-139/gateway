<div class="content-wrapper">
    <section class="content-header">
        <h1><a href="<?php echo site_url('settings/configration')?>">Page</a>
            <small>update</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Page</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">page</h3>
                    </div>
                   <?php echo $this->session->flashdata('msg'); ?>
                   <?php echo form_open_multipart('backend/web/updatepages/'.$pagedata[0]['id']);?>
                  
             <div class="box-body">
                        	
                            <div class="form-group">
                                <label for="title">Page Title</label>
                                <input type="text" id="title" class="form-control" name="pagetitle" placeholder="Enter Title Here" onBlur="slugname()" value="<?php echo $pagedata[0]['title'];?>"/>
                                <span class="text-danger"><?php echo form_error('pagetitle'); ?></span>
                            </div>
                            <div class="form-group">
                            <label for="title">Description</label>
                           
      						<textarea class="form-control summernote"  style="margin-top: 30px;" name="description" placeholder="Type some text"
                             cols="4" rows="5"><?php echo $pagedata[0]['content'];?></textarea>
                            
                            <span class="text-danger"><?php echo form_error('description'); ?></span>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="col-md-12">
            <div class="box box-primary">
             <div class="box-header with-border">
             <h3 class="box-title">Publish</h3>
             </div>
             <div class="box-body">
            <div class="form-group">
               <p>Status: <b><?php echo $pagedata[0]['status']==1?'Active':'Inactive';?></b></p>
               <p>Visibility:<b><?php echo $pagedata[0]['status']==1?'Public':'Private';?></b></p>
               <p>Publish on: <b><?php echo date("Y-m-d\TH:i:s\Z", $pagedata[0]['createdon']);?></b></p><span id='publishdate'></span>
               <p>Permalink: <a href="#"><span id='permalink'><?php echo $pagedata[0]['permalink'];?></span></a></p>
              
             </div>
             <div class="box-footer">
            <input type="submit" name="page" value="update" class="btn btn-success">
            </div>
            </div></div>
            <div class="col-md-12">
            <div class="box box-primary">
            
             <div class="box-header with-border">
             <h3 class="box-title">Status</h3>
             </div>
             <div class="box-body">
            <div class="form-group">
            <label>Live Status</label>
                                <select class="form-control" name="status">
                        		<option value="1" <?php echo $pagedata[0]['status']==1?'selected':'';?>>Active</option>
                        		<option value="0" <?php echo $pagedata[0]['status']==0?'selected':'';?>>Inactive</option>
                      			</select>
                                <span class="text-danger"><?php echo form_error('status'); ?></span>
            </div>
             </div>
             <div class="box-footer">
            
            </div>
            </div></div>
     		<div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Page Attributes</h3>
                    </div>
                        <div class="box-body">
						<div class="form-group">
                            	<label>Parent</label>
                                <select class="form-control" name="parent">
                        		<option value="default" <?php echo $pagedata[0]['parent']=='default'?'selected':'';?>>Default</option>
                                <option value="home" <?php echo $pagedata[0]['parent']=='home'?'selected':'';?>>Home</option>
                        		
                      			</select>
                                 <span class="text-danger"><?php echo form_error('parent'); ?></span>
						</div>
                        <div class="form-group">
                            	<label>Template</label>
                                <select class="form-control" name="template"value="<?php echo $pagedata[0]['parent'];?>">
                        		<option value="default" <?php echo $pagedata[0]['template']=='default'?'selected':'';?>>Default</option>
                        		<option value="slider" <?php echo $pagedata[0]['template']=='slider'?'selected':'';?>>Slider</option>
                        		<option value="welcome" <?php echo $pagedata[0]['template']=='welcome'?'selected':'';?>>Welcome</option>
                        		<option value="gallery" <?php echo $pagedata[0]['template']=='gallery'?'selected':'';?>>Gallery</option>
                                <option value="why-do" <?php echo $pagedata[0]['template']=='why-do'?'selected':'';?>>Why Do</option>
                                <option value="event" <?php echo $pagedata[0]['template']=='event'?'selected':'';?>>Event</option>
                                <option value="services" <?php echo $pagedata[0]['template']=='services'?'selected':'';?>>Services</option>
                      			</select>
                        <span class="text-danger"><?php echo form_error('template'); ?></span>
						</div>
                        </div>
                    
                    </div>
               </div>
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Featured Image</h3>
                    </div>
                        <div class="box-body">
						<div class="form-group">
                        <img id="image_upload_preview" src="" alt=""/>
                        <img src="<?php echo base_url(). 'assets/frontend/upload/'. $pagedata[0]['feature_img'] ;?>" style="height:50px;" alt=""/>
                            	<label>Set featured image</label>
                                <input type="file" class="form-control" style="height:auto;" name="feature_img" id="feature_img" />
                                <span class="text-danger"><?php echo form_error('feature_img'); ?></span>
                            </div>
                            
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