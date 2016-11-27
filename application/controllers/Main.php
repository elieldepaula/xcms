<?php

/*

Copyright [yyyy] [name of copyright owner]

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

*/

class Main extends MY_Controller {

    function __Construct()
    {
        parent::__Construct();

        $this->show_profiler = TRUE;

        // Set the title
        $this->template->title = "Base App";

        // Dynamically add a css stylesheet
        $this->template->stylesheet->add('assets/css/bootstrap.css');
        $this->template->stylesheet->add('assets/font-awesome-4.1.0/css/font-awesome.min.css');
        $this->template->stylesheet->add('assets/css/style.css');
        $this->template->javascript->add('assets/plugins/jquery-1.10.2.js');
        $this->template->javascript->add('assets/plugins/bootstrap.js');
        $this->template->javascript->add('assets/plugins/jquery.easing.min.js');
        $this->template->javascript->add('assets/js/custom.js');

    }

	public function index()
	{
		
        // Load a view in the content partial
        $this->template->content->view('default/home');

        $this->template->content->view('default/portfolio');
        $this->template->content->view('default/about');
        $this->template->content->view('default/contact');
        
        // Set a partial's content
        $this->template->footer = 'Criado com Twitter Bootstrap';
        
        // Publish the template
        $this->template->publish();
	}

}