<div class="content-wrapper">
    <section class="content-header">
        <h1><a href="<?php echo site_url('settings/configration')?>">Site Configuration</a>
            <small>update</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Site Configuration</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">

            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Site Configuration</h3>
                    </div>
                   
                    <?php echo form_open_multipart('backend/web/configration');?>
                        <div class="box-body">
                        	<?php echo $this->session->flashdata('msg'); ?>
                            <div class="form-group">
                                <label for="title">Website Title</label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="Website Title" value="<?php echo $setting[0]['title']; ?>" >
                                <span class="text-danger"><?php echo form_error('title'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="keyword">Website Keyword</label>
                                <textarea class="form-control" id="keyword" name="keyword" placeholder="Website Keyword"><?php echo $setting[0]['keyword']; ?></textarea>
                                <span class="text-danger"><?php echo form_error('keyword'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Website Description</label>
                                <textarea class="form-control" name="description" placeholder="Website Description"><?php echo $setting[0]['description']; ?></textarea>
                                 <span class="text-danger"><?php echo form_error('description'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Analytics Code</label>
                                <textarea class="form-control" name="analytics_code" placeholder="Analytics Code"><?php echo $setting[0]['analytics_code']; ?></textarea>
                                 <span class="text-danger"><?php echo form_error('analytics_code'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address" placeholder="Address"><?php echo $setting[0]['address']; ?></textarea>
                                 <span class="text-danger"><?php echo form_error('address'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Site Name</label>
                                <input type="text" class="form-control" name="site_name" placeholder="Site Name" value="<?php echo $setting[0]['site_name']; ?>">
                                 <span class="text-danger"><?php echo form_error('site_name'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo $setting[0]['phone']; ?>">
                                 <span class="text-danger"><?php echo form_error('phone'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $setting[0]['email']; ?>">
                                 <span class="text-danger"><?php echo form_error('email'); ?></span>
                            </div>
                            
                            <div class="form-group">
                                <label>Website Url</label>
                                <input type="text" class="form-control" name="site_url" placeholder="http://www.example.com/" value="<?php echo base_url();?>">
                                 <span class="text-danger"><?php echo form_error('site_url'); ?></span>
                            </div>
                            
                            <div class="form-group">
                            <label>Website Live Status</label>
                                <select name="live_mode" class="form-control">
                        		<option value="0" <?php echo $setting[0]['live_mode']==0?'Selected':'';?>>Offline</option>
                         		<option value="1" <?php echo $setting[0]['live_mode']==1?'Selected':'';?>>Online</option>
                        </select>
                                 <span class="text-danger"><?php echo form_error('site_url'); ?></span>
                            </div>
                            <div class="form-group">
                            	<label>Logo</label>
                                <input type="file" class="form-control" style="height:auto;" name="logo" id="logo" value="<?php echo $setting[0]['logo']; ?>">
                                 <span class="text-danger"><?php echo form_error('logo'); ?></span>
                            </div>
                            <img id="image_upload_preview" src="" alt=""/>
                            <img src="<?php echo base_url(). 'assets/backend/images/'. $setting[0]['logo'] ;?>" style="height:50px;" alt=""/>
                        </div>
                        
                        <div class="box-footer">
                            <button type="submit" id="setting" name="setting" value="Configration" class="btn btn-success  btn-lg">Submit</button>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>  
    </section>
</div>
<script>
function readURL(input) {
if (input.files && input.files[0]) {
	var reader = new FileReader();

	reader.onload = function (e) {
		$('#image_upload_preview').attr('src', e.target.result);
		$("#image_upload_preview").css("height", "50px");
		$("#previous_img").hide();
	}

	reader.readAsDataURL(input.files[0]);
}
}

$("#logo").change(function () {
readURL(this);
});
</script>