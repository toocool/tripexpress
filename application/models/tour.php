<?php
Class Tour extends CI_Model
{
	
	function show_tours()
	{
		$this->db->order_by('tour_id','desc');
		$query = $this->db->get('tours');
	 	
	 	return $query->result();

	}
	function get_tours($id)
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
		
		$this->db->where('destination_id', $id);
		$this->db->update('destinations', $data);
	}
	function create_tour($data)
	{
		$add_destination = $this->db->insert_string('destinations', $data);
		$this->db->query($add_destination);
	}
	function delete_tour($id)
	{
		$this->db->where('destination_id', $id);
     	$this->db->delete('destinations');
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
