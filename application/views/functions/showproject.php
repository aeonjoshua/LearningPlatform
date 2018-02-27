<script type="text/javascript">
function selectedtext(){
  var iframe = document.getElementById('pdfview');
  var idoc = iframe.contentDocument || iframe.contentWindow.document; // ie compatibility
  var str = idoc.getSelection().toString();
  var cout = str.length;
  var nxtStr = '<div><p class="list-group-item list-group-item-action">'+str+'</p></div>';

  if(cout==0){
    alert("No text selected");
    }
  else {
    $.post("<?php echo base_url('Ajax_control');?>",{
      postres: nxtStr
    },
    function(data){
      $("#div"+counter).html(data);
    });
    counter+=1;
  }
  }
</script>


<?php

  foreach ($showproj as $project) {
    echo '<h2>'.
    $project['title'].
    '</h2><p>by: '.
    $project['author'].
    '</p>'.
    '<p><small><i><a href="#">'.
    $project['abbrev'].
    '</a></i></small> | <a href="#"><small><i>'.
    $project['year'].
    '</i></small></a> | <a href="#"><i><small>'.
    $project['professor'].
    '</small></i></a></p><div>'.
    $project['abstract'].'</div>'.
    '<iframe id="pdfview" width="700" height="850" src="./output/'.
    $project['file_name'].
    '.html"></iframe>';
   }
?>

<button type="submit" onClick="selectedtext()">Add to Resource Manager</button>
