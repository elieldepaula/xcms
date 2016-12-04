<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Authenticated_Controller {

	function __construct()
	{
	    
		$this->link_login = 'admin/auth/login';
		parent::__construct();

	}

	public function index()
	{
		$query_users = $this->ion_auth->users()->result();

		$data = array(
			'users' => $query_users
		);

		$this->template->content->view('users/index', $data);
        $this->template->publish();
	}

}