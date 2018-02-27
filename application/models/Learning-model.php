<?php
class Learning_model extends CI_Model {
	

	private $table = "users";
	public function add($data){

		$this->db->insert($this->table,$data);



	}
	public function read() {

		$this->db->from('profile');
		
		$query = $this->db->get();
		 	
		return $query->result_array();
	}
	
	public function deleteuser($user){
		$this->db->where('userID',$user);
		$this->db->delete($this->table);
		redirect('Admin_control');
	}
}
?>