<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tours extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		$this->load->helper('language');
		$this->lang->load('tours', $this->session->userdata('language'));
	}
	function index(){
		$this->list_tours();
	}
	function list_tours(){
		$this->load->model('tour');
		$data['tours'] = $this->tour->show_tours();
		$data['company_info'] = $this->tour->get_company_info();
		$data['main_content'] = 'backend/tours/tours';
		$data['title'] = 'Tours';
		$this->load->view('includes/template', $data);
	}
	function list_passangers($id){
		$this->load->model('tour');
		$data['clients'] = $this->tour->show_passangers($id);
		//$data['company_info'] = $this->tour->get_company_info();
		$data['main_content'] = 'backend/tours/passangers_list';
		$data['title'] = 'Passangers list';
		$this->load->view('includes/template', $data);
	}

	function add_tour(){
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('from', 'Departure city', 'trim|required|callback__citynull_check');
		$this->form_validation->set_rules('to', 'Arrival city', 'trim|required|callback__citynull_check');
		$this->form_validation->set_rules('available_seats', 'Available seats', 'trim|required');
		$this->form_validation->set_rules('start_price', 'Start price', 'trim|required');
		$this->form_validation->set_rules('tour_type', 'Tour type', 'string|trim|required');

		if( $this->input->post('tour_type') == 'Automatic')
		{
			$this->form_validation->set_rules('automatic_from', 'From date', 'trim|required');
			$this->form_validation->set_rules('automatic_until', 'Until time', 'trim|required');
			$this->form_validation->set_rules('automatic_day', 'Day', 'trim');
			$this->form_validation->set_rules('automatic_time', 'Time', 'trim|required');
		}
		else
		{
			$this->form_validation->set_rules('from_start_date', 'Start date', 'trim|required');
			$this->form_validation->set_rules('from_start_time', 'Start time', 'trim|required');
		}

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->model('tour');
			$data['cities'] = $this->tour->list_cities();
			$data['main_content'] = 'backend/tours/add_tour';
			$data['title'] = 'Create tour';
			$this->load->view('includes/template', $data);
		}
		else
		{
			$this->load->model('tour');
			$data = $this->input->post();
			$this->tour->create_tour($data);
			if($data['tour_type'] == 'Manual')
				$this->session->set_flashdata('message', 'Tour successfully created');
			else
				$this->session->set_flashdata('message', 'Tours successfully created');
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
		$this->form_validation->set_rules('available_seats', 'Available seats', 'trim|required');
		$this->form_validation->set_rules('start_price', 'Start price', 'trim|required');

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
