<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class search extends CI_Controller{

    function index(){

     $data["title"] = "Search";
     $this->load->view('template/header', $data);
     $this->load->view('Learning/search_view', $data);
     $this->load->view('template/footer');

      function fetch_user(){
           $this->load->model("Search_model");
           $fetch_data = $this->Search_model->make_datatables();
           $data = array();
           foreach($fetch_data as $row)
           {
                $sub_array = array();
                $sub_array[] = $row->title;
                $sub_array[] = $row->course;
                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs">Update</button>';
                $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs">Delete</button>';
                $data[] = $sub_array;
           }
           $output = array(
                "draw"                    =>     intval($_POST["draw"]),
                "recordsTotal"          =>      $this->Search_Model->get_all_data(),
                "recordsFiltered"     =>     $this->Search_Model->get_filtered_data(),
                "data"                    =>     $data
           );
           echo json_encode($output);
      }

    }

























































}
