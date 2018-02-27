<?php
	class queries extends CI_Model
{

		public function __construct()
	{
		parent::__construct();  
	}
	

		function getSearchResults($s_name){
		$this->db->select('id,name,image,image1,image2,budget,location,description,itinerary')
		->like('name',$s_name);
		$query=$this->db->get('tbl_content');
		return $query->result();
		}
		
		function getSearchResults_budget($function_budget){
		$query = $this->db->query
		('SELECT id,name,image,image1,image2,budget,location,description,itinerary  FROM tbl_content WHERE budget <='.$function_budget);
        return $query->result();
    	}

    	function getResult($title)
	{
		$this->db->select('id, name,image, image1, image2, budget,location,description,itinerary,contact,tips');
		$this->db->where('name',$title);
		$query=$this->db->get('tbl_content');
		return $query->result();
	} 

		
	//comment
	public function addComment($data){
			return $this->db->insert('comment',$data);
		}

		public function getComments(){
			$query = $this->db->get('comment');
			if($query->num_rows()>0){
				return $query->result();
			}
		}


	//starts of admin here

	 function getPosts(){
			$query = $this->db->get('tbl_content');
			if($query->num_rows()>0){
				return $query->result();
			}
		}
	 function save($name, $url, $url1, $url2, $budget, $location, $description, $itinerary, $contact, $tips){
			$this->db->set('name', $name);
			$this->db->set('image', $url);
			$this->db->set('image1', $url1);
			$this->db->set('image2', $url2);
			$this->db->set('budget', $budget);
			$this->db->set('location', $location);
			$this->db->set('description', $description);
			$this->db->set('itinerary', $itinerary);
			$this->db->set('contact', $contact);
			$this->db->set('tips', $tips);
			$this->db->insert('tbl_content');
		}
	 function deletePosts($id){
			return $this->db->delete('tbl_content',['id'=>$id]);

		}
		
	 function getSinglePosts($id){
			$query = $this->db->get_where('tbl_content',array('id'=>$id));
			if($query->num_rows()>0){
				return $query->row(); 
			}
		}

	public function updatePosts($data, $id){
			return $this->db->where('id', $id)->update('tbl_content', $data);
		}		




}
?>