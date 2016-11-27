<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('admin/logon/login', 'refresh');
		}
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$this->template->stylesheet->add('lib/css/bootstrap.css');
		$this->template->stylesheet->add('lib/css/font-awesome.css');
		$this->template->stylesheet->add('lib/css/custom.css');

		$this->template->javascript->add('lib/js/jquery-1.10.2.js');
        $this->template->javascript->add('lib/js/bootstrap.min.js');
        $this->template->javascript->add('lib/js/jquery.metisMenu.js');
        $this->template->javascript->add('lib/js/custom.js');

		// $this->load->view('welcome_message');
		$this->template->content->view('main_index');

		$this->template->publish();
		
	}
}
