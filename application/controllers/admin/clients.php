<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clients extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}
	function index(){
		$this->list_clients();
	}
	function list_clients(){
		$this->load->model('client');
		$data['clients'] = $this->client->show_clients();
		$data['main_content'] = 'backend/clients/clients';
		$data['title'] = 'Clients';
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