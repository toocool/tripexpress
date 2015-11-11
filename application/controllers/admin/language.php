<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Language extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
	}

  private function is_logged_in()
  {
    $is_logged_in = $this->session->userdata('is_logged_in');

    if (!isset($is_logged_in) || $is_logged_in != true) {
      echo 'login please';
      die();
    }
  }

	function change($language)
	{
    	$this->session->set_userdata('language', $language);
      $this->db->where("username", $this->session->userdata('username'));
      $this->db->update("users", ['language' => $language]);
      redirect($_SERVER['HTTP_REFERER']);

	}

}
?>
