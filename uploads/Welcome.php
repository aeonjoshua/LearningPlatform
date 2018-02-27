<?php 
defined('BASEPATH') OR exit('No direct script access allowed');  

class Welcome extends CI_Controller {  

	 public function __construct()
	{
		parent::__construct();
		$this->load->model('queries');
		header('Cache-Control: no cache');
	}
	public function index() 
	{
		$this->load->model('queries');
		$posts = $this->queries->getPosts();
		$this->load->view('home_view', ['posts'=>$posts]);
	}

	public function links() 
	{
		
		$this->load->view('links');
	}
	public function linksflight() 
	{
		
		$this->load->view('linksflight');
	}
	public function linksship() 
	{
		
		$this->load->view('linksship');
	}
	


	
	function search(){
		
		$function_name =$this->input->post('search_val');

			$data['search_results'] = $this->queries->getSearchResults($function_name);

			$this->load->view('menubarsearch_result',$data);
			
		 
		
		}

	function search_budget(){
		
		$function_budget = $this->input->post('function_budget');
		if($function_budget==NULL)
		{
			?>
			<script>
			window.alert('Please enter a correct value');
			</script><?php 

			$this->load->view('home_view');
			
		}
		else{
			
			$data['search_results_budget'] = $this->queries->getSearchResults_budget($function_budget);
			
			$this->load->view('budget_result',$data);
			
		}
	}

	function single() 
		{
			$title=str_replace('%20', ' ',$this->uri->segment(3));
			//$data['display']=$this->queries->getComment();
			$data['result']=$this->queries->getResult($title);
			$this->load->view('item_view',$data);
		}

	

	

	//starts of map

	 function mapview()
	{

		$this->load->view('mapview');
		
	}	


	//comment
	public function comment(){
		

	
				$this->form_validation->set_rules('sname', 'Name', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required'); 
                $this->form_validation->set_rules('phone', 'Phone', 'required');
                $this->form_validation->set_rules('message', 'Message', 'required');
               
                if ($this->form_validation->run())
                {
                       $data = $this->input->post();
                       unset($data['submit']);
                       $this->load->model('queries');
                       if($this->queries->addComment($data)){
                       		$this->session->set_flashdata('msg','Content Saved Successfully');	
                       }else{
                       		$this->session->set_flashdata('msg','Failed To Save Content!');
                       }
                       return redirect('Welcome/index'); 
                }
                else
                {
                        $this->load->view('index'); 
                }
        
	}

		function comments()
	{

		$this->load->model('queries');
		$posts = $this->queries->getComments();
		$this->load->view('comments', ['posts'=>$posts]);
	}



	//admin

	 function create(){
		$this->load->model('queries');
		$this->load->view('create');  
	}

	 function save(){
		$this->load->model('queries');
		$url = $this->do_upload();
		$url1 = $this->do_upload1();
		$url2 = $this->do_upload2();
		$name = $_POST["name"];
		$budget = $_POST["budget"];
		$location = $_POST["location"];
		$description = $_POST["description"];
		$itinerary = $_POST["itinerary"];
		
		$imgname = $_POST["imgname"];
		$imgname = $_POST["imgname1"];
		$imgname = $_POST["imgname2"];
		
		$contact = $_POST["contact"];
		$tips = $_POST["tips"];
		$this->queries->save($name, $url, $url1, $url2, $budget, $location, $description, $itinerary, $contact, $tips);
		redirect("Welcome/dashboard","refresh");
		  
		
	}

	public function change($id){
	

		
				$this->form_validation->set_rules('name', 'Name', 'required');
				/*$this->form_validation->set_rules('image', 'Name', 'required'); */
                $this->form_validation->set_rules('budget', 'Budget', 'required');
                $this->form_validation->set_rules('location', 'Location', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');
                $this->form_validation->set_rules('itinerary', 'Itinerary', 'required');
                
                if ($this->form_validation->run())
                {
                       $data = $this->input->post();
                       unset($data['submit']);
                       $this->load->model('queries');
                       if($this->queries->updatePosts($data,$id)){
                       		$this->session->set_flashdata('msg','Content Updated Successfully');	 
                       }else{
                       		$this->session->set_flashdata('msg','Ey');
                       }
                       return redirect('Welcome/dashboard'); 
                }
                else
                {
                        $this->load->view('create'); 
                }
              

	}

	 function do_upload() {

		$imgname = $_POST["imgname"];
		$type = explode('.',$_FILES["image"]["name"] );
		$type = $type[count($type)-1];
		$url = "./assets/cimages/".$imgname.'.'.$type;
		
		if(in_array($type, array("jpg","jpeg","gif","png")))

		if(is_uploaded_file($_FILES["image"]["tmp_name"]))
			if(move_uploaded_file($_FILES["image"]["tmp_name"],$url))
				
				return $url;
			return "";

	}

	function do_upload1() {

		$imgname1 = $_POST["imgname1"];
		$type = explode('.',$_FILES["image1"]["name"] );
		$type = $type[count($type)-1];
		$url1 = "./assets/cimages/".$imgname1.'.'.$type;
		
		if(in_array($type, array("jpg","jpeg","gif","png")))

		if(is_uploaded_file($_FILES["image1"]["tmp_name"]))
			if(move_uploaded_file($_FILES["image1"]["tmp_name"],$url1))
				
				return $url1;
			return "";

	}

	function do_upload2() {

		$imgname2 = $_POST["imgname2"];
		$type = explode('.',$_FILES["image2"]["name"] );
		$type = $type[count($type)-1];
		$url2 = "./assets/cimages/".$imgname2.'.'.$type;
		
		if(in_array($type, array("jpg","jpeg","gif","png")))

		if(is_uploaded_file($_FILES["image2"]["tmp_name"]))
			if(move_uploaded_file($_FILES["image2"]["tmp_name"],$url2))
				
				return $url2;
			return "";

	}

		public function dashboard()
	{

		$this->load->model('queries'); 
		$posts = $this->queries->getPosts();
		$this->load->view('dashboard', ['posts'=>$posts]);
	}

	

	public function delete($id){
		$this->load->model('queries');
		if($post = $this->queries->deletePosts($id)){
			$this->session->set_flashdata('msg','Content Deleted Successfully');
		}else{
			$this->session->set_flashdata('msg','Error in Deleting ');
		}
		return redirect('Welcome/dashboard'); 
	}

	public function view($id){
		$this->load->model('queries');
		$post = $this->queries->getSinglePosts($id);
		$this->load->view('view', ['post'=>$post]); 
	}
public function directionswithdesti($id){
		$this->load->model('queries');
		$post = $this->queries->getSinglePosts($id);
		$this->load->view('directionswithdesti', ['post'=>$post]); 
	}
	public function directions(){
		$this->load->view('directions');
	}
public function map(){
		redirect('map');
	}		
	public function update($id){
		$this->load->model('queries');
		$post = $this->queries->getSinglePosts($id);
		$this->load->view('update', ['post'=>$post]); 
	}
	








		
}
