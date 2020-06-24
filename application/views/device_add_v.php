<?php include("header.php") ?>
<div class="page-header">
  <h1 class="page-title">Add New Devices Group</h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?= base_url();?>">Home</a></li>
    <li class="breadcrumb-item"><a href="<?= base_url();?>devicegroups">Devices Groups</a></li>
    <li class="breadcrumb-item active">Add</li>
  </ol>
</div>

<div class="page-content">
  <div class="row row-lg">
    <div class="col-md-12">
      <div class="panel">
        <div class="panel-body container-fluid">
        
          <!-- Example Basic Form (Form grid) -->
          <div class="example-wrap">
            <h4 class="example-title">Form Add New Device</h4>
            <div class="example">
              <form method="post" autocomplete="off">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group form-material" id="selectGroup">
                      <label class="form-control-label" for="inputSelectGroup">Devices Group</label>
                      <select class="form-control " id="inputSelectGroup" name="group">
                          <?php foreach ($device_group as $d) { ?>
                          <option value="<?= $d->code_name?>"><?= $d->name?></option>
                          <?php } ?>
                      </select>
                    </div>

                    <div class="form-group form-material ">
                      <label class="form-control-label" for="inputBasicFirstName">Device Name</label>
                      <input type="text" class="form-control" id="inputBasicName" name="name" value="<?= (empty($data->name))?'':$data->name;  ?>" 
                        placeholder="Name" autocomplete="off" />
                    </div>
                    <div class="form-group form-material">
                      <label class="form-control-label" for="inputPurpose">Purpose</label>
                      <input type="text" class="form-control" id="inputPurpose" name="purpose" value="<?= (empty($data->purpose))?'':$data->purpose;  ?>"
                        placeholder="Purpose devices group" autocomplete="off" />
                    </div>
                    <div class="form-group form-material">
                        <label class="form-control-label">Detail Information</label>
                        <textarea class="form-control empty" rows="3" name="detail"><?= (empty($data->detail))?'':$data->detail;  ?></textarea>
                    </div>  
                    <div class="form-group form-material">
                      <label class="form-control-label" for="inputLocation">Location</label>
                      <input type="text" class="form-control" id="inputLocation" name="location" value="<?= (empty($data->location))?'':$data->location;  ?>"
                        placeholder="Location devices group" autocomplete="off" />
                    </div>                                   
                  </div>

                  <div class="col-md-6">
                    <div class="form-group form-material">
                      <label class="form-control-label font-size-16" for="inputLocation">Field</label>
                    </div>
                    <div class="">
                      <div id="default-tree"></div>
                    </div>

                    <div class="row ml-20 mb-20 animation-slide-top" id="fieldDetail" style="display: none;">
                      <div class="col-md-10 p-10" style="color: #4f5584;background-color: rgba(197,202,233,.1); border-radius: .215rem;border: 1px solid #c5cae9;">
                        <div class="form-group form-material mb-0">
                          <label class="form-control-label font-size-14" for="inputLocation">Field Item</label>
                          <input type="text" class="form-control mb-10" id="inputField" placeholder="field" autocomplete="off">
                          <button type="button" id="btnAddChildField" class="btn btn-sm btn-info waves-effect waves-classic mb-5"><i class="md-plus"></i> Add New Child</button>
                          <button type="button" id="btnUpdateField" class="btn btn-warning btn-sm waves-effect waves-classic mb-5"><i class="md-edit"></i> Update</button>
                          <button type="button" id="btnDeleteChildField" class="btn btn-sm btn-danger waves-effect waves-classic mb-5"><i class="md-delete"></i> Delete Child</button>
                          <button type="button" id="btnCloseFieldDetail" class="btn btn-sm btn-danger waves-effect waves-classic float-right mb-5"><i class="md-close"></i> Cancel</button>
                        </div>
                      </div>
                    </div>

                    <div class="row ml-20 mb-20 animation-slide-bottom" id="fieldChild" style="display: none;">
                      <div class="col-md-8 p-10" style="color: #4f5584;background-color: rgba(197,202,233,.1); border-radius: .215rem;border: 1px solid #c5cae9;">
                        <div class="form-group form-material mb-0">
                          <label class="form-control-label font-size-14" for="inputLocation">Add New Field : Parent of  <b id="parent_new"></b></label>
                          <input type="text" class="form-control mb-10" id="inputChild" placeholder="field" autocomplete="off">
                          <button type="button" id="btnAddField" class="btn btn-sm btn-info waves-effect waves-classic"><i class="md-plus"></i> Add Field</button>
                          <button type="button" id="btnCloseFieldChild" class="btn btn-sm btn-danger waves-effect waves-classic float-right"><i class="md-close"></i> Cancel</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group form-material">
                  <button type="submit" name="save" value="save" class="btn btn-primary">Add New Device</button>&nbsp; &nbsp;
                  <a href="<?= base_url();?>device"><button type="button" class="btn btn-default">Cancel</button></a>
                  <input type="hidden" name="field" id="listField">
                </div>

              </form>
            </div>
          </div>
          <!-- End Example Basic Form -->
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
    
    $("#inputSelectType").change(function(){
      var typeval = $("#inputSelectType").val();
      if(typeval == 'group'){
        $("#selectGroup").show();
      } else {
        $("#selectGroup").hide();
      }

    });
    function string_to_slug(str) {
      str = str.replace(/^\s+|\s+$/g, ""); // trim
      str = str.toLowerCase();

      // remove accents, swap ñ for n, etc
      var from = "åàáãäâèéëêìíïîòóöôùúüûñç·/,:;";
      var to = "aaaaaaeeeeiiiioooouuuunc------";

      for (var i = 0, l = from.length; i < l; i++) {
        str = str.replace(new RegExp(from.charAt(i), "g"), to.charAt(i));
      }

      str = str
        .replace(/[^a-z0-9 -_]/g, "") // remove invalid chars
        .replace(/\s+/g, "_") // collapse whitespace and replace by -
        .replace(/-+/g, "-"); // collapse dashes

      return str;
    }
    var currentNode;
    function choosenode(node){
      $("#fieldChild").hide();
      $("#fieldDetail").show();
      $("#inputField").val(node.text);
      if(node.text != "List Field"){
        $("#btnUpdateField").show();
        $("#btnDeleteChildField").show();
      } else {
        $("#btnUpdateField").hide();
        $("#btnDeleteChildField").hide();
      }
      currentNode = node;
    }

    var myTree =[
      {
        text: 'List Field',
        href: '#master',
        tags: ['#master'],
        nodes:[]
      }
    ];
    // var myList = ['test',{"test2":["test21","test22","test23"]},'test3'];
    // console.log(myList);
    var myList = [];
    function updateTree(){
      var defaults = Plugin.getDefaults("treeview");
      defaults.nodeIcon = "icon md-nfc";
      defaults.levels = 5;
      var _jquery2 = babelHelpers.interopRequireDefault(jQuery);
      var options = _jquery2.default.extend({}, defaults, {
        data: myTree, 
        onNodeSelected: function onNodeSelected(event, node) {
          choosenode(node);
        }
      });
      $('#default-tree').treeview(options);
      $("#fieldDetail").hide();
      $("#fieldChild").hide();
      $("#inputChild").val("");
      $("#parent_new").html("");
      myList = saveArray(myTree[0]['nodes']);
      var jsonMyList = {
        field : myList
      }
      $("#listField").val(JSON.stringify(myList));
    }

    function saveArray(data){
      var newArray = [];
      var i;
      for (i = 0; i < data.length; i++) {
        var item = data[i]['text'];  
        console.log("iteration - "+i+" : "+item);      
        if(data[i]['nodes'].length  == 0){
          newArray.push(item);
        } else {
          var itemArray = saveArray(data[i]['nodes']);
          var obj = {};
          obj[item] = itemArray;
          newArray.push(obj);
        }
      }      
      return newArray;
    }

    updateTree();
    $("#btnCloseFieldDetail").click(function(){
      $("#fieldDetail").hide();
    });

    $("#btnAddChildField").click(function(){
      if(currentNode.text == "List Field")
        $("#parent_new").html('"<b class="red-500">List Field(Master)</b>"');
      else
        $("#parent_new").html('"'+currentNode.text+'"');

      $("#fieldDetail").hide();
      $("#inputField").val("");
      $("#fieldChild").show();
    });

    $("#btnCloseFieldChild").click(function(){
      $("#fieldChild").hide();
    });

    $("#btnAddField").click(function(){
      var inputChild = $("#inputChild").val();
      if(inputChild == ""){
        toastr.error('Child field name not found', 'Failed', {timeOut: 3000});
      } else {
        var slugInputChild = string_to_slug(inputChild);
        var indexing = [];
        indexing = indexing.concat(currentNode.tags);
        indexing.push("#"+slugInputChild);
        var newData = {
          text: slugInputChild,
          href: "#"+slugInputChild,
          tags: indexing,
          nodes:[]
        }
        addToArray(currentNode.tags,newData,myTree);
      }
    });
    
    $("#btnUpdateField").click(function(){
      var inputField = $("#inputField").val();
      if(inputField == ""){
        toastr.error('Child field name not found', 'Failed', {timeOut: 3000});
      } else {
        var slugInputChild = string_to_slug(inputField);
        updateArray(currentNode.tags,slugInputChild,myTree);
      }
    });
    $("#btnDeleteChildField").click(function(){
      alertify.confirm('Do you continue to delete this field?', 
        function(){ 
          deleteArray(currentNode.tags,myTree);
        },function(){ 
          
        });
      
    });

    function addToArray(index,newData,data){
      for (i = 0; i < data.length; i++) {
        if(data[i]['href'] == index[0])
          break;
      }
      if(index.length == 1){
        data[i].nodes.push(newData)
        updateTree();
        toastr.success('Add field success', 'Success', {timeOut: 3000})
      } else {
        childdata = data[i].nodes;
        index.shift();
        addToArray(index,newData,childdata)
      }
    }

    function updateArray(index,updateData,data){
      for (i = 0; i < data.length; i++) {
        if(data[i]['href'] == index[0])
          break;
      }
      if(index.length == 1){
        data[i].text = updateData
        updateTree();
        toastr.success('Update field success', 'Success', {timeOut: 3000})
      } else {
        childdata = data[i].nodes;
        index.shift();
        updateArray(index,updateData,childdata)
      }
    }

    function deleteArray(index,data){
      for (i = 0; i < data.length; i++) {
        if(data[i]['href'] == index[0])
          break;
      }
      if(index.length == 1){
        data.splice(i,1);
        updateTree();
        toastr.success('Delete field success', 'Success', {timeOut: 3000})
      } else {
        childdata = data[i].nodes;
        index.shift();
        deleteArray(index,childdata)
      }
    }

  });
</script>