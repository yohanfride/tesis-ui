
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Activation Customer</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url()?>assets/img/icon.png" type="image/png"/>

	<!-- Fonts and icons -->
	<script src="<?= base_url()?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?= base_url()?>assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/css/atlantis.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/atlantis.min.css">
</head>
<body class="login">
	<div class="wrapper wrapper-login wrapper-login-full p-0">
		<div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-easy-gradient">
			<h1 class="title fw-bold text-white mb-3"><img src="<?= base_url()?>assets/img/logo-white.svg"  class="img-responsive"></h1>
			<p class="subtitle text-white op-7"><b>Let's make it simple, Let's make it HAPPEN !</b></p>
		</div>
		<div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
			<div class="container container-login container-transparent animated fadeIn">
				<?php if(isset($invalid)){ ?>
					<h3 class="text-center"><i class="fas fa-ban"></i> Invalid Activation Link</h3>
					<div class="login-form">
						<div class="form-group form-action-d-flex mb-3">
							<a href="<?= base_url()?>authuser/login"  class="btn btn-secondary col-md-12 float-right mt-3 mt-sm-0 fw-bold" name="save" value="save">Back to Sign In Page</a>
						</div>
					</div>
				<?php } else { ?>
				<form  method="post" >
				<h3 class="text-center"><i class="fas fa-user-tie"></i> &nbsp;Activation Customer Account</h3>
				<p class="op-7">Welcome <b><?= $email?></b>, please type your phone number and ID Registration(KTP) to complete customer activation process.</p>
				<div class="login-form">	
					<div class="form-group">
						<label for="phone" class="placeholder"><b>Phone</b></label>
						<div class="position-relative">
							<input  id="phone" name="phone" type="text" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
						<label for="ktp" class="placeholder"><b>ID Registration(KTP)</b></label>
						<div class="position-relative">
							<input id="ktp" name="ktp" type="text" class="form-control" required>
						</div>
					</div>
					<div class="row form-action">
						<div class="col-md-6">
							<button type="submit" class="btn btn-secondary float-right mt-3 mt-sm-0 fw-bold" name="save" value="save">Submit</button>
						</div>
						<div class="col-md-6">
							<a href="<?= base_url()?>authuser/login" id="show-signin" class="btn btn-danger btn-link w-100 fw-bold">Cancel</a>
						</div>
					</div>
				</div>
				</form>
				<?php } ?>
			</div>
		</div>
	</div>
	<script src="<?= base_url()?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?= base_url()?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?= base_url()?>assets/js/core/popper.min.js"></script>
	<script src="<?= base_url()?>assets/js/core/bootstrap.min.js"></script>
	<script src="<?= base_url()?>assets/js/atlantis.min.js"></script>
	<!-- Bootstrap Notify -->
	<script src="<?= base_url()?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			<?php if($success){ ?>
			$.notify({
				icon: 'flaticon-success',
				title: 'Success',
				message: '<?= $success; ?>',
			},{
				type: 'success',
				placement: {
					from: "bottom",
					align: "right"
				},
				time: 3000,
			});	
			<?php }  
			if($error){ ?>
			$.notify({
				icon: 'flaticon-error',
				title: 'Failed',
				message: '<?= $error; ?>',
			},{
				type: 'danger',
				placement: {
					from: "bottom",
					align: "right"
				},
				time: 3000,
			});	
			<?php } ?>

			<?php 
			if(isset($role)){ 
				if($role == "driver"){
			?>
				$("#show-signin").click();
			<?php 
				}
			} 
			?>

		});
	</script>