<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

	public function message($message = '', $type = 'info')
	{
		# code...
	}

}

class Authenticated_Controller extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in()){
			$this->session->set_userdata('after_login', current_url());
            redirect('/login');	
		}

	}

}