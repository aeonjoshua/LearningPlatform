<?php echo form_open_multipart('Upload/do_upload');?>

<div class="upload-container">

  <div class="row">
    <div class="col-sm-3">   <a href ="<?php echo base_url(); ?>user/profile"> Back to Profile </a> </div>
    <div class="col-sm-6 text-center">
      <input class="upload-project" type="text" name="projtitle" placeholder="Title of the project/study" required>
      <br />
      <br />
      <input class="upload-file" type="file" name="userfile" size="20"  required>
      <br />
      <br />
<!-- palagyan ng style kasi di pa to responsive -->
      <textarea name="abstract" cols="50" rows="5" placeholder="Tell us something about the project"></textarea>
      <br />
      <br />
        <div class="upload-dropdown"><?php
        echo 'Course: ';
        $courselist = array();
        foreach ($getC as $course) {
          $courselist[$course['course_id']] = $course['abbrev']  ;
        }

        echo form_dropdown('course', $courselist); ?>
    <?php
      echo 'Year: ';
      $yearlist = array(
        '2018' => '2018', '2017' => '2017',
        '2016' => '2016', '2015' => '2015',
        '2014' => '2014', '2013' => '2013',
        '2012' => '2012', '2011' => '2011',
        '2010' => '2010', '2009' => '2009',
        '2008' => '2008', '2007' => '2007',
        '2006' => '2006', '2005' => '2005',
        '2004' => '2004', '2003' => '2003',
        '2002' => '2002', '2001' => '2001',
        '2000' => '2000', '1999' => '1999',
        '1998' => '1998', '1997' => '1997'
      );
      echo form_dropdown('year', $yearlist); ?>
    </div>
      <br />

      <input class="upload-project" type="text" name="author" placeholder="Author/s (separated by comma if more than 1)" required>

      <br />
      <br />

      <div class="upload-dropdown"><?php
      echo 'Adviser ';
      $adviserlist = array();
      foreach ($getA as $adviser) {
        $adviserlist[$adviser['adv_id']] = $adviser['professor']  ;
      }

      echo form_dropdown('adviser', $adviserlist); ?>
    </div>
    <br/>
      <input class="btn btn-primary upload-button" type="submit" value="Upload" />
    </div>
    <div class="col-sm-3"></div>


  </div>
</div>


<?php echo form_close(); ?>
