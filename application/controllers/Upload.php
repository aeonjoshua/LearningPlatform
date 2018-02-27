<?php
  class Upload extends CI_Controller
  {
    public function __construct() {
          parent::__construct();

          if ($_SESSION['user_logged'] == FALSE) {
          $this->session->set_flashdata("error","Please login first.");
          redirect("");

        }
    }


    public function index()
    {
      $this->load->model('Learning_model');
      $this->load->helper('form');
      $data['getC'] = $this->Learning_model->getcourses();
      $data['getA'] = $this->Learning_model->getadvisers();

      $title['mypage']="LEARNING SYSTEM";
      $this->load->view('template/header', $title);
      $this->load->view('functions/upload', $data);
      $this->load->view('template/footer');
    }

    public function do_upload()
    {
      // include './uploads/pdf2html/converter.php';
      $page['mypage'] = "Upload";
      $this->load->model('learning_model');

      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'pdf';
      $config['max_size'] = 0;

      $this->load->library('upload', $config);

      $projtitle = $this->input->post('projtitle');
      $course = $this->input->post('course');
      $adviser = $this->input->post('adviser');
      $abstract = $this->input->post('abstract');
      $year = $this->input->post('year');
      $author = $this->input->post('author');

//check kung pdf ba yung file, balik sa upload page kapag hindi
      if(!$this->upload->do_upload())
      {
          $error = array('error' => $this->upload->display_errors());

          $this->load->view('template/header', $page);
          $this->load->view('functions/upload', $error);
          $this->load->view('template/footer');
          //redirect('upload', 'refresh');
      }

      else
      {
          $upload_data = $this->upload->data();
        /*
           Array(
                 [file_name]    => mypic.jpg
                 [file_type]    => image/jpeg
                 [file_path]    => /path/to/your/upload/
                 [full_path]    => /path/to/your/upload/jpg.jpg
                 [raw_name]     => mypic
                 [orig_name]    => mypic.jpg
                 [client_name]  => mypic.jpg
                 [file_ext]     => .jpg
                 [file_size]    => 22.2
                 [is_image]     => 1
                 [image_width]  => 800
                 [image_height] => 600
                 [image_type]   => jpeg
                 [image_size_str] => width="800" height="200"
          )
        */

//kukunin yung title at path ng file tapos insert sa db
        // exec("".echo base_url('/uploads/pdf2html/pdf2htmlex.exe')."--dest-dir".echo base_url('/uploads/pdf2html/output').$upload_data['file_name']."");
        // convertNow($upload_data['file_name']);
        $fp=fopen('./application/uploaded/pdf2html/Converter.php','w');
        $f = $upload_data['file_name'];
        fwrite($fp, '<?php
        exec("pdf2htmlex.exe --dest-dir output uploads/'.$f.'");?>');
        fclose($fp);

//binago muna pang debug
        $newpath = end((explode("ci/", $upload_data['full_path'])));
        // ($title, $course_id, $abtract, $year, $author, $adv_id, $file_name, $path)
        $this->learning_model->insert_data($projtitle, $course, $abstract, $year, $author, $adviser, $upload_data['raw_name'], $newpath);

        $data = array('upload_data' => $this->upload->data());

        $this->load->view('template/header', $page);
        $this->load->view('functions/uploadsuccess', $upload_data);
        $this->load->view('template/footer');
      }

    }
  }
?>
