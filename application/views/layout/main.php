<?php $setting = $this->Pagemodel->getsetting();?>

<?php $this->load->view('layout/header', array('setting'=>$setting)); ?>
<?php $this->load->view($content, array('setting'=>$setting)); ?>
<?php $this->load->view('layout/footer', array('setting'=>$setting));?>


<script>
		window.setTimeout(function () {
			$(".alert-success").fadeTo(300, 0).slideUp(300, function () {
				$(this).remove();
			});
		}, 5000);
    
		window.setTimeout(function () {
			$(".alert-danger").fadeTo(300, 0).slideUp(300, function () {
				$(this).remove();
			});
		}, 5000);
    
		window.setTimeout(function () {
			$(".alert-warning").fadeTo(300, 0).slideUp(300, function () {
				$(this).remove();
			});
		}, 5000);
    
    </script>


