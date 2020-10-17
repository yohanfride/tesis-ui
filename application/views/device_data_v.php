<?php include("header.php") ?>
<div class="page-header">
  <h1 class="page-title">Devices Groups Data</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?= base_url();?>device">Devices</a></li>
    <li class="breadcrumb-item active">Data</li>
  </ol>
  <div class="page-header-actions">
  </div>
</div>

<div class="page-content">
  <div class="row row-lg">
    <div class="col-md-12">
      <div class="panel">
        <header class="panel-heading">
          <div class="panel-actions"></div>
          <h3 class="panel-title">List of Data : <?= $group->name; ?> - Device : <?= $data->name; ?> [ <?= $data->device_code; ?> ] </h3>
        </header>
        <div class="panel-body">
          <table class="table table-hover dataTable table-striped w-full" id="example" style="overflow: scroll;">
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include("footer.php") ?>
<script src="<?= base_url()?>assets/js/elastic/elasticsearch.js"></script>
<script src="<?= base_url()?>assets/js/elastic/jquery.elastic-datatables.js"></script>

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
    
    var client = elasticsearch.Client({
      host: 'http://localhost:9200',
      method: 'POST'
    });

    $.fn.dataTable.getMapping({
      index: 'group-<?= $group->code_name ?>',
          client: client,
          execpt:['raw_message','date_add_sensor_unix','date_add_server_unix','topic','token_access','ip_sender']
    },function(result){
      console.log(result);
      $('#example').dataTable( {
          'columns':result,
          "searching": false,
          'bProcessing': true,
          'bServerSide': true,
          'fnServerData': $.fn.dataTable.elastic_datatables( {
              index: 'group-<?= $group->code_name ?>',
              type: 'authors',
              client: client,
                body:{
            size:15,
            sort: [
                  {
                      "date_add_server":  "desc"
                  }
              ],
              query: {
                  "match_phrase": {
                    "device_code": "<?= $data->device_code; ?>"
                  }
              } 
          }
          } )
      } );
    })

  });
</script>