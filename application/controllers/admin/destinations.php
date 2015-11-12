<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Destinations extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		$this->load->helper('language');
		$this->lang->load('destinations', $this->session->userdata('language'));
	}
	function index(){
		$this->list_destinations();
	}
	function list_destinations(){
		$this->load->model('destination');
		$data['destinations'] = $this->destination->show_destinations();
		$data['main_content'] = 'backend/destinations/destinations';
		$data['title'] = 'Destinations';
		$this->load->view('includes/template', $data);
	}
	function add_destination(){
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('city', 'City', 'trim|required|alpha');
		$this->form_validation->set_rules('iso', 'ISO', 'trim|required|alpha|max_length[3]|is_unique[destinations.iso]');

		if ($this->form_validation->run() == FALSE)
		{
			$data['main_content'] = 'backend/destinations/add_destination';
			$data['title'] = 'Add destination';
			$this->load->view('includes/template', $data);
		}
		else
		{
			$this->load->model('destination');
			$data = $this->input->post();
			$this->destination->create_destination($data);
			$this->session->set_flashdata('message', 'Destination successfully added');
			redirect('admin/destinations', 'refresh');
		}
	}
	function edit_destination($id){
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('city', 'City', 'trim|required|alpha');
		$this->form_validation->set_rules('iso', 'ISO', 'trim|required|alpha|max_length[3]|callback__iso_check');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->model('destination');
			$data['destination'] = $this->destination->get_destination($id);
			$data['main_content'] = 'backend/destinations/edit_destination';
			$data['title'] = 'Edit destination';
			$this->load->view('includes/template', $data);
		}
		else
		{
			$id = $this->uri->segment(4);
			$this->load->model('destination');
			$data = $this->input->post();
			$this->destination->save_destination($data, $id);
			$this->session->set_flashdata('message', 'Member successfully edited');
			redirect('admin/destinations', 'refresh');
		}
	}
	function delete_destination($id){
		$this->load->model('destination');
		$this->session->set_flashdata('message', 'Destination successfully deleted');
		$this->destination->delete_destination($id);
		redirect('admin/destinations', 'refresh');
	}
	public function _iso_check($str)
	{
		$id = $this->uri->segment(4);
		$this->db->where('iso', $this->input->post('iso'));
		$this->db->where('destination_id !=', $id);
		$destination = $this->db->get('destinations');

		if ($destination->num_rows() > 0)
		{
			$this->form_validation->set_message('_iso_check', 'This %s already exists');
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
