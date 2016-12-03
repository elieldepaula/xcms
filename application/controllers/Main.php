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

         $this->template->titulo_site = "Base App";
         $this->template->rodape_site = 'Desenvolvido por Eliel de Paula';

    }

	public function index()
	{
        
        $this->template->titulo_portfolio = 'Portifa!';
        $this->template->content->view('main/index');
        $this->template->content->view('main/portfolio');
        $this->template->content->view('main/about');
        $this->template->content->view('main/contact');
        $this->template->publish();

	}

}