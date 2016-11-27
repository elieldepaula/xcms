<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			//redirect('admin/logon/login', 'refresh');
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

		// Load a view in the content partial
        // $this->template->content->view('default/home');

        // $this->template->content->view('default/portfolio');
        // $this->template->content->view('default/about');
        $this->template->content->view('main/index');
        
        // Set a partial's content
        // $this->template->footer = 'Criado com Twitter Bootstrap';
        
        // Publish the template
        $this->template->publish('theme/layout');

        /*****/

		// $this->layout('layout')->view('main/index')->render();
		
	}
}
