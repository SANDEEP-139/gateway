<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url('assets/backend/dist/img/avatar.jpg'); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('name');?></p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- search form (Optional) -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
            <li class="header"><strong>MAIN NAVIGATION</strong></li>
            <li class="treeview">
                <a href="<?php echo site_url('backend/web'); ?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
              <li class="treeview <?php if($fileName=='configration') echo 'active'; ?>">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>Manage Setting</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('backend/web/configration'); ?>"><i class="fa fa-angle-double-right"></i> Site Configration</a></li>
                    </ul>
                    </li>
              <li class="treeview <?php if($fileName=='configration') echo 'active'; ?>">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>Manage Page</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                	
                    <li><a href="<?php echo site_url('backend/web/pages'); ?>"><i class="fa fa-angle-double-right"></i> All Page</a></li>
                    <li><a href="<?php echo site_url('backend/web/addpage'); ?>"><i class="fa fa-angle-double-right"></i> Add New Page</a></li>
                   
                    </ul>
             </li>
               <li><a href="<?php echo site_url('backend/web/selectFeaturedPage'); ?>"><i class="fa fa-angle-double-right"></i> Manage Featured Page</a></li>

               <li class="treeview <?php if($fileName=='configration') echo 'active'; ?>">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>Manage Image</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                	
                    <li><a href="<?php echo site_url('backend/web/addImageCategory'); ?>"><i class="fa fa-angle-double-right"></i> Add Category</a></li>
                 <li><a href="<?php echo site_url('backend/web/listimage'); ?>"><i class="fa fa-angle-double-right"></i> Image List</a></li>
                 <li><a href="<?php echo site_url('backend/web/Addimg'); ?>"><i class="fa fa-angle-double-right"></i> Add New Image</a></li>
                   
                    </ul>
             </li>
            	
                <li class="treeview <?php if($fileName=='configration') echo 'active'; ?>">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>Manage Video</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                	
                    <li><a href="<?php echo site_url('backend/web/addVidCategory'); ?>"><i class="fa fa-angle-double-right"></i> Add Category</a></li>
                 <li><a href="<?php echo site_url('backend/web/listVid'); ?>"><i class="fa fa-angle-double-right"></i> Video List</a></li>
                 <li><a href="<?php echo site_url('backend/web/AddVid'); ?>"><i class="fa fa-angle-double-right"></i> Add New Video</a></li>
                   
                    </ul>
             </li>
             
                   <li class="treeview <?php if($fileName=='configration') echo 'active'; ?>">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>Manage Book</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                	
                    <li><a href="<?php echo site_url('backend/web/addBookCategory'); ?>"><i class="fa fa-angle-double-right"></i> Add Category</a></li>
                 <li><a href="<?php echo site_url('backend/web/listBook'); ?>"><i class="fa fa-angle-double-right"></i> Book List</a></li>
                 <li><a href="<?php echo site_url('backend/web/AddBook'); ?>"><i class="fa fa-angle-double-right"></i> Add New Book</a></li>
                   
                    </ul>
             </li>
                <li class="treeview <?php if($fileName=='configration') echo 'active'; ?>">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>Manage Audio</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                	
                    <li><a href="<?php echo site_url('backend/web/addAudioCategory'); ?>"><i class="fa fa-angle-double-right"></i> Add Category</a></li>
                 <li><a href="<?php echo site_url('backend/web/listAudio'); ?>"><i class="fa fa-angle-double-right"></i> Audio List</a></li>
                 <li><a href="<?php echo site_url('backend/web/AddAudio'); ?>"><i class="fa fa-angle-double-right"></i> Add New Audio</a></li>
                   
                    </ul>
             </li>
             <li class="treeview <?php if($fileName=='configration') echo 'active'; ?>">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>Manage Youtube</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                	
                    <li><a href="<?php echo site_url('backend/web/addYoutubeCategory'); ?>"><i class="fa fa-angle-double-right"></i> Add Category</a></li>
                 <li><a href="<?php echo site_url('backend/web/listYoutube'); ?>"><i class="fa fa-angle-double-right"></i> Youtube List</a></li>
                 <li><a href="<?php echo site_url('backend/web/AddYoutube'); ?>"><i class="fa fa-angle-double-right"></i> Add New Audio</a></li>
                   
                    </ul>
             </li>
                 <li class="treeview <?php if($fileName=='configration') echo 'active'; ?>">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>Manage Articles</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                	
                    <li><a href="<?php echo site_url('backend/web/addArticleCategory'); ?>"><i class="fa fa-angle-double-right"></i> Add Category</a></li>
                 <li><a href="<?php echo site_url('backend/web/listArticle'); ?>"><i class="fa fa-angle-double-right"></i> Articles List</a></li>
                 <li><a href="<?php echo site_url('backend/web/AddArticle'); ?>"><i class="fa fa-angle-double-right"></i> Add New Article</a></li>
                   
                    </ul>
             </li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>