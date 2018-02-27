<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Learning extends CI_Controller {



	public function __construct(){
	parent:: __construct();

		$this->load->model('Learning_model','add');
	}


		public function register()
		{
				if($_SERVER['REQUEST_METHOD']=='POST'){

					$this->form_validation->set_rules('username', 'Username', 'required') ;
					$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users_tbl.email]', array('required'=>'You must provide a valid email address'));
					$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
					$this->form_validation->set_rules('password2', 'Confirm Password', 'required|min_length[4]|matches[password]');

					//hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
					if ($this->form_validation->run()== TRUE){
						echo 'Form Validated';
						// $this->input->set_userdata($user);
						$user = array ('username'=>$_POST['username'], 'email'=>$_POST['email'], 'password'=>$_POST['password']);
						$this->db->insert('users_tbl' ,$user);
						$this->session->set_flashdata("Success","Your account has been Registered.");
						redirect("Learning/register", "refresh");
					}


		}
		$title['mypage']="Learning Resource Platform";
		$this->load->view('template/header',$title);
		$this->load->view('Learning/register');
		$this->load->view('template/footer');

	}

	public function logout()


	{
		unset($_SESSION);
		session_destroy();
		$this->session->set_flashdata("Error", "Successfully Logged Out.");
		redirect ("","refresh");

	}


	public function index()

	{

			$this->form_validation->set_rules('username', 'Username', 'required',array('required'=>'You must provide a valid username'));
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]',array('required'=>'You must provide a valid password'));


			if ($this->form_validation->run()== TRUE){

				$username = $_POST['username'];
				$password = $_POST['password'];

				$this->db->select("*");
				$this->db->from("users_tbl");
				$this->db->where(array('username'=>$username, 'password'=> $password ));
				$query = $this->db->get();
				$num = $query->num_rows();
				$user =$query->row();
				if ($num>0){

		//		 if(password_verify($password, $_SESSION['data'])) {

					$_SESSION['user_logged']=TRUE;
					$_SESSION['username'] = $user->username;
					$this->session->set_flashdata("Success", "You are now logged in");
					redirect('user/profile','refresh');


//				}
			}
				 else {
					$this->session->set_flashdata("Error", "No such user exist in database");
					redirect("");
				}
			}

			$title['mypage']="Learning Resource Platform";
			$this->load->view('template/header',$title);
			$this->load->view('Learning/login');
			$this->load->view('template/footer');

	}



	public function browse()

	{

		$this->load->library('pagination');
		$this->load->model('Learning_model');
		$this->load->helper('url');
		$config = array();
		$config ['base_url'] = base_url().'Learning/browse';
		$config ['total_rows'] = $this->Learning_model->count_actor();
		$config['per_page'] = 100;
		$config['num_links'] = 3;
		$data['actor'] = $this->Learning_model->showdata($config['per_page'],$this->uri->segment(3));
		$data['links'] = $this->pagination->create_links();


		$title['mypage']="Learning Resource Platform";
		$this->load->view('template/header1',$title);
		//$this->load->view('functions/shell');
		$this->load->view('Learning/browse',$data);
		$this->load->view('template/footer');

	}

	  public function search_title(){
			//$this->load->view('functions/shell');
			$this->load->model('Learning_model');
			$title['mypage']="Learning Resource Platform";
			$this->load->view('template/header1',$title);
			$title = $this->input->post('search');
			$this->load->view('Learning/search_title');
			$this->load->view('template/footer');

		}
}
