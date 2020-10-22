 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           <?php echo ucfirst($slug);?>
            <small>All</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            
            <li class="active">All <?php echo ucfirst($slug);?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">All <?php echo ucfirst($slug);?></h3><a href="<?php echo base_url('backend/web/AddFeaturedPage/'.$slug);?>" class="btn btn-success pull-right">Add New <?php echo ucfirst($slug);?></a>
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
                    <?php foreach($FeaturedList as $Featured):?>
                      <tr>
                        <td><?php echo $Featured->title;?></td>
                        <td><?php echo $Featured->content;?></td>
                        <td><img src="<?php if($Featured->filepath !=''){echo base_url('assets/frontend/upload/featuredpage/'.$Featured->filepath);}else
							{echo base_url('assets/frontend/img/nophoto.png');}?>"
                           title="<?php echo $Featured->category_ids; ?>" style="width:100px; height:100px;"/></td>
                        <td><?php $catids=explode(',', $Featured->category_ids); $cate_name= $this->Webmodel->getName('tbl_featuredpage_category', 'category_name', $catids);
						foreach($cate_name as $c){echo $c->category_name.'<br>';}
						
						?></td>
                        <td><?php echo $Featured->status==1?'<span class="btn btn-success btn-xs">Active</span>':'<span class="btn btn-danger btn-xs">Inactive</span>';?></td>
                        <td><a href="<?php echo base_url('backend/web/updateFeaturedPage/'.$slug.'/'.$Featured->id);?>">Edit</a></td>
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