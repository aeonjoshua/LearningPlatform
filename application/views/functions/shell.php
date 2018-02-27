  <div class="list-group">
  <div id="sidemenu">
    <h4>Resource Manager</h4>
    <script type="text/javascript">
    var container = document.getElementById("rm");
    for (var i = 0; i < 20; i++) {
      container.innerHTML += '<div id="div'+i+'"></div>';
    }
    </script>

    <ul id="rm">
      <input id="outlinetitle" type="text" name="ol_name" placeholder="Project title" value="<?php if(isset($_SESSION['outlineTitle'])){ echo $_SESSION['outlineTitle'];}?>">
      <button id="saveit" type="button" name="save" onclick="save()">Save title</button>
      <?php
       if(isset($_SESSION['resmgr'])){
         foreach ($_SESSION['resmgr'] as $value) {
           echo $value;
         }
      }
        ?>
      </ul>
  </div>
</div>

<script type="text/javascript">
  function save(){
    var myLength = $("#outlinetitle").val().length;
    if(myLength==0){
       alert('A title is needed');
     }
     else{
       var title = $("#outlinetitle").val();
       $.post("<?php echo base_url('Ajax_control/title');?>",{
         posttitle: title
       },
       function(data){
         $("#outlinetitle").html(data);
       });
   }
   }

   // $("#outlinetitle").blur(function(){
   //   var title = $("#outlinetitle").val();
   //    $.post("<?php //echo base_url('Ajax_control/title');?>",{
   //     posttitle: title
   //   },
   //   function(data){
   //     $("#outlinetitle").html(data);
   //   });
   // });
</script>
