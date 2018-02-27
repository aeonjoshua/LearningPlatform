<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_control extends CI_Controller
{
  public function index()
  {
      $text = $this->input->post('postres');
      $_SESSION['resmgr'][] = $text;
      echo $text;
  }
  public function title()
  {
      $title = $this->input->post('posttitle');
      $_SESSION['outlineTitle'] = $title;

      echo $title;
  }
}
?>
