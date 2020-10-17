<?php include("header.php") ?>
<div class="page-header">
  <h1 class="page-title">Devices</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
    <li class="breadcrumb-item active">Devices</li>
  </ol>
  <div class="page-header-actions">
    <a href="<?= base_url()?>device/add/"><button type="button" class="btn btn-sm btn-icon btn-primary btn-round waves-effect waves-classic">
      <i class="icon md-plus" aria-hidden="true"></i> &nbsp; Add New Device&nbsp;&nbsp; 
    </button></a>
  </div>
</div>

<div class="page-content">
  <div class="row row-lg">
    <div class="col-md-6">
      <div class="panel">
          <!-- Example Basic Form (Form grid) -->
          <div class="p-20">
            <form method="get" autocomplete="off">
              <div class="row">
                <div class="form-group form-material col-8" id="selectGroup">
                  <label class="form-control-label" for="inputSelectGroup">Filter Devices Group</label>
                  <select class="form-control " id="inputSelectGroup" name="type">
                      <option value="all" selected="">All</option>
                      <?php foreach ($device_group as $d) { ?>
                      <option value="<?= $d->code_name; ?>" <?= ($type == $d->code_name)?'selected':'' ?> ><?= $d->name?></option>
                      <?php } ?>
                  </select>
                </div>
                <div class="form-group form-material col-4">
                  <button type="submit" class="btn btn-primary" style="width: 100%;top: 30px;"><i class="icon md-search" aria-hidden="true"></i> &nbsp; Filter</button>
                </div>
              </div>
            </form>
          </div>
          <!-- End Example Basic Form -->
      </div>
    </div>
  </div>
  <div class="row row-lg">
    <div class="col-md-12">
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">List of Master Devices</h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
            <thead>
              <tr>
                <th>Name</th>
                <th>Device Code</th>
                <th>Devices Group</th>
                <th>Location</th>
                <th>Purpose</th>
                <th>Date Add</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Name</th>
                <th>Device Code</th>
                <th>Devices Group</th>
                <th>Location</th>
                <th>Purpose</th>
                <th>Date Add</th>
                <th>Actions</th>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach($data as $d){ ?>
              <tr>
                <td><?= $d->name?></td>
                <td><?= $d->device_code?></td>
                <td><?= $device_group[$d->group_code_name]->name?></td>
                <td><?= $d->information->location; ?></td>
                <td><?= $d->information->purpose; ?></td>
                <td><?= date( "Y-m-d H:i:s", $d->date_add->{'$date'}/1000); ?></td>
                <td class="actions">
                  <a href="<?= base_url()?>device/data/<?= $d->device_code; ?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row"
                    data-toggle="tooltip" data-original-title="Show Data"><i class="icon md-file-text" aria-hidden="true"></i></a>
                  <a href="<?= base_url()?>device/edit/<?= $d->device_code; ?>" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row"
                    data-toggle="tooltip" data-original-title="Edit"><i class="icon md-edit" aria-hidden="true"></i></a>
                  <a href="<?= base_url()?>device/delete/<?= $d->id; ?>" class="btn btn-sm btn-icon btn-pure btn-default btn-leave on-default remove-row"
                    data-toggle="tooltip" data-original-title="Remove"><i class="icon md-delete" aria-hidden="true"></i></a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
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
      alertify.confirm('Do you continue to delete this device?', 
        function(){ 
          location.replace(link);
        },function(){ 
          
        });
    });

  });
</script>