<?php
class Student extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('student_model');
		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['student']=$this->student_model->student_list();
		$data['title']='Student List';
		$this->load->view('student/list',$data);
	}
	public function create()
	{
		$data['title']= 'Create Student';
		$this->load->view('student/create',$data);
	}
	public function edit($id)
	{
		$id=$this->uri->segment(3);
		$data = array();
		if(empty($id))
		{
			show_404();
		}else{
			$data['student']= $this->student_model->get_student_by_id($id);
			$this->load->view('student/edit',$data);
		}
	}
	public function store()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');

		$id = $this->input->post('id');

		if ($this->form_validation->run() === FALSE)
		{
			if(empty($id)){
				redirect( base_url('student/create') );
			}else{
				redirect( base_url('student/edit/'.$id) );
			}
		}
		else
		{
			$data['student'] = $this->student_model->createOrUpdate();
			redirect( base_url('student') );
		}

	}
	public function delete()
	{
		$id=$this->uri->segment(3);
		if(empty($id))
		{
			show_404();
		}
		$student=$this->student_model->delete($id);
		redirect(base_url('student'));
	}
}
