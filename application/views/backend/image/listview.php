 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Image
            <small>All</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            
            <li class="active">All Image</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">All Image</h3><a href="<?php echo base_url('backend/web/Addimg');?>" class="btn btn-success pull-right">Add New Image</a>
                </div><!-- /.box-header -->
                 <?php echo $this->session->flashdata('msg'); ?>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Category(s)</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($ImageList as $Image):?>
                      <tr>
                        <td><?php echo $Image->title;?></td>
                        <td><?php echo $Image->content;?></td>
                        <td><img src="<?php if($Image->filepath !=''){echo base_url('assets/frontend/upload/image/'.$Image->filepath);}else
							{echo base_url('assets/frontend/img/nophoto.png');}?>"
                           title="<?php echo $Image->category_ids; ?>" style="width:100px; height:100px;"/></td>
                        <td><?php $catids=explode(',', $Image->category_ids); $cate_name= $this->Webmodel->getName('tbl_image_category', 'category_name', $catids);
						foreach($cate_name as $c){echo $c->category_name.'<br>';}
						
						?></td>
                        <td><?php echo $Image->status==1?'<span class="btn btn-success btn-xs">Active</span>':'<span class="btn btn-danger btn-xs">Inactive</span>';?></td>
                        <td><a href="<?php echo base_url('backend/web/updateimg/'.$Image->id);?>">Edit</a></td>
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