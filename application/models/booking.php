<?php
Class Booking extends CI_Model
{
	
	function show_bookings()
	{
		//$this->db->order_by('booking_id','desc');
		$this->db->from('bookings', 'tours');
	 	$this->db->join('tours', 'tours.tour_id = bookings.tour_id');
	 	$query = $this->db->get();
	 	return $query->result();

	}
    function get_city_name($id){
		$this->db->select('city');
		$this->db->where('destination_id', $id);
		$query = $this->db->get('destinations');
		if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   return $row->city;
		}

	}
	function check_available_tours($from, $to){
	$data = array();
	$query = $this->db->query("SELECT from_start_time,start_price FROM tours WHERE (`from` = '$from' AND `to` ='$to') AND `from_start_time` >= CURDATE()");
		if ($query->num_rows() > 0) {
			foreach($query->result() as $row) {
    			$data[$row->from_start_time] = $row->start_price;
    		}
		}
		return $json = json_encode($data);
	}
	function check_available_tours_back($back, $selected_departure){
	$data = array();
	$query = $this->db->query("SELECT from_start_time,start_price FROM tours WHERE `from` = '$back' AND `from_start_time` >= '$selected_departure'");
		if ($query->num_rows() > 0) {
			foreach($query->result() as $row) {
	    		$data[$row->from_start_time] = $row->start_price;
	    	}
		}
		return $json = json_encode($data);
	}
	function get_booking($id)
	{
		$this->db->where('tour_id', $id);
		$query = $this->db->get('tours');
		if($query->num_rows() > 0)
		{
			$row = $query->row();
		}

	 	return $row;
	}
	function save_booking($data, $id)
	{
		
		$data['from_start_time'] = date('Y-m-d', strtotime(element('from_start_date', $data))). ' ' .strtotime(element('from_start_time', $data));
		//$data['from_start_time'] = '2014-10-17 14:16';
		$data['return_start_time']  = date('Y-m-d', strtotime(element('return_start_date', $data))). ' ' .element('return_start_time', $data);
		$crop_data = elements(array('from','to','available_seats','start_price','return_price','from_start_time','return_start_time'), $data);
		$this->db->where('tour_id', $id);
		$this->db->update('tours', $crop_data);
		
	}
	function create_booking($data)
	{
		$data['from_start_time'] = date('Y-m-d', strtotime(element('from_start_date', $data))). ' ' .element('from_start_time', $data);
		$data['return_start_time']  = date('Y-m-d', strtotime(element('return_start_date', $data))). ' ' .element('return_start_time', $data);
		$crop_data = elements(array('from','to','available_seats','start_price','return_price','from_start_time','return_start_time'), $data);
		$add_tour = $this->db->insert_string('tours', $crop_data);
		$this->db->query($add_tour);
	}
	function delete_booking($id)
	{
		$this->db->where('tour_id', $id);
     	$this->db->delete('tours');
	}
	
	function list_cities(){
		$query = $this->db->get('destinations');
		if ($query->num_rows() > 0)
		{
		   return $query->result(); 
		}
	}
}
?>
