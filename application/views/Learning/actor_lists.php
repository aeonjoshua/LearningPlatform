<?php defined ('BASEPATH') OR exit ('No direct script access allowed'); ?>

<div id="sidemenu">

  <div class="list-group">
<a href="#" class="list-group-item list-group-item-action active">
  Cras justo odio
</a>
<a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
<a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
<a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
<a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
</div>
</div>



<div align = "center" id = "container">


    <h1> Search </h1>

    <form class = "form-inline" role = "form"  action="<?php echo base_url().'Learning/search_title'; ?> " method= "post">
      <div class = "form-group">
          <input type = "text" class="form-control" name = "search" id = "title" placeholder = "Search here.">
      </div>
      <button type ="submit" class = "btn btn-info" name = "submit"> Search </button>
    </form> <br/>

    <table style = "width: 978px;" class = "table table-striped">
        <thead style ="background-color: #2aabd2;" >
          <tr>
            <th> Title </th>
            <th> Course </th>
            <th> Uploader </th>
            <th> Date Uploaded </th>
          </tr>
        </thead>
    <tbody>
      <?php foreach ($actor as $row) { ?>
      <tr>
        <td><?php echo $row ->title; ?></td>
        <td><?php echo $row ->course; ?></td>
        <td><?php echo $row ->uploader; ?></td>
        <td><?php echo $row ->dateuploaded; ?></td>
      </tr>
    <?php } ?>

    </tbody>
</table>

   <?php echo $links ?>
</div>
