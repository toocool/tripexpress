<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function index()
	{
	   $data['title'] = 'Login';
	   $this->load->view('backend/login_form', $data);
	}

	function validate_credentials()
	{
	 	$this->load->model('user');
	 	$query = $this->user->validate();
	 	if($query)
	 	{
	 		$data = array(
	 				'username' => $this->input->post('username'), 
	 				'is_logged_in' => true,
	 				);
	 		$this->session->set_userdata($data);
	 		redirect('admin/dashboard');
	 	}
	 	else
	 	{
	 		$data['error'] = 'Invalid Username or Password';
	     	$data['main_content'] = 'login_form';
	 		$this->load->view('includes/template', $data);
	 	}
	}

	function logout()
	{
	    $this->session->sess_destroy();
	    $this->index();
	}

}

?>
