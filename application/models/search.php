<?php
Class Search extends CI_Model
{
	public $from_place;
	public $to_place;
	public $from_date;
	public $returning_date;
	public $returning;

	public function find()
	{
		$data = array();
		$query = $this->db->query("SELECT tour_id, from_start_time,start_price FROM tours 
			WHERE (`from` = '$this->from' AND `to` ='$this->$to')");
		
		if(isset($this->from_date))
		{
			$query->where("AND from_start_time >= '$this->from_date");	
			
			if($returning == 1)
				$query->where("AND from_start_time >= '$this->returning_date");
		}
		
		
		
		
		if ($query->num_rows() > 0) {
			foreach($query->result() as $row) {
    			$data[$row->tour_id] = $row->from_start_time.'|'.$row->start_price;
    		}
		}
		return $data;
		//return $json = json_encode($data);
	}

	static function search_form(){
		$CI = get_instance();
		$data['cities'] = 'No cities to select';

		$query = $CI->db->get('destinations');
		if ($query->num_rows() > 0)
		{
		   $data['cities'] =  $query->result(); 
		}
		
		return $CI->load->view('search_form', $data, true);
	}

}