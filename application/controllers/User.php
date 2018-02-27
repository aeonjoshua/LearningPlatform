<?php


class user extends CI_Controller
{

  public function __construct() {

        parent::__construct();
        $this->load->model('learning_model');
        if ($_SESSION['user_logged'] == FALSE) {
        $this->session->set_flashdata("error","Please login first.");
        redirect("");

      }
  }


  public function profile()
  {

    $data['ms'] = $this->learning_model->showdata();

    $title['mypage']="Learning Resource Platform";
    $this->load->view('template/header1',$title);
    $this->load->view('functions/shell');
    $this->load->view('Learning/profile',$data);
    $this->load->view('template/footer');

  }


}
