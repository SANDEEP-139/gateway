<?php $setting = $this->Pagemodel->getsetting();?>
<?php $this->load->view('backend/layout/header', array('setting'=>$setting)); ?>
<?php $this->load->view('backend/layout/leftbar', array('setting'=>$setting)); ?>
<?php $this->load->view($content, array('setting'=>$setting));?>

 <!-- Content Wrapper. Contains page content -->
      <?php /*?><div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Page Header
            <small>Optional description</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><?php */?>
      <!-- /.content-wrapper -->
      <script>
		window.setTimeout(function () {
			$(".alert-success").fadeTo(300, 0).slideUp(300, function () {
				$(this).remove();
			});
		}, 3000);
    
		window.setTimeout(function () {
			$(".alert-danger").fadeTo(300, 0).slideUp(300, function () {
				$(this).remove();
			});
		}, 5000);
    
		window.setTimeout(function () {
			$(".alert-warning").fadeTo(300, 0).slideUp(300, function () {
				$(this).remove();
			});
		}, 3000);
   
    </script>
    
<?php $this->load->view('backend/layout/footer', array('setting'=>$setting)); ?>
        