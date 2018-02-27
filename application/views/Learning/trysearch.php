<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

//  $connect = mysqli_connect("localhost", "root", "", "learningplatform");
// if(isset($_POST["submit"]))
// {
//      if(!empty($_POST["search"]))
//      {
//           $query = str_replace(" ", "+", $_POST["search"]);
//           header("location:search_title?search=" . $query);
//      }
// }
?>
  <div align = "center" id = "container">


      <h1> Search </h1>

      <div class="search-container">
      <div class="row upse">
        <div class="col-sm-2"></div>
        <div class = "col-sm-6 form-group">
          <form class = "form-inline  sss" role = "form" action="<?php echo base_url(); ?>Learning/search_title" method= "post">
                <input type = "text" class="form-control search_box" name = "search" placeholder = "Search here..." value ="<?php if(isset($_GET["search"])) echo $_GET["search"]  ?>">
            <button type ="submit" class = "btn btn-info" name = "submit">Search </button>
            <div class="col-sm-4 text-center">
              <a class="btn btn-info upload" href="<?php echo base_url(); ?>Learning/browse"> Browse All Thesis </a>
            </div>
          </form>
          </div>
      </div>
      </div>


    <table style = "width: 978px;" class = "table table-striped">
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
     <?php echo $links ?>
</div>
