<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bookings extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}
	function index(){
		$this->list_bookings();
	}
	function list_bookings(){
		$this->load->model('booking');
		$data['bookings'] = $this->booking->show_bookings();
		$data['main_content'] = 'backend/bookings/bookings';
		$data['title'] = 'Tours';
		$this->load->view('includes/template', $data);
	}

	function ajax_check_tours()
	{   
		$this->load->model('booking');
		//$data['from_tour'] = $this->booking->check_available_tours();
	    if($_POST['firstname'] == "")
	    {
	      echo $message = "You can't send empty text";
	    }
	    else
	    {	
	    	//header('Content-type: application/json');
	        $message = $this->booking->check_available_tours($_POST['firstname']);
	        $data_json = json_encode($message);
       		 echo $data_json;
	    }
	    
	}

	function add_ticket(){
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('from', 'Departure city', 'trim|required|callback__citynull_check');
		$this->form_validation->set_rules('to', 'Arrival city', 'trim|required|callback__citynull_check');
		$this->form_validation->set_rules('from_start_date', 'Start date', 'trim|required');
		$this->form_validation->set_rules('from_start_time', 'Start time', 'trim|required');
		$this->form_validation->set_rules('return_start_date', 'Return date', 'trim|required');
		$this->form_validation->set_rules('return_start_time', 'Return time', 'trim|required');
		$this->form_validation->set_rules('available_seats', 'Available seats', 'trim|required');
		$this->form_validation->set_rules('start_price', 'Start price', 'trim|required');
		$this->form_validation->set_rules('return_price', 'Return Price', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->model('booking');
			$data['cities'] = $this->booking->list_cities();
			$data['main_content'] = 'backend/bookings/add_ticket';
			$data['title'] = 'Book a ticket';
			$this->load->view('includes/template', $data);
		}
		else
		{
			$this->load->model('tour');
			$data = $this->input->post();
			$this->tour->create_tour($data);
			$this->session->set_flashdata('message', 'Tour successfully created');
			redirect('admin/tours', 'refresh');
		}
	}
	function edit_tour($id)
	{
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('from', 'Departure city', 'trim|required|callback__citynull_check');
		$this->form_validation->set_rules('to', 'Arrival city', 'trim|required|callback__citynull_check');
		$this->form_validation->set_rules('from_start_date', 'Start date', 'trim|required');
		$this->form_validation->set_rules('from_start_time', 'Start time', 'trim|required');
		$this->form_validation->set_rules('return_start_date', 'Return date', 'trim|required');
		$this->form_validation->set_rules('return_start_time', 'Return time', 'trim|required');
		$this->form_validation->set_rules('available_seats', 'Available seats', 'trim|required');
		$this->form_validation->set_rules('start_price', 'Start price', 'trim|required');
		$this->form_validation->set_rules('return_price', 'Return Price', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->model('tour');
			$data['cities'] = $this->tour->list_cities();
			$data['tour'] = $this->tour->get_tour($id);
			$data['main_content'] = 'backend/tours/edit_tour';
			$data['title'] = 'Edit Tour';
			$this->load->view('includes/template', $data);
		}
		else
		{
			$id = $this->uri->segment(4);
			$this->load->model('tour');
			$data = $this->input->post();
			$this->tour->save_tour($data, $id);
			$this->session->set_flashdata('message', 'Tour successfully edited');
			redirect('admin/tours', 'refresh');
		}
	}
	function delete_tour($id){
		$this->load->model('tour');
		$this->session->set_flashdata('message', 'Tour successfully deleted');
		$this->tour->delete_tour($id);
		redirect('admin/tours', 'refresh');
	}
	
	public function _citynull_check($str)
	{
		if ($str == '0')
		{
			$this->form_validation->set_message('_citynull_check', 'The %s field can not be empty');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	private function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');

		if (!isset($is_logged_in) || $is_logged_in != true) {
			echo 'login please';
			die();
		}
	}
}
?>