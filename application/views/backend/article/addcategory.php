<div class="content-wrapper">
    <section class="content-header">
        <h1><a href="#">Category (Article)</a>
           
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Category (Article)</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-5">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Category (Article) <small>Add</small></h3>
                    </div>
                    <?php echo form_open_multipart('backend/web/addArticleCategory/');?>
                        <div class="box-body">
                        	<?php echo $this->session->flashdata('msg'); ?>
                            <div class="form-group">
								<?php echo form_label('Category Name'); ?>
                                <?php echo form_input(array('class'=>'form-control', 'value'=>set_value('category_name'), 'name' => 'category_name')); ?>
                                <?php echo form_error('category_name', '<p class="text-danger">', '</p>'); ?>
                            </div>
                           
                            <div class="form-group">
            					<label>Live Status</label>
                                <select class="form-control" name="status">
                        		<option value="1" selected>Active</option>
                        		<option value="0">Inactive</option>
                      			</select>
                                <span class="text-danger"><?php echo form_error('status'); ?></span>
            </div>
                        </div>
                        <div class="box-footer">
                        <?php echo form_submit(array('value' => 'Submit', 'name'=>'Create', 'class'=>'btn btn-success pull-right btn-lg')); ?>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
            
            <div class="col-xs-7">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Category (Article) List(s)</h3>
                    </div>
                        <div class="box-body">
                        	<?php echo $this->session->flashdata('msgD'); ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                       
                                        <th>Category Name</th>
                                        
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <?php foreach($ArticleList as $article) { ?>
                                    <tr>
                                       
                                        <td><?php echo $article->category_name; ?></td>
                                        
                                        <td><?php echo ($article->status == 1) ? '<span class="btn btn-success btn-xs">Active</span>':'<span class="btn btn-danger btn-xs">Inactive</span>'; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('backend/web/editArticleCategory/'.$article->id)?>" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            
                        </div>
                
                    
                </div>
            </div>
            
        </div>  
    </section>
</div>

<script>
  $(function () {
    
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
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

