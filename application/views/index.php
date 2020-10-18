<?php include("header.php") ?>
<div class="page-content container-fluid">
  <div class="row" data-plugin="matchHeight" data-by-row="true">
    <div class="col-xl-6 col-md-12">
      <!-- Widget Linearea One-->
      <!-- <div class="card card-shadow" id="widgetLineareaOne">
        <iframe id="my-iframe"
            src="http://localhost:3000/public/dashboard/16ae4d81-d14f-4c3f-8250-4e67f6baa887#refresh=1"
            frameborder="0"
            height="500"
            allowtransparency
        ></iframe>
      </div> -->
      <!-- End Widget Linearea One -->
    </div>
    <div class="col-xl-6 col-md-12" id="test">
      <!-- Widget Linearea One-->
      <!-- <div class="card card-shadow" id="widgetLineareaOne">
        <iframe
            src="http://localhost:3000/public/dashboard/87c3998d-f59f-488f-bf74-d42cba4a3063"
            frameborder="0"
            height="500"
            allowtransparency
        ></iframe>
      </div> -->
      <!-- End Widget Linearea One -->
    </div>
  </div>
</div>
<?php include("footer.php") ?>
<script type="text/javascript">
    $(function() {
      var myframe = $('#my-iframe'); 
      myframe.bind("load",function(){
        window.onerror = function (msg, url, lineNo, columnNo, error) {
          var string = msg.toLowerCase();
          var substring = "script error";
          if (string.indexOf(substring) > -1){
            alert('Script Error: See Browser Console for Detail');
          } else {
            var message = [
              'Message: ' + msg,
              'URL: ' + url,
              'Line: ' + lineNo,
              'Column: ' + columnNo,
              'Error object: ' + JSON.stringify(error)
            ].join(' - ');

            alert(message);
          }
          return false;
        };
      });
      // function handleException(e) { 
      //     console.log(e);
      //     alert(e);
      //     return false;
      // }
      // window.addEventListener("error", handleException, false);
    });

    // (function($){
    //   $.event.special.destroyed = {
    //     remove: function(o) {
    //       if (o.handler) {
    //         o.handler()
    //       }
    //     }
    //   }
    // })(jQuery)


    // $(function() {
    //   // var myframe = $('#my-iframe'); 
    //   // myframe.bind("load",function(){
    //   //     myframe.contents().find("body").remove();
    //   // });
      
    //   // $('.dc-chart',myframe.contents()).bind('destroyed', function() {
    //   //   console.log("anjay");
    //   // });
    //   // $("#btnTest").click(function(){
    //   //   alert("test");
    //   //   myframe.contents().find("body").remove();
    //   // });
    //   var iframe = document.getElementById("my-iframe");
    //   console.log("-------------");
    //   console.log(iframe)
    //   var elmnt = iframe.contentWindow.document.getElementById("root");
    //   console.log("-------------");
    //   console.log(elmnt)
    //   console.log("-------------");
    //   elmnt.style.display = "none";
    // });
</script>
