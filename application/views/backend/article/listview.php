 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Article
            <small>All</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            
            <li class="active">All Article</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">All Article</h3><a href="<?php echo base_url('backend/web/AddArticle');?>" class="btn btn-success pull-right">Add New Article</a>
                </div><!-- /.box-header -->
                 <?php echo $this->session->flashdata('msg'); ?>
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>featured image</th>
                        <th>Article</th>
                        <th>Category(s)</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($ArticleList as $Article):?>
                      <tr>
                        <td><?php echo $Article->title;?></td>
                        <td><?php echo $Article->content;?></td>
                        <td>
                        <?php if($Article->coverpage!=''){
	$exten= explode('.', $Article->coverpage);
	?><img src="<?php echo base_url('assets/frontend/upload/article/'.$Article->coverpage);?>" alt="Ambedkartv" title="Not Available" style="width:50px; height:50px;"/>
<?php }else{?>
	<img src="<?php echo base_url('assets/frontend/img/nophoto.png');?>" alt="Ambedkartv" title="Not Available" style="width:50px; height:50px;"/>
    <?php }?>
    
    </td>
                        <td>
                        <?php if($Article->filepath!=''){
	$exten= explode('.', $Article->filepath);
	?><a href="<?php echo base_url('assets/frontend/upload/article/'.$Article->filepath);?>" target="_blank">View</a>
<?php }else{?>
	<img src="<?php echo base_url('assets/frontend/img/NotAvailable.gif');?>" alt="Ambedkartv" title="Not Available" style="width:150px; height:100px;"/>
    <?php }?>
    
    </td>
                        <td><?php $catids=explode(',', $Article->category_ids); $cate_name= $this->Webmodel->getName('tbl_article_category', 'category_name', $catids);
						foreach($cate_name as $c){echo $c->category_name.'<br>';}
						
						?></td>
                        <td><?php echo $Article->status==1?'<span class="btn btn-success btn-xs">Active</span>':'<span class="btn btn-danger btn-xs">Inactive</span>';?></td>
                        <td><a href="<?php echo base_url('backend/web/updateArticle/'.$Article->id);?>">Edit</a></td>
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