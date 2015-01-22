<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistics extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}
	function index()
	{
		$this->load->model('stats');
		$data['main_content'] = 'backend/statistics/statistics';
		$data['title'] = 'Statistics';
		$data['from'] = date('Y-m-01');
		$data['to'] = date('Y-m-t');
		$data['company_info'] = $this->stats->get_company_info();
		$this->load->view('includes/template', $data);
	}
	function show_stats()
	{
		$this->load->model('stats');
		$from_date = $this->input->post('from_date');
		$to_date = $this->input->post('to_date');
		
		$data['main_content'] = 'backend/statistics/statistics';
		$data['title'] = 'Statistics';
		$data['from'] = $from_date;
		$data['to'] = $to_date;
		$data['company_info'] = $this->stats->get_company_info();
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