 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Video
            <small>All</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            
            <li class="active">All Video</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">All Video</h3><a href="<?php echo base_url('backend/web/AddVid');?>" class="btn btn-success pull-right">Add New Video</a>
                </div><!-- /.box-header -->
                 <?php echo $this->session->flashdata('msg'); ?>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Video</th>
                        <th>Category(s)</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($VideoList as $Video):?>
                      <tr>
                        <td><?php echo $Video->title;?></td>
                        <td><?php echo $Video->content;?></td>
                        <td>
                        <?php if($Video->filepath!=''){
	$exten= explode('.', $Video->filepath);
	?><video width="150" height="100" controls>
  <source src="<?php echo base_url('assets/frontend/upload/video/'.$Video->filepath);?>" type="video/<?php echo $exten[1];?>">
  <source src="movie.ogg" type="video/ogg">
Your browser does not support the video tag.
</video>
<?php }else{?>
	<img src="<?php echo base_url('assets/frontend/img/NotAvailable.gif');?>" alt="Ambedkartv" title="Not Available" style="width:150px; height:100px;"/>
    <?php }?>
    
    </td>
                        <td><?php $catids=explode(',', $Video->category_ids); $cate_name= $this->Webmodel->getName('tbl_video_category', 'category_name', $catids);
						foreach($cate_name as $c){echo $c->category_name.'<br>';}
						
						?></td>
                        <td><?php echo $Video->status==1?'<span class="btn btn-success btn-xs">Active</span>':'<span class="btn btn-danger btn-xs">Inactive</span>';?></td>
                        <td><a href="<?php echo base_url('backend/web/updateVid/'.$Video->id);?>">Edit</a></td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      <script>
      $(function () {
        $("#example1").DataTable();
       
      });
    </script>