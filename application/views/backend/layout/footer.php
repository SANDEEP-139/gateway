<!-- Main Footer -->
      <footer class="main-footer">
      <?php //echo var_dump($setting[0]['title']);?>
            <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="<?php echo base_url(); ?>" target="_blank"><?php echo $setting[0]['title'];?></a>.</strong> All rights reserved.
            <span>Design &amp; Developed By : <a href="http://www.ssak.co.in" target="_blank">SSAK Solution Services Pvt. Ltd</a></span>
        </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
<script type="text/javascript">
	$(function() {
		$('.summernote').summernote({
		height: 200
		
		});
		
		/*$('form').on('submit', function (e) {
		e.preventDefault();
		alert($('.summernote').code());
		});*/
	});
</script>
    <!-- REQUIRED JS SCRIPTS -->
    <script src="<?php echo base_url('assets/backend/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/morris/morris.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/fastclick/fastclick.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/backend/dist/js/app.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/sparkline/jquery.sparkline.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/chartjs/Chart.min.js'); ?>"></script>
   <?php /*?> <script src="<?php echo base_url('assets/backend/dist/js/pages/dashboard2.js'); ?>"></script><?php */?>
   <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <script src="<?php echo base_url('assets/backend/summernote/summernote.js'); ?>"></script>

  </body>
</html>