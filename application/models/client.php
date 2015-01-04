<?php
Class Client extends CI_Model
{
	
	function show_clients($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->select('identification_nr, client_firstname, client_lastname, SUM(booked_seats) as total_seats, COUNT(booking_id) as total_tickets');
		$this->db->from('bookings');
		$this->db->group_by("identification_nr");
		$this->db->order_by("client_firstname", "desc");  
		$query = $this->db->get();
	 	return $query->result();
	}
	function total_clients()
	{
		
		$this->db->select('identification_nr, client_firstname, client_lastname, SUM(booked_seats) as total_seats, COUNT(booking_id) as total_tickets');
		$this->db->from('bookings');
		$this->db->group_by("identification_nr");
		$this->db->order_by("client_firstname", "desc");  
		$query = $this->db->get();
	 	return $query->num_rows();
	}
	function list_tickets($identification_nr){
		$this->db->select("tour_id,tour_back_id,returning,client_firstname,client_lastname,booked_seats");
		$this->db->from("bookings");
		$this->db->where("identification_nr", $identification_nr);
		//$this->db->order_by("", ""); //need to add new attribute to the bookings table called 'created date'
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

	function get_from($id) {
		$this->db->select('from');
		$this->db->where('tour_id', $id);
		$query = $this->db->get('tours');
		if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   return $row->from;
		}

	}
	
	function get_to($id) {
		$this->db->select('to');
		$this->db->where('tour_id', $id);
		$query = $this->db->get('tours');
		if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   return $row->to;
		}

	}
}
?>
