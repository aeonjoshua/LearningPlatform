<?php
class Learning_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}


	public function getcourses()
	{
		$query = $this->db->get('courses_tbl');
		return $query->result_array();
	}

	public function getadvisers()
	{
		$query = $this->db->get('advisers_tbl');
		return $query->result_array();
	}

	public function insert_data($title, $course_id, $abstract, $year, $author, $adv_id, $file_name, $path)
	{
		$data = array(
								'title' => $title,
								'course_id'  => $course_id,
								'abstract' => $abstract,
								'year' => $year,
								'author' => $author,
								'adv_id' => $adv_id,
								'file_name' => $file_name,
								'path' => $path
								);

		$this->db->insert('projects_tbl', $data);

		return $this->db->insert_id();
	}

	public function get_project($id)
	{
		$this->db->join('advisers_tbl', 'advisers_tbl.adv_id = projects_tbl.adv_id');
		$this->db->join('courses_tbl','courses_tbl.course_id = projects_tbl.course_id');
    $query = $this->db->get_where('projects_tbl', array('proj_id' => $id));
    $result = $query->result_array();

		// $this->db->select('*');
		// $this->db->from('projects_tbl');
		// $this->db->where('proj_id', $id);
		// $this->db->join('courses_tbl', 'courses_tbl.course_id = projects_tbl.course_id');
		// $result = $this->db->get();

		return $result;
	}

	private $table = "users";
	public function add($data){

		$this->db->insert('users',$data);



	}
	public function read($condition=null) {
	if(isset($condition))
		{
		$this->db->like('fname',$condition);
		}

		$query = $this->db->get($this->table);


		return $query->result_array();
}
	public function deleteuser($user){
		$this->db->where('fname',$user);
		$this->db->delete($this->table);

	}

	public function gettitle(){

		$this->db->where('fname',$user);
		$this->db->delete($this->table);

	}

	public function count_actor(){

		return $this->db->count_all('projects_tbl');

	}

	public function showdata($limit,$offset)
	{
		$this->db->join('courses_tbl', 'courses_tbl.course_id = projects_tbl.course_id');
		$this->db->join('advisers_tbl', 'advisers_tbl.adv_id = projects_tbl.adv_id');
		$this->db->limit($limit,$offset);
		$query = $this->db->get('projects_tbl');
		if ($query->num_rows() > 0) {
		return $query -> result();
		} else {
		return $query-> result();
		}
	}

	public function fetch_actor($limit,$offset){


		$this->db->limit($limit,$offset);
		$query = $this->db->get('projects_tbl');
			if ($query->num_rows() > 0) {
			return $query -> result();
		} else {
			return $query-> result();
		}
	}


	public function search_title($part){

    $this->db->join('courses_tbl', 'courses_tbl.course_id = projects_tbl.course_id');
    $this->db->join('advisers_tbl', 'advisers_tbl.adv_id = projects_tbl.adv_id');
    $this->db->select("*");
    $this->db->from("projects_tbl");
    $this->db->like("title", $part);
    $query = $this->db->get();

    return $query->result();

}
}

?>
