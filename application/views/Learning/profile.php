<?php defined ('BASEPATH') OR exit ('No direct script access allowed'); ?>

<div class = "container">

    <?php if(isset($_SESSION['Success'])){ ?>
      <div class ="fo alert alert-success"> <?php echo $_SESSION ['Success']; ?> </div>
        <?php
      } ?>

  <!-- try lang ng effects, pero ganito sana para maangas, pero dapat nakalutang lang sya -->
      <script type="text/javascript">
        $(document).ready(function () {
        $(".fo").fadeOut(2200);
        });
      </script>

      <div class="profile-container">
          <div>
            Hello, <?php echo $_SESSION ['username'];  ?>


          </div>
      </div>
  </div>

  <div align = "center" id = "container">


      <h1> Search </h1>

      <div class="search-container">
      <div class="row upse">
        <div class="col-sm-4 text-center">
          <a class="btn btn-info upload" href="<?php echo base_url(); ?>upload"> Upload Project </a>
        </div>
        <div class="col-sm-4"></div>
        <div class = "col-sm-4 form-group">
          <form class = "form-inline  sss" role = "form" action="<?php echo base_url().'Learning/search_title'; ?> " method= "post">
                <input type = "text" class="form-control search_box" name = "search" placeholder = "Search here...">
            <button type ="submit" class = "btn btn-info" name = "submit">Search </button>
          </form>
          </div>
      </div>
      </div>

    <!--  <form class = "form-inline" role = "form" action="<?php// echo base_url().'Learning/search_title'; ?> " method= "post">
        <div class = "form-group">
            <input type = "text" class="form-control" name = "search" id = "firstname" placeholder = "Search here.">
        </div>
        <button type ="submit" class = "btn btn-info" name = "submit">Search </button>
      </form> <br/> -->


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
      foreach ($ms as $projects ) {
       echo '<tr><td><a href="'.
       base_url('show_project?id='.
       $projects['proj_id']).
       '">'.
       $projects['title'].
       '</td><td>'.
       $projects['abbrev'].
       '</td><td>'.
       date('F d, Y (h:i A)', strtotime($projects['date_uploaded'])).
       '</td><td>'.
       $projects['professor'].
       '</td></tr>'
       ;
    }
    ?>
  </table>
</div>
