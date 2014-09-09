<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tours extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}
	function index(){
		$this->list_tours();
	}
	function list_tours(){
		$this->load->model('tour');
		$data['tours'] = $this->tour->show_tours();
		$data['main_content'] = 'backend/tours/tours';
		$data['title'] = 'Tours';
		$this->load->view('includes/template', $data);
	}
	function add_tour(){
		$this->load->model('tour');
		$data['cities'] = $this->tour->list_cities();
		$data['main_content'] = 'backend/tours/add_tour';
		$data['title'] = 'Create tour';
		$this->load->view('includes/template', $data);

	}function edit_tour(){

	}
	function delete_tour(){
		
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