<?php
Class Tour extends CI_Model
{
	
	function show_tours()
	{
		$this->db->order_by('tour_id','desc');
		$query = $this->db->get('tours');
	 	
	 	return $query->result();

	}
	function get_tour($id)
	{
		$this->db->where('tour_id', $id);
		$query = $this->db->get('tours');
		if($query->num_rows() > 0)
		{
			$row = $query->row();
		}

	 	return $row;
	}
	function save_tour($data, $id)
	{
		
		$data['from_start_time'] = date('Y-m-d', strtotime(element('from_start_date', $data))). ' ' .element('from_start_time', $data);
		$data['return_start_time']  = date('Y-m-d', strtotime(element('return_start_date', $data))). ' ' .element('return_start_time', $data);
		$crop_data = elements(array('from','to','available_seats','start_price','return_price','from_start_time','return_start_time'), $data);
		$this->db->where('tour_id', $id);
		$this->db->update('tours', $crop_data);
		//$this->db->query($add_tour);
	}
	function create_tour($data)
	{
		$data['from_start_time'] = date('Y-m-d', strtotime(element('from_start_date', $data))). ' ' .element('from_start_time', $data);
		$data['return_start_time']  = date('Y-m-d', strtotime(element('return_start_date', $data))). ' ' .element('return_start_time', $data);
		$crop_data = elements(array('from','to','available_seats','start_price','return_price','from_start_time','return_start_time'), $data);
		$add_tour = $this->db->insert_string('tours', $crop_data);
		$this->db->query($add_tour);
	}
	function delete_tour($id)
	{
		$this->db->where('tour_id', $id);
     	$this->db->delete('tours');
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
	function list_cities(){
		$query = $this->db->get('destinations');
		if ($query->num_rows() > 0)
		{
		   return $query->result(); 
		}
	}
}
?>
