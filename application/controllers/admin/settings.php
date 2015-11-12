<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		$this->load->helper('language');
		$this->lang->load('settings', $this->session->userdata('language'));
	}
	function index(){
		$this->list_settings();
	}
	function list_settings(){
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('company_name', 'Company name', 'required');
		$this->form_validation->set_rules('company_street', 'Company street', 'required');
		$this->form_validation->set_rules('company_zip', 'Company zip code', 'required');
		$this->form_validation->set_rules('company_city', 'Company city', 'required');
		$this->form_validation->set_rules('company_state', 'Company state', 'required');
		$this->form_validation->set_rules('company_phone_one', 'Company phone number 1', 'required');
		$this->form_validation->set_rules('company_phone_two', 'Company phone number 2', 'required');
		$this->form_validation->set_rules('company_email', 'Company e-mail', 'required');

		$this->form_validation->set_rules('company_rules', 'Company Rules', 'required');
		//$this->form_validation->set_rules('iso', 'ISO', 'trim|required|alpha|max_length[3]|callback__iso_check');

		if ($this->form_validation->run() == FALSE)
		{
			//echo '1';
			$this->load->model('setting');
			$data['setting'] = $this->setting->show_settings();
			$data['currencies'] = $this->setting->list_currencies();
			$data['main_content'] = 'backend/settings/settings';
			$data['title'] = 'Settings';
			$this->load->view('includes/template', $data);
		}
		else
		{
			//echo '2';
			$this->load->model('setting');
			$data = $this->input->post();
			$this->setting->save_settings($data);
			$this->session->set_flashdata('message', 'Settings successfully saved');
			redirect('admin/settings', 'refresh');
		}
	}





	function save_settings(){
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('city', 'City', 'trim|required|alpha');
		$this->form_validation->set_rules('iso', 'ISO', 'trim|required|alpha|max_length[3]|callback__iso_check');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->model('setting');
			$data['setting'] = $this->setting->show_settings();
			$data['main_content'] = 'backend/settings/settings';
			$data['title'] = 'Settings';
			$this->load->view('includes/template', $data);
		}
		else
		{
			$this->load->model('setting');
			$data = $this->input->post();
			$this->setting->save_settings($data);
			$this->session->set_flashdata('message', 'Settings successfully saved');
			redirect('admin/settings', 'refresh');
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
