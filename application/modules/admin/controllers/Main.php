<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends Authenticated_Controller {

	private $use_view     = '';
    private $use_layout   = '';

	function __construct()
	{
		$this->link_login = 'admin/logon/login';
		parent::__construct();


	}

	public function index()
	{

		// $view = !empty($this->use_view) ? $this->use_view : $this->router->fetch_class() .'/'. $this->router->fetch_method();

		// Load a view in the content partial
        // $this->template->content->view('default/home');

        // $this->template->content->view('default/portfolio');
        // $this->template->content->view('main/about');
        $this->template->content->view('main/index');
        
        // Set a partial's content
        // $this->template->footer = 'Criado com Twitter Bootstrap';
        
        // Publish the template
        $this->template->publish();//'theme/layout');

        // echo $view;
        // $this->render();

        /*****/

		// $this->layout('layout')->view('main/index')->render();
		
	}
}
