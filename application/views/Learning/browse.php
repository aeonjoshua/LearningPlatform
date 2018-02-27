<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

?>

<head>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
     <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" />
</head>


  <div align = "center" id = "container">


      <h3 class = "search-title"> Search </h3>
      <div class="search-container">
            <div class="row upse">
              <div class = "col-sm-12">
                <form class = "form-inline" role = "form" action="<?php echo base_url().'Learning/search_title'; ?> " method= "post">
                  <button type ="submit" class = "btn btn-info searchb" name = "submit"><i class="fa fa-search" aria-hidden="true"></i> Search</button><input type = "text" class="form-control" id="searchf" name = "search" placeholder = "Search here...">
                </form>
              </div>
            </div>
            </div>
      <div class = "table-responsive" style="width: 978px;">
    <table id="search_data"  class = "table table-striped table-bordered">
      <thead style ="background-color: #2aabd2;" >
        <tr>
          <th>Title</th>
          <th>Course</th>
          <th>Date Uploaded</th>
          <th>Adviser</th>
        </tr>
      </thead>

    <?php
     foreach ($actor as $project) {
      echo generateTableRow($project);
     }
    // edraw max
    function generateTableRow($project)
     {

     $projectUrl = base_url("show_project?id=$project->proj_id");
     $date = date('F d, Y (h:i A)', strtotime($project->date_uploaded));
     $abbrev = ($project->abbrev);
     $professor = ($project->professor);
     $tableRow  =  '<tr>';
     $tableRow .= "<td><a href=\"$projectUrl\">$project->title</td>";
     $tableRow .= "<td>$abbrev</td>";
     $tableRow .= "<td>$date</td>";
     $tableRow .= "<td>$professor</td>";
     $tableRow .= '</tr>';
     return $tableRow;

     }


    ?>
  </table>
</div>
</div>

<script>
$(document).ready(function(){
     $('#search_data').DataTable({
      "bFilter" : false,
      "bLengthChange" : false,
      "bInfo" : false
      //  "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>'
     });

});
</script>
