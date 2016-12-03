<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    // Here you can activate the application profiler.
    protected $_profiler    	= FALSE;

    // If set, this model file will automatically be loaded.
    protected $_default_model	= NULL;

	// If set, this language file will automatically be loaded.
    protected $_language_file	= NULL;

    // For status messages
    protected $_message;

    // Should we try to migrate to the latest version
    // on every page load?
    protected $_auto_migrate = false;

	function __construct()
	{

		parent::__construct();

		//--------------------------------------------------------------------
        // Language & Model Files
        //--------------------------------------------------------------------

        if (!is_null($this->_language_file)) $this->lang->load($this->l_anguage_file);

        if (!is_null($this->_default_model))
        {
            /*
                This does not automatically load the database.
                If you're using my MY_Model, it will load it for you.
                otherwise, you should load it in your autoload config
                or within your model itself.
             */
            $this->load->model($this->_default_model);
        }

        //--------------------------------------------------------------------
        // Migrations
        //--------------------------------------------------------------------

        // Try to auto-migrate any files stored in APPPATH ./migrations
        if ($this->_auto_migrate === TRUE)
        {
            $this->load->library('migration');

            // We can specify a version to migrate to by appending ?migrate_to=X
            // in the URL.
            if ($mig_version = $this->input->get('migrate_to'))
            {
                $this->migration->version($mig_version);
            }
            else
            {
                $this->migration->latest();
            }
        }

        //--------------------------------------------------------------------
        // Profiler
        //--------------------------------------------------------------------

        // The profiler is dealt with twice so that we can set
        // things up to work correctly in AJAX methods using $this->render_json
        // and it's cousins.
        if ($this->_profiler == true)
        {
            $this->output->enable_profiler(true);
        }

	}

	public function message($message = '', $type = 'info')
	{
		# code...
	}

	// public function set($view, $data = array(), $overwrite = FALSE)
	// {

	// 	if (is_object($data)) {
 //            $array = array();
 //            foreach ($data as $k => $v) {
 //                $array[$k] = $v;
 //            }
 //            $data = $array;
 //        }
        
	// 	$data = array_merge($data, $this->_vars);

	// 	if($overwrite){
	// 		$this->_content = $this->load->view($view, $data, TRUE);
	// 	} else {
	// 		$this->append($view, $data);
	// 	}
	// }

	// public function append($view, $data = array())
	// {

	// 	if (is_object($data)) {
 //            $array = array();
 //            foreach ($data as $k => $v) {
 //                $array[$k] = $v;
 //            }
 //            $data = $array;
 //        }

	// 	$data = array_merge($data, $this->_vars);

	// 	$this->_content = $this->_content . $this->load->view($view, $data, TRUE);

	// }

	// public function prepend($view, $data = array())
	// {

	// 	if (is_object($data)) {
 //            $array = array();
 //            foreach ($data as $k => $v) {
 //                $array[$k] = $v;
 //            }
 //            $data = $array;
 //        }
        
	// 	$data = array_merge($data, $this->_vars);

	// 	$this->_content = $this->load->view($view, $data, TRUE) . $this->_content;
		
	// }

 //    protected function render($data=array())
 //    {

 //        if (is_object($data)) {
 //            $array = array();
 //            foreach ($data as $k => $v) {
 //                $array[$k] = $v;
 //            }
 //            $data = $array;
 //        }
        
	// 	$data = array_merge($data, $this->_vars);

 //        $this->set_var('view_content', $this->_content);
 //        $this->load->view('theme/layout', $this->_vars);

 //    }

	// /**
 //     * Sets a data variable to be sent to the view during the render() method.
 //     *
 //     * @param string $name
 //     * @param mixed $value
 //     */
 //    public function set_var($name, $value=null)
 //    {
 //        if (is_array($name))
 //        {
 //            foreach ($name as $k => $v)
 //            {
 //                $this->_vars[$k] = $v;
 //            }
 //        }
 //        else
 //        {
 //            $this->_vars[$name] = $value;
 //        }
 //    }

	// /**
 //     * Specifies a custom layout file to be used during the render() method.
 //     * Intended to be used as a chainable 'scope' method prioer to calling
 //     * the render method.
 //     *
 //     * Examples:
 //     *      $this->layout('two_left')->render();
 //     *
 //     * @param  string $view The relative path/name of the view file to use.
 //     * @return MY_Controller instance
 //     */
 //    public function layout($view)
 //    {
 //        $this->use_layout = $view;

 //        return $this;
 //    }

}

class Authenticated_Controller extends MY_Controller
{

	protected $link_login = '/login';
	
	function __construct()
	{
		parent::__construct();

		if (!$this->ion_auth->logged_in()){
			$this->session->set_userdata('after_login', current_url());
            redirect($this->link_login);	
		}

	}

}

class Widgetx
{
	
    public $module_path;

    function __get($var) {
        global $CI;
        return $CI->$var;
    }

    function runit($file ,$param = null) 
    {        
        $args = func_get_args();
        $module = '';
        /* is module in filename? */
        if (($pos = strrpos($file, '/')) !== FALSE) {
            $module = substr($file, 0, $pos);
            $file = substr($file, $pos + 1);
        }
        list($path, $file) = Modules::find($file, $module, 'widgets/');
        if ($path === FALSE)
            $path = APPPATH.'widgets/';
        Modules::load_file($file, $path);
        $file = ucfirst($file);
        $widget = new $file($param);
        return $widget->run();
    }
} 