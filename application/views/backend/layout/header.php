
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title;?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
   <link rel="stylesheet" href="<?php echo base_url('assets/backend/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/ionicons.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/dist/css/AdminLTE.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/dist/css/skins/_all-skins.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/datatables/dataTables.bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/iCheck/all.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/summernote/summernote.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/bootstrap-datepicker.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/select2/select2.min.css'); ?>">
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/font-awesome.min.css'); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/ionicons.min.css'); ?>">
    <!-- Theme style -->
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/dist/css/skins/skin-blue.min.css');?>">
	<script src="<?php echo base_url('assets/backend/plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <link rel="shortcut icon" href="<?php echo base_url('assets/backend/images/ssak.ico');?>">
  </head>
  
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="<?php echo $setting['site_url']; ?>" class="logo">
        <span class="logo-mini"><img src="<?php echo $this->Webmodel->getLogo();?>" class="img-responsive" style="height:50px;" /></span>
        <span class="logo-lg"><img src="<?php echo $this->Webmodel->getLogo() ;?>" class="img-responsive" style="height:50px;" /></span>
    </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- /.messages-menu -->

              <!-- Notifications Menu -->
              
              <!-- Tasks Menu -->
              
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?php echo base_url('assets/backend/dist/img/avatar.jpg'); ?>" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo $this->session->userdata('name');?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?php echo base_url('assets/backend/dist/img/avatar.jpg'); ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $data=$this->session->userdata('name');?>
                      <small>Member since June. 2016</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo site_url('backend/web/profile');?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo site_url('backend/web/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              
            </ul>
          </div>
        </nav>
      </header>