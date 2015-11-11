<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}
	function index(){
		$this->load->model('dashboard_stats');
		$this->load->helper('language');
		$this->lang->load('dashboard', $this->session->userdata('language'));

		$data['upcoming_tours'] = $this->dashboard_stats->upcoming_tours();
		$data['main_content'] = 'backend/dashboard/dashboard';
		$data['title'] = 'Dashboard';
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
