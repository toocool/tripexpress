<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		$this->load->helper('language');
		$this->lang->load('members', $this->session->userdata('language'));
	}
	function index(){

		$this->list_members();
	}

	function list_members(){

		$this->load->library('pagination');
		$config['base_url'] = base_url().'admin/members/list_members';
		$config['total_rows'] = $this->db->count_all('users');
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
		$this->load->model('user');
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$data['users'] = $this->user->show_users($config['per_page'], $page);
		$data['links'] = $this->pagination->create_links();

		$data['main_content'] = 'backend/members/members';
		$data['title'] = 'Members';
		$this->load->view('includes/template', $data);
	}

	function add_member(){
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]|is_unique[users.username]|alpha_dash|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passagain]|md5');
		$this->form_validation->set_rules('passagain', 'Repeat password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('firstname', 'First name', 'trim|required|alpha');
		$this->form_validation->set_rules('lastname', 'Last name', 'trim|required|alpha');
		$this->form_validation->set_rules('email', 'Email adress', 'trim|required|valid_email');
		$this->form_validation->set_rules('role', 'Role', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['main_content'] = 'backend/members/add_member';
			$data['title'] = 'Add member';
			$this->load->view('includes/template', $data);
		}
		else
		{
			$this->load->model('user');
			$data = $this->input->post();
			$this->user->create_user($data);
			$this->session->set_flashdata('message', 'Member successfully added');
			redirect('admin/members', 'refresh');
		}
	}
	function edit_member($id){
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]|callback__username_check|alpha_dash|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|matches[passagain]|md5');
		$this->form_validation->set_rules('passagain', 'Repeat password', 'trim|matches[password]');
		$this->form_validation->set_rules('firstname', 'First name', 'trim|required|alpha');
		$this->form_validation->set_rules('lastname', 'Last name', 'trim|required|alpha');
		$this->form_validation->set_rules('email', 'Email adress', 'trim|required|valid_email');
		$this->form_validation->set_rules('role', 'Role', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->model('user');
			$data['user'] = $this->user->get_user($id);
			$data['main_content'] = 'backend/members/edit_member';
			$data['title'] = 'Edit Member';
			$this->load->view('includes/template', $data);
		}
		else
		{
			$id = $this->uri->segment(4);
			$this->load->model('user');
			$data = $this->input->post();
			$this->user->save_user($data, $id);
			$this->session->set_flashdata('message', 'Member successfully edited');
			redirect('admin/members', 'refresh');
		}

	}
	function delete_member($id){
		$this->load->model('user');
		$this->session->set_flashdata('message', 'Member successfully deleted');
		$this->user->delete_member($id);
		redirect('admin/members', 'refresh');
	}

	function block_member($id){
		$this->load->model('user');
		$this->session->set_flashdata('message', 'Member successfully blocked');
		$this->user->block_member($id);
		redirect('admin/members', 'refresh');
	}
	function unblock_member($id){
		$this->load->model('user');
		$this->session->set_flashdata('message', 'Member successfully unblocked');
		$this->user->unblock_member($id);
		redirect('admin/members', 'refresh');
	}

	public function _username_check($str)
	{
		$id = $this->uri->segment(4);
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('id !=', $id);
		$user = $this->db->get('users');

		if ($user->num_rows() > 0)
		{
			$this->form_validation->set_message('_username_check', 'This %s already exists');
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
