<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Authenticated_Controller {

	function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->is_admin()){
			$this->session->set_flashdata('after_login', current_url());
            redirect('/login');	
		}

	}

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
