<div class="content-wrapper">
    <section class="content-header">
        <h1><a href="<?php echo site_url('hv-admin/web/profile')?>">Profile</a>
            <small>update</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Profile</h3>
                    </div>
                    <?php echo form_open_multipart('backend/web/profile');?>
                        <div class="box-body">
                        	<?php echo $this->session->flashdata('msg'); ?>
                            <?php //echo var_dump($Users); exit;?>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" class="form-control" name="username" readonly placeholder="Username" value="<?php echo $Users->username; ?>" >
                                <span class="text-danger"><?php echo form_error('username'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="Password" >
                                <span class="text-danger"><?php echo form_error('password'); ?></span>
                            </div>
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="Full Name" value="<?php echo $Users->name; ?>" >
                                <span class="text-danger"><?php echo form_error('name'); ?></span>
                            </div>
                            
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $Users->email; ?>" >
                                 <span class="text-danger"><?php echo form_error('email'); ?></span>
                            </div>
                            <div class="form-group">
                                <label>Mobile No.</label>
                                <input type="text" class="form-control" name="telephone" placeholder="Mobile No." value="<?php echo $Users->mobile; ?>" >
                                 <span class="text-danger"><?php echo form_error('telephone'); ?></span>
                            </div>
                          
                        </div>
                        
                        <div class="box-footer">

                            <?php echo form_submit(array('value' => 'Update', 'name'=>'Update', 'class'=>'btn btn-success pull-right btn-lg')); ?>

                        </div>
                  
                </div>
            </div>
            
            <?php echo form_close();?>
        </div>  
    </section>
</div>
<script>
function readURL(input) {
if (input.files && input.files[0]) {
	var reader = new FileReader();

	reader.onload = function (e) {
		$('#image_upload_preview').attr('src', e.target.result);
		$("#image_upload_preview").css("height", "120px");
	}

	reader.readAsDataURL(input.files[0]);
}
}

$("#logo").change(function () {
readURL(this);
});
</script>
<script type="text/javascript">

function data_copy() {

	if(document.school.copy[0].checked) {

		document.school.branch_street_address.value	= document.school.head_street_address.value;

		document.school.branch_city.value			= document.school.head_city.value;

		document.school.branch_state.value			= document.school.head_state.value;

		document.school.branch_country.value		= document.school.head_country.value;

		document.school.branch_pincode.value		= document.school.head_pincode.value;

		document.school.branch_branch_name.value	= document.school.head_branch_name.value;

	} else {

		document.school.branch_street_address.value	= "";

		document.school.branch_city.value			= "";

		document.school.branch_state.value			= "";

		document.school.branch_country.value		= "";

		document.school.branch_pincode.value		= "";

		document.school.branch_branch_name.value	= "";

	}

}

</script>