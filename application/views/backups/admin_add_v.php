<?php include("header.php") ?>
			<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Administrator</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="<?= base_url()?>administration">
									<i class="link-icon icon-grid"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="<?= base_url()?>admin">Administrator</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Add New Data</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-8 col-lg-6">
							<form  method="post" action="">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Form - Add New Administrator Data</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="name">Name</label>
												<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required="required">
											</div>
											<div class="form-group">
												<label for="username">Username</label>
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text" id="basic-addon1">@</span>
													</div>
													<input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" aria-label="Username" aria-describedby="basic-addon1" required="required">
												</div>											
											</div>
											<div class="form-group">
												<label for="email">Email</label>
												<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required="required">
											</div>
											<div class="form-group">
												<label for="phone">Phone</label>
												<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" required="required">
											</div>
											<div class="form-group">
												<label for="password">Password</label>
												<input type="password" class="form-control" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Password"  required="required">
											</div>
											<div class="form-group">
												<label for="password">Confirm Password</label>
												<input type="password" class="form-control" id="confirm_password" placeholder="Enter Confirm Password" required="required">
											</div>

											<div class="form-group">
												<div class="row">
													<div class="col-lg-6 col-md-12">
														<label for="phone">Business Page Acces</label>
														<div>
															<input type="checkbox" name="business" data-toggle="toggle" data-onstyle="primary" style="width: 200px;" onchange="changeToggle(this)" value="1">
														</div>	
													</div>
													<div class="col-lg-6 col-md-12">
														<label for="phone">Operational Page Acces</label>
														<div>
															<input type="checkbox" name="operational" data-toggle="toggle" data-onstyle="primary" style="width: 200px;" onchange="changeToggle(this)" value="1">
														</div>	
													</div>
												</div>	
											</div>
											
											<div class="form-check">
												<label class="form-check-label">
													<input class="form-check-input" type="checkbox" name="sendmail" value="true">
													<span class="form-check-sign">Send password to Administrator email</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								<div class="card-action">
									<button class="btn btn-success" name="save" value="save">Submit</button>
									<button class="btn btn-danger">Cancel</button>
								</div>								
							</div>
							</form>
						</div>
					</div>
				</div>
<?php include("footer.php") ?>
<script type="text/javascript">
	$(document).ready(function() {
		//Notify
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
	});

	////Validation Password////
	var password = document.getElementById("password")
	  	,confirm_password = document.getElementById("confirm_password");

	function validatePassword(){
	  if(password.value != confirm_password.value) {
	    confirm_password.setCustomValidity("Passwords Don't Match");
	  } else {
	    confirm_password.setCustomValidity('');
	  }
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;

	$('#datepicker').datepicker({
		format: 'yyyy-mm-dd'
	});
</script>