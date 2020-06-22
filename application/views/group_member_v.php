<?php include("header.php") ?>
<div class="page-header">
	<h1 class="page-title">Group Member</h1>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
		<li class="breadcrumb-item"><a href="<?= base_url();?>groups">Group</a></li>
		<li class="breadcrumb-item active">Member</li>
	</ol>
	
</div>

<div class="page-content">
	<div class="row row-lg">
		<div class="col-lg-7">
			<!-- Widget User list -->
			<div class="card" id="widgetUserList">
				<div class="card-header cover overlay">
					<img class="cover-image h-150" src="<?= base_url();?>assets//examples/images/dashboard-header.jpg" alt="...">
					<div class="overlay-panel vertical-align overlay-background">
						<div class="vertical-align-middle">
							<div class="float-left">
								<div class="font-size-20"><?= $data->name?></div>
								<p class="mb-20 text-nowrap">
									<span class="text-break"><?= $data->email?></span>
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="card-block">
					<!-- Panel Projects -->
					<div class="panel" id="projects">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<tr>
                  						<td>No</td>
                  						<td>Name</td>
										<td>Email</td>
										<td>Role</td>
                  						<?php if($data->add_by == $user_now->id){ ?>
										<td>Actions</td>
                  						<?php } ?>
									</tr>
								</thead>
								<tbody>
                					<?php $no=1; foreach($member as $d){ ?>
									<tr>
                  						<td><?= $no++; ?></td>
                 			 			<td><?= $d->name?></td>
										<td><?= $d->email?></td>
										<td><?= ucwords($role[$d->id])?></td>
                  						<?php if($data->add_by == $user_now->id){ ?>
										<td>
											<button type="button" class="btn btn-sm btn-icon btn-pure btn-default waves-effect waves-classic" data-toggle="tooltip" data-original-title="Delete">
												<i class="icon md-close" aria-hidden="true"></i>
											</button>
										</td>
                  						<?php } ?>
									</tr>
                					<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- End Panel Projects -->
					<?php if($data->add_by == $user_now->id){ ?>
					<a data-toggle="panel-close" aria-hidden="true"><button type="button" class="btn-raised btn btn-default btn-floating waves-effect waves-classic waves-effect waves-light" data-toggle="tooltip" data-original-title="Add Member" >
						<i class="icon md-plus" aria-hidden="true"></i>
					</button></a>
					<?php } ?>
				</div>
			</div>
			<!-- End Widget User list -->
		</div>
		<?php if($data->add_by == $user_now->id){ ?>
		<div class="col-lg-5">
			<div class="panel">
              	<div class="panel-heading">
                	<h3 class="panel-title">Form Add Group Member</h3>
	                <div class="panel-actions panel-actions-keep">
	                  <a class="panel-action icon md-close" data-toggle="panel-close" aria-hidden="true"></a>
	                </div>
              	</div>
              	<div class="panel-body">
                	<form method="post" autocomplete="off">
		                <div class="form-group form-material">
		                  	<label class="form-control-label" for="inputBasicEmail">Group Email Address</label>
		                  	<input type="email" class="form-control" id="inputBasicEmail" name="email" value="<?= (empty($data->email))?'':$data->email;  ?>"
		                    placeholder="Email Address" autocomplete="off" />
		                </div>

		                <div class="form-group form-material ">
		                  	<label class="form-control-label" for="inputBasicFirstName">Name</label>
		                  	<input type="text" class="form-control" id="inputBasicName" name="name" value="<?= (empty($data->name))?'':$data->name;  ?>" 
		                    placeholder="Name" autocomplete="off" />
		                </div>
		                
		                <div class="form-group form-material">
		                  	<button type="submit" name="save" value="save" class="btn btn-primary">Add Member Group</button> &nbsp; &nbsp;
		                  	<button type="button" class="btn btn-default" data-toggle="panel-close" aria-hidden="true">Cancel</button>
		                </div>
		                <input type="hidden" name="id" value="<?= $data->id ?>">
	              	</form>
              	</div>
            </div>
		</div>
		<?php } ?>
	</div>
</div>
<?php include("footer.php") ?>
<script type="text/javascript">
	$( document ).ready(function() {
		// Override global options
		toastr.options = {
			positionClass: 'toast-top-center'
		};
		<?php if($success){ ?>
			toastr.success('<?= $success; ?>', 'Success', {timeOut: 3000})
		<?php }	
		if($error){ ?>
				toastr.error('<?= $error; ?>', 'Failed', {timeOut: 3000});
		<?php } ?>
			
		$(".btn-leave").click(function(e){
			e.preventDefault();
			link = $(this).attr('href');
			alertify.confirm('Do you continue to leave this group?', 
				function(){ 
					location.replace(link);
				},function(){ 
					
				});
		});
	});
</script>