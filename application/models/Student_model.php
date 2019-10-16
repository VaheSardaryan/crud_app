<?php
class Student_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}
	public function student_list()
	{
		$query = $this->db->get('student');
		return $query->result();
	}
	public function get_student_by_id($id)
	{
		$query = $this->db->get_where('student', array('id'=>$id));
		return $query->row();
	}
	public function createOrUpdate()
	{
		$this->load->helper('url');
		$id = $this->input->post('id');
		$data = array(
			'title' => $this->input->post('title'),
			'descripton' => $this->input->post('descripton'),
		);
		if(empty($id)){
			return $this->db->insert('student',$data);
		}else{
			$this->db->where('id',$id);
			return $this->db->update('student',$data);
		}
	}
	public function delete($id)
	{
		$this->db->where('id',$id);
		return $this->db->delete('student');
	}
}
