<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model');
	} 
	 
	public function get_basic($profile_id = FALSE)
	{
	//	$data['profile_data'] = $this->profile_model->get_profile($profile_id); 
		if($profile_id === FALSE)
		{
			$data['profile_data']=$this->_no_data();
		}
		else
		{
		$data['profile_data'] = $this->profile_model->get_profile($profile_id); 
		
		/* 
		
		// additional optional object code commented for future reference
		
		$array_basic=$this->profile_model->get_profile($profile_id);
		$addn=$this->profile_model->get_profile_addn($profile_id);
		if(!empty($addn))
		{
			$array_basic['optional']=$addn;
		}
		$data['profile_data']=$array_basic;
		
		*/

	//	$data['profile_data'] = $this->profile_model->get_profile_news($profile_id);
		
		if (empty($data['profile_data']))
		{
			//show_404();
			$data['profile_data']=$this->_no_data();
		}
		}
	
		$data['title']='Get basic';
		$this->load->view('profile/get_details',$data);
	}
	
	public function get_news($profile_id  = FALSE)
	{
	//	$data['profile_data'] = $this->profile_model->get_profile($profile_id);

		if($profile_id === FALSE)
		{
			$data['profile_data']=$this->_no_data();
		}
		else
		{
		$data['profile_data'] = $this->profile_model->get_profile_news($profile_id);
		
		if (empty($data['profile_data']))
		{
			//show_404();
			$data['profile_data']=$this->_no_data();
		}
		}
		
		$data['profile_data']=array("latest_news"=>$data['profile_data']); // creating key name for the array output
		
		$data['title']='Get news';
		$this->load->view('profile/get_details',$data);
	}
	
	public function get_pics($profile_id  = FALSE)
	{
	//	$data['profile_data'] = $this->profile_model->get_profile($profile_id);

		if($profile_id === FALSE)
		{
			$data['profile_data']=$this->_no_data();
		}
		else
		{
		$data['profile_data'] = $this->profile_model->get_profile_pics($profile_id);
		
		if (empty($data['profile_data']))
		{
			//show_404();
			$data['profile_data']=$this->_no_data();
		}
		}
		
		$data['profile_data']=array("gallery"=>$data['profile_data']); // creating key name for the array output
		
		$data['title']='Get pics';
		$this->load->view('profile/get_details',$data);
	}
	
	private function _no_data()
	{
		return array("data"=>"false");
	}
}

