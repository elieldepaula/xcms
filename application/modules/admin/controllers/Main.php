<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Authenticated_Controller {

	function __construct()
	{
	    
		$this->link_login = 'admin/auth/login';
		parent::__construct();

	}

	public function index()
	{

        $this->template->content->view('main/index');
        $this->template->publish();//'theme/layout');

	}
}