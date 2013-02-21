<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	
	public function get_profile($profile_id)
	{
		$query = $this->db->get_where('person_master', array('person_id' => $profile_id));
		return $query->row_array();
	}
	
	public function get_profile_news($profile_id)
	{
		$query = $this->db->get_where('latest_news', array('person_id' => $profile_id));
		return $query->result();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */