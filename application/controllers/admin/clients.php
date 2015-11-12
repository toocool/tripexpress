<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clients extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		$this->load->helper('language');
		$this->lang->load('clients', $this->session->userdata('language'));
	}
	function index()
	{
		$this->list_clients();
	}
	function list_clients()
	{
		$this->load->library('pagination');
		$this->load->model('client');
		$config['base_url'] = base_url().'admin/clients/list_clients';
		$config['total_rows'] = $this->client->total_clients();
		$config['per_page'] = 10;
		$config["uri_segment"] = 4;
		//pagination styling
		$config['num_tag_open'] = '<li>'; $config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href"#">'; $config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li>'; $config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>'; $config['prev_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo;';
		$config['next_link'] = '&raquo;';
		//pagination styling
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$data['clients'] = $this->client->show_clients($config['per_page'], $page, null);
		$data['links'] = $this->pagination->create_links();
		$data['main_content'] = 'backend/clients/clients';
		$data['title'] = 'Clients';
		$this->load->view('includes/template', $data);
	}
	function list_client()
	{
		$only = $this->input->post('client_search');
		$this->load->library('pagination');
			$this->load->model('client');
		$config['base_url'] = base_url().'admin/clients/list_clients';
		$config['total_rows'] = $this->client->total_clients();
		$config['per_page'] = 10;
		$config["uri_segment"] = 4;
		//pagination styling
		$config['num_tag_open'] = '<li>'; $config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href"#">'; $config['cur_tag_close'] = '</a></li>';
		$config['next_tag_open'] = '<li>'; $config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>'; $config['prev_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo;';
		$config['next_link'] = '&raquo;';
		//pagination styling
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$data['clients'] = $this->client->show_clients($config['per_page'], $page, $only);
		$data['links'] = $this->pagination->create_links();
		$data['main_content'] = 'backend/clients/clients';
		$data['title'] = 'Clients';
		$this->load->view('includes/template', $data);
	}
	function list_tickets($identification_nr)
	{
		$this->load->model('client');
		$data['clients'] = $this->client->list_tickets($identification_nr);
		$data['main_content'] = 'backend/clients/list_tickets';
		$data['title'] = 'Ticket history';
		$this->load->view('includes/template', $data);
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
