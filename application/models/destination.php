<?php
Class Destination extends CI_Model
{
	
	function show_destinations()
	{
		$query = $this->db->get('destinations');
	 	return $query->result();
	}
	function get_destination($id)
	{
		$this->db->where('destination_id', $id);
		$query = $this->db->get('destinations');
		if($query->num_rows() > 0)
		{
			$row = $query->row();
		}

	 	return $row;
	}
	function save_destination($data, $id)
	{
		
		$this->db->where('destination_id', $id);
		$this->db->update('destinations', $data);
	}
	function create_destination($data)
	{
		$add_destination = $this->db->insert_string('destinations', $data);
		$this->db->query($add_destination);
	}
	function delete_destination($id)
	{
		$this->db->where('destination_id', $id);
     	$this->db->delete('destinations');
	}
}
?>
