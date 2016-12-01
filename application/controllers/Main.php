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

    }

	public function index()
	{

        // $view = !empty($this->use_view) ? $this->use_view : $this->router->fetch_class() .'/'. $this->router->fetch_method();
		
        // // Load a view in the content partial
        // $this->template->content->view('default/home');

        // $this->template->content->view('default/portfolio');
        // $this->template->content->view('default/about');
        // $this->template->content->view('default/contact');
        
        // // Set a partial's content
        // $this->template->footer = 'Criado com Twitter Bootstrap';
        
        // // Publish the template
        // // $this->template->publish();

        // echo $view;
        $this->render();
	}

    public function contact()
    {
        $view = !empty($this->use_view) ? $this->use_view : $this->router->fetch_class() .'/'. $this->router->fetch_method();
        echo $view;
    }

}