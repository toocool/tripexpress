<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function index()
	{
	   $data['title'] = 'Login';
	   $data['error'] = '';
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
	 				'role' => $this->user->member_role($this->input->post('username')),
	 				'user_id' => $this->user->member_id($this->input->post('username'))
	 				);
	 		$this->session->set_userdata($data);
	 		redirect('admin/dashboard');
	 	}
	 	else
	 	{
	 		$data['error'] = 'Invalid Username or Password';
	     	$data['main_content'] = 'login_form';
	 		$this->load->view('backend/login_form', $data);
	 	}
	}

	function logout()
	{
	    $this->session->sess_destroy();
	    $this->index();
	}

}

?>
