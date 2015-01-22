<?php
Class Setting extends CI_Model
{
	
	function show_settings()
	{
		$query = $this->db->get('settings');
		if($query->num_rows() > 0)
		{
			$row = $query->row();
		}

	 	return $row;
	}
	function list_currencies(){
		$query = $this->db->get('currency');
		if ($query->num_rows() > 0)
		{
		   return $query->result(); 
		}
	}
	function save_settings($data)
	{
		
		$this->db->update('settings', $data);
	}



}
?>
