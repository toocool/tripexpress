<?php
Class Booking extends CI_Model
{

	function show_bookings($limit, $start, $user_id = '')
	{
		$this->db->limit($limit, $start);
		$this->db->order_by('created_time','desc');
		$this->db->from('bookings', 'tours');
	 	$this->db->join('tours', 'tours.tour_id = bookings.tour_id');
		if($user_id != '')
			$this->db->where('created_by', $user_id);
	 	$query = $this->db->get();
	 	return $query->result();
	}
	function get_company_info()
	{
		$this->db->from('settings');
	 	$query = $this->db->get();
		if($query->num_rows() > 0)
		{
			$row = $query->row();
			return $row;
		}
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

	function check_available_tours($from, $to, $returning, $depart_date='', $return_date=''){
	$data = array();

	$query_currency = $this->db->query("SELECT symbol,iso FROM currency JOIN settings ON settings.company_currency = currency.currency_id LIMIT 1");
	$currency = $query_currency->row();

	if(isset($depart_date) && !empty($depart_date))
		$start_time = $depart_date;
	else
		$start_time =  date('Y-m-d');

	$query = $this->db->query("SELECT tour_id, from_start_time,start_price FROM tours WHERE (`from` = '$from' AND `to` = '$to') AND `from_start_time` >= '$start_time'");


	if($returning == 'true'){ //false in quotes because php doest read it as boolean
		if(isset($depart_date) && !empty($depart_date))
			$start_time = $depart_date;
		else
			$start_time =  date('Y-m-d');

		$query_back = $this->db->query("SELECT tour_id, from_start_time,start_price FROM tours WHERE (`from` = '$to' AND `to` = '$from') AND `from_start_time` > '$start_time'");
	}

		if ($query->num_rows() > 0) {
			$one_way = [];
			foreach($query->result() as $row) {
    			$data[$row->tour_id] = ['ticket_type' => 'one_way', 'start_time' => date('d.m.Y', strtotime($row->from_start_time)), 'start_price' => $row->start_price, 'currency' =>  $currency->symbol.' ('.$currency->iso.')'];
    		}
		}

		if ($returning == 'true' && $query_back->num_rows() > 0) {
			$returning = [];
			foreach($query_back->result() as $row_back) {
    			$data[$row_back->tour_id] = ['ticket_type' => 'returning', 'start_time' => date('d.m.Y', strtotime($row_back->from_start_time)), 'start_price' => $row_back->start_price, 'currency' =>  $currency->symbol.' ('.$currency->iso.')'];

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

	static function show_symbol($id){
		$CI = get_instance();
		$CI->db->select('symbol');
		$CI->db->where('currency_id', $id);
		$query = $CI->db->get('currency');
		if ($query->num_rows() > 0)
		{
		   $row = $query->row();
		   return $row->symbol;
		}
	}
}
?>
