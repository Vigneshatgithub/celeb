<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model');
	} 
	 
	public function get_basic($profile_id = FALSE)
	{
		$data['profile_data'] = $this->profile_model->get_profile($profile_id);

	//	$data['profile_data'] = $this->profile_model->get_profile_news($profile_id);
		
		if (empty($data['profile_data']))
		{
			//show_404();
			$data['profile_data']=array("data"=>"false");
		}
	
		$data['title']='Get basic';
		$this->load->view('profile/get_details',$data);
	}
	
	public function get_news($profile_id  = FALSE)
	{
	//	$data['profile_data'] = $this->profile_model->get_profile($profile_id);

		$data['profile_data'] = $this->profile_model->get_profile_news($profile_id);
		
		if (empty($data['profile_data']))
		{
			//show_404();
			$data['profile_data']=array("data"=>"false");
		}
	
		$data['title']='Get news';
		$this->load->view('profile/get_details',$data);
	}
	
	public function get_pics($profile_id  = FALSE)
	{
	//	$data['profile_data'] = $this->profile_model->get_profile($profile_id);

		$data['profile_data'] = $this->profile_model->get_profile_pics($profile_id);
		
		if (empty($data['profile_data']))
		{
			//show_404();
			$data['profile_data']=array("data"=>"false");
		}
	
		$data['title']='Get pics';
		$this->load->view('profile/get_details',$data);
	}
}

