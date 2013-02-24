<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	
	public function get_profile($profile_id)
	{
	//	$this->db->select('person_name, DOB, native, mother_tongue, short_bio, no_of_movies, industry, awards, occupation, optional');		
		$query = $this->db->get_where('person_master', array('person_id' => $profile_id));
		return $query->row_array();
	}
	
	/*
	
	// additional optional data code commented for future reference
	
	public function get_profile_addn($profile_id)
	{
		$this->db->select('data_type,data_content');		
		$query = $this->db->get_where('additional_data', array('person_id' => $profile_id));
		
		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $row)
			{
					$bdata[$row["data_type"]]=$row["data_content"];
			}
		}
		else
		{
			$bdata=array();
		}
		
		return $bdata;
	}
	
	*/
	public function get_profile_news($profile_id)
	{
	//	$this->db->select('news, news_link');
		$this->db->order_by("created_dt", "desc");
		$query = $this->db->get_where('latest_news', array('person_id' => $profile_id));
		return $query->result();
	}
	
	public function get_profile_pics($profile_id)
	{
	//	$this->db->select('pic_link');
		$this->db->order_by("created_dt", "desc");
		$query = $this->db->get_where('pics_link', array('person_id' => $profile_id));
		return $query->result();
	}
	
}

