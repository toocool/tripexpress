<?php
Class Dashboard_stats extends CI_Model
{
	
	function upcoming_tours()
	{
		$this->db->order_by('tour_id','desc');
		$this->db->where('from_start_time > NOW()');
		$query = $this->db->get('tours');
	 	
	 	return $query->result();
	}
	function total_tickets_per_week()
	{
		$this->db->select('booking_id, COUNT(booking_id) as total');
		$this->db->where('created_by', $this->session->userdata['user_id']);
		$this->db->where("created_time <= NOW() AND created_time >= DATE_SUB(NOW(), INTERVAL 7 DAY)");
		$query = $this->db->get('bookings');
	 	
	 	if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   return $row->total;
		}
	}
	function total_tickets_per_month()
	{
		$this->db->select('booking_id, COUNT(booking_id) as total');
		$this->db->where('created_by',$this->session->userdata['user_id']);
		$this->db->where("date_format(`created_time`, '%Y-%m')=date_format(now(), '%Y-%m')");
		$query = $this->db->get('bookings');
	 	
	 	if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   return $row->total;
		}
	}
	function total_tickets()
	{
		$this->db->select('booking_id, COUNT(booking_id) as total');
		$this->db->where('created_by',$this->session->userdata['user_id']);
		$query = $this->db->get('bookings');
	 	
	 	if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   return $row->total;
		}
	}
	function member_role($username){
		$this->db->select('role');
		$this->db->where('username',$username);
		$query = $this->db->get('users');

		if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   return $row->role;
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

	
}
?>
