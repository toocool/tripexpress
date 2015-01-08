<?php
Class Stats extends CI_Model
{
	function total_seats($from, $to)
	{
		$this->db->select('SUM(booked_seats) as total_seats');
		$this->db->from('bookings');
		$this->db->where('created_time >=', $from);
		$this->db->where('created_time <=', $to);
		$query = $this->db->get();
	 	if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   if(!empty($row->total_seats))  return $row->total_seats;
		   else return '0';
		}
	}

	function total_tickets($from, $to)
	{
		$this->db->select('COUNT(booking_id) as total_tickets');
		$this->db->from('bookings');
		$this->db->where('created_time >=', $from);
		$this->db->where('created_time <=', $to);
		$query = $this->db->get();
	 	if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   if(!empty($row->total_tickets))  return $row->total_tickets;
		   else return '0';
		}
	}

	function total_income_one_way($from, $to)
	{
		$this->db->select('SUM(tours.start_price) as price');
		$this->db->from('bookings');
		$this->db->join('tours', 'bookings.tour_id = tours.tour_id');
		$this->db->where('bookings.created_time >=', $from);
		$this->db->where('bookings.created_time <=', $to);
		$query = $this->db->get();
	 	if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   if(!empty($row->price))  return $row->price;
		   else return '0.00';
		}
	}

	function total_income_round_trip($from, $to)
	{
		$this->db->select('SUM(tours.start_price) as price');
		$this->db->from('bookings');
		$this->db->join('tours', 'bookings.tour_back_id = tours.tour_id');
		$this->db->where('bookings.created_time >=', $from);
		$this->db->where('bookings.created_time <=', $to);
		$query = $this->db->get();
	 	if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   if(!empty($row->price))  return $row->price;
		   else return '0.00';
		}
	}
	
		
}
?>
