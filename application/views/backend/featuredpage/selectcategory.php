<div class="content-wrapper">
    <section class="content-header">
        <h1><a href="#">Featured Page(s)</a>
           
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Featured Page(s)</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            
            
            <div class="col-xs-6">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Featured Page List(s)</h3>
                    </div>
                        <div class="box-body">
                        	<?php echo $this->session->flashdata('msgD'); ?>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                       
                                        <th>Featured Page</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <tr>
                                	<td>Blog</td>
                                    <td><a href="<?php echo base_url('backend/web/addFeaturedPageCategory/blog')?>"><i class="fa fa-plus"></i> Add Category</a> | 
                                    <a href="<?php echo base_url('backend/web/AddFeaturedPage/blog')?>"><i class="fa fa-edit"></i> Add Page</a> |
                                     <a href="<?php echo base_url('backend/web/listFeaturedPage/blog')?>"><i class="fa fa-eye"></i> List View</a></td>
                                  </tr>
                                <tr>
                                	<td>Services</td>
                                    <td><a href="<?php echo base_url('backend/web/addFeaturedPageCategory/services')?>"><i class="fa fa-plus"></i> Add Category</a> | 
                                    <a href="<?php echo base_url('backend/web/AddFeaturedPage/services')?>"><i class="fa fa-edit"></i> Add Page</a> |
                                     <a href="<?php echo base_url('backend/web/listFeaturedPage/services')?>"><i class="fa fa-eye"></i> List View</a></td>
                                  </tr>
                                  <tr>
                                	<td>Explore</td>
                                    <td><a href="<?php echo base_url('backend/web/addFeaturedPageCategory/explore')?>"><i class="fa fa-plus"></i> Add Category</a> | 
                                    <a href="<?php echo base_url('backend/web/AddFeaturedPage/explore')?>"><i class="fa fa-edit"></i> Add Page</a> |
                                     <a href="<?php echo base_url('backend/web/listFeaturedPage/explore')?>"><i class="fa fa-eye"></i> List View</a></td>
                                  </tr>
                                  <?php /*?><tr>
                                	<td>News</td>
                                    <td><a href="<?php echo base_url('backend/web/addFeaturedPageCategory/news')?>"><i class="fa fa-plus"></i> Add Category</a> | 
                                    <a href="<?php echo base_url('backend/web/AddFeaturedPage/news')?>"><i class="fa fa-edit"></i> Add Page</a> |
                                     <a href="<?php echo base_url('backend/web/listFeaturedPage/news')?>"><i class="fa fa-eye"></i> List View</a></td>
                                  </tr> <?php */?>
                                  <tr>
                                	<td>Our Leader</td>
                                    <td><a href="<?php echo base_url('backend/web/addFeaturedPageCategory/ourleader')?>"><i class="fa fa-plus"></i> Add Category</a> | 
                                    <a href="<?php echo base_url('backend/web/AddFeaturedPage/ourleader')?>"><i class="fa fa-edit"></i> Add Page</a> |
                                     <a href="<?php echo base_url('backend/web/listFeaturedPage/ourleader')?>"><i class="fa fa-eye"></i> List View</a></td>
                                  </tr> 
                                  <tr>
                                	<td>Attrocities</td>
                                    <td><a href="<?php echo base_url('backend/web/addFeaturedPageCategory/attrocities')?>"><i class="fa fa-plus"></i> Add Category</a> | 
                                    <a href="<?php echo base_url('backend/web/AddFeaturedPage/attrocities')?>"><i class="fa fa-edit"></i> Add Page</a> |
                                     <a href="<?php echo base_url('backend/web/listFeaturedPage/attrocities')?>"><i class="fa fa-eye"></i> List View</a></td>
                                  </tr>  
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

