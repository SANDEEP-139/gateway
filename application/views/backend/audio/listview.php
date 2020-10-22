 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Audio
            <small>All</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            
            <li class="active">All Audio</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">All Audio</h3><a href="<?php echo base_url('backend/web/AddAudio');?>" class="btn btn-success pull-right">Add New Audio</a>
                </div><!-- /.box-header -->
                 <?php echo $this->session->flashdata('msg'); ?>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Audio</th>
                        <th>Category(s)</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($AudioList as $Audio):?>
                      <tr>
                        <td><?php echo $Audio->title;?></td>
                        <td><?php echo $Audio->content;?></td>
                        <td>
                        <?php if($Audio->filepath!=''){
	$exten= explode('.', $Audio->filepath);
	?><audio width="150" height="100" controls>
    <source src="movie.ogg" type="audio/ogg">
  <source src="<?php echo base_url('assets/frontend/upload/audio/'.$Audio->filepath);?>" type="audio/mpeg">
  
Your browser does not support the video tag.
</audio>
<?php }else{?>
	<img src="<?php echo base_url('assets/frontend/img/NotAvailable.gif');?>" alt="Ambedkartv" title="Not Available" style="width:150px; height:100px;"/>
    <?php }?>
    
    </td>
                        <td><?php $catids=explode(',', $Audio->category_ids); $cate_name= $this->Webmodel->getName('tbl_video_category', 'category_name', $catids);
						foreach($cate_name as $c){echo $c->category_name.'<br>';}
						
						?></td>
                        <td><?php echo $Audio->status==1?'<span class="btn btn-success btn-xs">Active</span>':'<span class="btn btn-danger btn-xs">Inactive</span>';?></td>
                        <td><a href="<?php echo base_url('backend/web/updateAudio/'.$Audio->id);?>">Edit</a></td>
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