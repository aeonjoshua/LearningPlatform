<?php
  class View_projects extends CI_Controller
  {
    public function index()
    {
      $page['title'] = "Projects";
      $this->load->model('learning_model');

      $data['files'] = $this->learning_model->showdata();


      $this->load->view('template/header', $page);
      $this->load->view('functions/projects', $data);
      $this->load->view('template/footer');
    }
  }

?>
