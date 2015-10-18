<?php
Class Search extends CI_Model
{
	public $from_place;
	public $to_place;
	public $from_date;
	public $returning_date;
	public $returning;
	

	/*
	* 
	* Static function which find tour by id
	* Return: whole tour data
	*/
	static function find($inputs = [])
	{
		$CI = get_instance();
		if(empty($inputs) ){
			header("Location: add_ticket");
		}

		$tour_id = $inputs['tour_id'];
		!empty($inputs['tour_back_id']) ? $tour_back_id = $inputs['tour_back_id'] : $tour_back_id = FALSE;

		$query = $CI->db->query("SELECT tour_id, from_start_time,start_price 
									FROM tours 
									WHERE tour_id = '$tour_id'");

		if ($query->num_rows() > 0) {
			foreach($query->result() as $row) {
    			$data['one_way'] = ['start_time' => date('d.m.Y', strtotime($row->from_start_time)), 'start_price' => $row->start_price];
    		}
		}

		//if it is return ticket
		if($tour_back_id){
			$query = $CI->db->query("SELECT tour_id, from_start_time,start_price 
									FROM tours 
									WHERE tour_id = '$tour_back_id'");
			if ($query->num_rows() > 0) {
				foreach($query->result() as $row) {
    				$data['returning'] = ['start_time' => date('d.m.Y', strtotime($row->from_start_time)), 'start_price' => $row->start_price];
    			}
			}
		}

		return $data;

	}

	/*
	* 
	* Static function which loads the search view
	* Return: the Search view
	*/
	static function search_form()
	{
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