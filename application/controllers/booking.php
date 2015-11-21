<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {
    function __construct()
	{
		parent::__construct();
        $this->load->helper('language');
		$this->lang->load('bookings', $this->session->userdata('language'));
	}

	function step_one()
	{

        $data['title'] = 'Available tours';
 	    $this->load->view('frontend/step1.php', $data);
	}

    function step_two()
	{

	   echo '2';
	}


}

?>
