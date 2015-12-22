<?php
Class User extends CI_Model
{
	function validate()
	{
	   $this->db->where('username', $this->input->post('username'));
	   $this->db->where('password', MD5($this->input->post('password')));
	   $this->db->where('blocked', "0");
	  // $this -> db -> limit(1);

	   $query = $this->db->get('users');

	   if($query->num_rows != 0)
	   {
	     return true;
	   }

	 }
	function show_users($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->where('id !=', 1);
	 	$query = $this->db->get('users');
	 	return $query->result();
	}
	function get_user($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		if($query->num_rows() > 0)
		{
			$row = $query->row();
		}

	 	return $row;
	}
	function save_user($data, $id)
	{

		if (empty($data['password'])) {
			$crop_data = elements(array('firstname','lastname','username','role','email'), $data);
		} else {
			$crop_data = elements(array('firstname','lastname','username','password','role','email'), $data);
		}

		$this->db->where('id', $id);
		$this->db->update('users', $crop_data);
	}
	function create_user($data)
	{
		$crop_data = elements(array('firstname','lastname','username','password','role','email'), $data);
		$add_user = $this->db->insert_string('users', $crop_data);
		$this->db->query($add_user);
	}
	function delete_member($id)
	{
		$this->db->where('id', $id);
     	$this->db->delete('users');
	}
	function block_member($id)
	{
		$this->db->set('blocked', "1");
		$this->db->where('id', $id);
     	$this->db->update('users');
	}
	function unblock_member($id)
	{
		$this->db->set('blocked', "0");
		$this->db->where('id', $id);
     	$this->db->update('users');
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
	function member_id($username){
		$this->db->select('id');
		$this->db->where('username',$username);
		$query = $this->db->get('users');

		if ($query->num_rows() > 0)
		{
		   $row = $query->row();
		   return $row->id;
		}
	}
	function member_language($username){
		$this->db->select('language');
		$this->db->where('username',$username);
		$query = $this->db->get('users');

		if ($query->num_rows() > 0)
		{
		   $row = $query->row();
		   return $row->language;
		}
	}
}
?>
