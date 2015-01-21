<?php
Class Booking extends CI_Model
{
	
	function show_bookings($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->order_by('created_time','desc');
		$this->db->from('bookings', 'tours');
	 	$this->db->join('tours', 'tours.tour_id = bookings.tour_id');

	 	$query = $this->db->get();
	 	return $query->result();
	}

	
	function show_booking_date($tour_id){
		$this->db->select('from_start_time');
		$this->db->where('tour_id', $tour_id);

	 	$query = $this->db->get('tours');
	 	if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   return $row->from_start_time;
		}
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
	function get_username($id){
		$this->db->select('username');
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   return $row->username;
		}

	}
	function check_available_tours($from, $to){
	$data = array();
	$query = $this->db->query("SELECT tour_id, from_start_time,start_price FROM tours WHERE (`from` = '$from' AND `to` ='$to') AND `from_start_time` >= CURDATE()");
		if ($query->num_rows() > 0) {
			foreach($query->result() as $row) {
    			$data[$row->tour_id] = $row->from_start_time.'|'.$row->start_price;
    		}
		}
		return $json = json_encode($data);
	}
	function check_available_tours_back($back, $selected_departure){
	$data = array();
	$query = $this->db->query("SELECT tour_id, from_start_time,start_price FROM tours WHERE `from` = '$back' AND `from_start_time` >= '$selected_departure'");
		if ($query->num_rows() > 0) {
			foreach($query->result() as $row) {
	    		$data[$row->tour_id] = $row->from_start_time.'|'.$row->start_price;
	    	}
		}
		return $json = json_encode($data);
	}
	function get_booking($id)
	{
		$this->db->from('bookings', 'tours');
	 	$this->db->join('tours', 'tours.tour_id = bookings.tour_id');

		$this->db->where('booking_id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			$row = $query->row();
		}

	 	return $row;
	}
	function get_booking_returned($id)
	{
		$this->db->from('bookings', 'tours');
	 	$this->db->join('tours', 'tours.tour_id = bookings.tour_back_id');

		$this->db->where('booking_id', $id);
		$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row;
		}
		else{
			return false;
		}

	 	
	}
	function save_booking($data, $id)
	{
		
		$data['tour_id'] = element('choose_from', $data);
		$data['tour_back_id']  = element('choose_back', $data);
		$data['modified_by'] = $this->session->userdata['user_id'];
		$crop_data = elements(array('tour_id','tour_back_id','booked_seats','client_firstname','client_lastname','identification_nr','returning','modified_by'), $data);
		$this->db->where('booking_id', $id);
		$this->db->update('bookings', $crop_data);
		
	}
	function create_booking($data)
	{
		$data['tour_id'] = element('choose_from', $data);
		$data['tour_back_id']  = element('choose_back', $data);
		$data['created_by'] = $this->session->userdata['user_id'];
		$crop_data = elements(array('tour_id','tour_back_id','booked_seats','client_firstname','client_lastname','identification_nr','returning','created_by'), $data);
		$add_booking = $this->db->insert_string('bookings', $crop_data);
		$this->db->query($add_booking);
	}
	function delete_booking($id)
	{
		$this->db->where('booking_id', $id);
     	$this->db->delete('bookings');
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
