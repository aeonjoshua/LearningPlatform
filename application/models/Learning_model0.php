<?php
  class Learning_model extends CI_Model
  {
    public function __construct()
    {
      $this->load->database();
    }

    public function showdata()
    {
      $query = $this->db->get('files');
      return $query->row_array();
    }

    public function insert_data($name, $path_name, $course, $filename)
    {
      $data = array(
                  'title' => $name,
                  'path'  => $path_name,
                  'course' => $course,
                  'filename' => $filename
                 );

      $this->db->insert('files', $data);

      return $this->db->insert_id();
    }

    public function get_projects()
    {
      $pdfs = array();
      $this->db->select("title,course,filename,path,dateuploaded");
      $this->db->from('files');
      $query = $this->db->get();

      /*if ($query->num_rows())
      {
        foreach ($query->result_array() as $row)
        {
          // Your data is coming from multiple rows, so need to loop on it.
          $siteData[$row['name']] = $row['value'];
        }
      }*/

      return $query->result();
    }
  }
?>
