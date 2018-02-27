<?php defined ('BASEPATH') OR exit ('No direct script access allowed');

 $connect = mysqli_connect("localhost", "root", "", "learningplatform");
if(isset($_POST["submit"]))
{
     if(!empty($_POST["search"]))
     {
          $query = str_replace(" ", "+", $_POST["search"]);
          header("location:search_title?search=" . $query);
     }
}
?>
<body>
  <div align = "center" id = "container">


      <h1> Search </h1>

      <div class="search-container">
      <div class="row upse">
        <div class="col-sm-2"></div>
        <div class = "col-sm-10 form-group">
          <form class = "form-inline  sss" role = "form" action="<?php echo base_url(); ?>Learning/search_title" method= "post">
                <input type = "text" class="form-control search_box" name = "search" placeholder = "Search here..." value ="<?php if(isset($_GET["search"])) echo $_GET["search"]  ?>">
            <button type ="submit" class = "btn btn-info" name = "submit">Search </button>
            <div class="col-sm-2 text-center">
              <a class="btn btn-info upload" href="<?php echo base_url(); ?>Learning/browse"> Browse All Thesis </a>
            </div>
          </form>
          </div>
      </div>
      </div>

      <div class = "table-responsive" style="width: 978px;">
      <table id="search_data" class = "table table-striped">
      <thead style ="background-color: #2aabd2;" >
        <tr>
          <th>Title</th>
          <th>Course</th>
          <th>Date Uploaded</th>
          <th>Adviser</th>
        </tr>
      </thead>

    <?php

     if(isset($_GET["search"]))
     {
          $title['mypage'] = "Project";
          $condition = '';
          $query = explode(" ", $_GET["search"]);
          foreach($query as $text)
          {
               $condition .= "title LIKE '%".mysqli_real_escape_string($connect, $text)."%' OR ";
          }
          $condition = substr($condition, 0, -4);
          $sql_query = "SELECT projects_tbl.proj_id, projects_tbl.title, projects_tbl.date_uploaded, advisers_tbl.professor, courses_tbl.abbrev
          FROM projects_tbl INNER JOIN advisers_tbl ON projects_tbl.adv_id=advisers_tbl.adv_id
          INNER JOIN courses_tbl on projects_tbl.course_id=courses_tbl.course_id  WHERE " . $condition ;
          $result = mysqli_query($connect, $sql_query);

          if(mysqli_num_rows($result) > 0)
          {
                while($row = mysqli_fetch_array($result))
               {
                    echo '<tr><td><a href="'.base_url('Show_project?id='.$row['proj_id']).'">'.$row["title"].'</td>
                              <td>'.$row["abbrev"].'</td>
                              <td>'.date('F d, Y (h:i A)', strtotime($row["date_uploaded"])).'</td>
                              <td>'.$row["professor"].'</td>
                              </tr>';
               }
          }
     }

    ?>
  </table>
</div>
</div>
</body>

<script>
$(document).ready(function(){
     $('#search_data').DataTable({
      "bFilter" : false,
      "bInfo" : false,
      "bLengthChange": false
     });

});
</script>
