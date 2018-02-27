<?php
  class Show_project extends CI_Controller
  {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('learning_model');
      if ($_SESSION['user_logged'] == FALSE)
        {
          $this->session->set_flashdata("error","Please login first.");
          redirect("learning");
        }
    }

    public function index()
    {
        $title['mypage'] = "Project";
        $id = $_GET['id'];
        $data['showproj'] = $this->learning_model->get_project($id);
        $this->load->view('template/header', $title);
  			$this->load->view('functions/showproject', $data);
        $this->load->view('functions/shell');
  			$this->load->view('template/footer');
    }
  }
?>
