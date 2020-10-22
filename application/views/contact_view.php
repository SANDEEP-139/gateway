<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="breadcrumbs breadcrumbs-dark">
			<div class="container">
				<h1 class="pull-left">Contact us</h1>
				<ul class="pull-right breadcrumb">
					<li><a href="<?php echo base_url();?>">Home</a></li>
					
					<li class="active">Contact us</li>
				</ul>
			</div>
		</div>
<!--=== Content Part ===-->
		<div class="container content">
			<div class="row margin-bottom-30">
				<div class="col-md-9 mb-margin-bottom-30">
					<div class="headline"><h2>Contact Form</h2></div>
					<form action="<?php echo base_url('web/contact'); ?>" method="post" id="sky-form3" class="sky-form contact-style">
						<fieldset class="no-padding">
                        <?php echo $this->session->flashdata('msg'); ?>
							<?php echo form_label('Name'); ?> <span class="color-red">*</span>
							<div class="row sky-space-20">
								<div class="col-md-7 col-md-offset-0">
									<div>
                        <?php echo form_input(array('type'=>'text','value'=>set_value('name'),'name'=>'name','class'=>'form-control'));?>
                             <?php echo form_error('name', '<p class="text-danger">', '</p>'); ?>
									</div>
								</div>
							</div>

							<?php echo form_label('Email'); ?> <span class="color-red">*</span>
							<div class="row sky-space-20">
								<div class="col-md-7 col-md-offset-0">
									<div>
							<?php echo form_input(array('type'=>'text','value'=>set_value('email'),'name'=>'email','class'=>'form-control'));?>
                             <?php echo form_error('email', '<p class="text-danger">', '</p>'); ?>

									</div>
								</div>
							</div>
                                                       <?php echo form_label('Mobile'); ?> <span class="color-red">*</span>
							<div class="row sky-space-20">
								<div class="col-md-7 col-md-offset-0">
									<div>
							<?php echo form_input(array('type'=>'text','value'=>set_value('mobile'),'name'=>'mobile','class'=>'form-control'));?>
                             <?php echo form_error('mobile', '<p class="text-danger">', '</p>'); ?>

									</div>
								</div>
							</div>
							<?php echo form_label('Message'); ?> <span class="color-red">*</span>
							<div class="row sky-space-20">
								<div class="col-md-7 col-md-offset-0">
									<div>
          <?php echo form_textarea(array('class'=>'form-control', 'value'=>set_value('message'),  'placeholder'=>'Message', 'name' => 'message')); ?>

                                   <?php echo form_error('message', '<p class="text-danger">', '</p>'); ?>

									</div>
								</div>
							</div>
							<div class="row margin-bottom-30"></div>
                         <div class="g-recaptcha" data-sitekey="6LcPkRgUAAAAACsXPoclPLGJhUXUjV2wQoEvdGY5"></div>
							<div style="float
                            :left;">
                             <?php echo form_submit(array('value' => 'Submit', 'name'=>'submit', 'class'=>'btn btn-success pull-right btn-lg')); ?>
                             </div>
						</fieldset>

                           
						<!--/*<div class="message">
							<i class="rounded-x fa fa-check"></i>
							<p>Your message was successfully sent!</p>
						</div>*/-->
					</form>
				</div><!--/col-md-9-->

				<div class="col-md-3">
					<!-- Contacts -->
					<div class="headline"><h2>Contacts</h2></div>
					<ul class="list-unstyled who margin-bottom-30">
						<li><a href="#"><i class="fa fa-home"></i><?php echo $setting[0]['address'];?></a></li>
						<li><a href="#"><i class="fa fa-envelope"></i><?php echo $setting[0]['email'];?></a></li>
						<li><a href="#"><i class="fa fa-phone"></i><?php echo $setting[0]['phone'];?></a></li>
					</ul>

					

					
					
				</div><!--/col-md-3-->
			</div><!--/row-->

			<!-- Owl Clients v1 -->
			
			<!-- End Owl Clients v1 -->
		</div><!--/container-->
		<!--=== End Content Part ===-->
       
        