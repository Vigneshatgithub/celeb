<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model');
	} 
	 
	public function get($profile_id)
	{
		$data['profile_data'] = $this->profile_model->get_profile($profile_id);

	//	$data['profile_data'] = $this->profile_model->get_profile_news($profile_id);
		
		if (empty($data['profile_data']))
		{
			show_404();
		}
	
		$data['title']='Get';
		$this->load->view('profile/get_details',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */