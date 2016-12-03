<?php

class Auth extends MY_Controller
{

	public function login()
	{

		//validate form input
		$this->form_validation->set_rules('identity', 'E-mail', 'required');
		$this->form_validation->set_rules('password', 'Senha', 'required');

		if ($this->form_validation->run() == true)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool) $this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('admin/main', 'refresh');
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
				
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id'    => 'identity',
				'type'  => 'text',
				'class' => 'form-control',
				'placeholder' => 'E-mail',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id'   => 'password',
				'type' => 'password',
				'class' => 'form-control',
				'placeholder' => 'Senha',
			);

			//************//

			$this->template->stylesheet->add('lib/css/bootstrap.css');
			$this->template->stylesheet->add('lib/css/font-awesome.css');
			$this->template->stylesheet->add('lib/css/login.css');

			$this->template->javascript->add('lib/js/jquery-1.10.2.js');	
	        $this->template->javascript->add('lib/js/bootstrap.min.js');
	        $this->template->javascript->add('lib/js/jquery.metisMenu.js');
	        $this->template->javascript->add('lib/js/custom.js');

			// $this->load->view('welcome_message');
			$this->template->content->view('auth/login', $this->data);

			$this->template->publish('auth/template'); // Passa um template diferente para o login.

		}
	}

	public function logout()
	{
		// $this->data['title'] = "Logout";

		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', 'Logout efetuado com sucesso.');
		redirect('admin/auth/login');

	}
}