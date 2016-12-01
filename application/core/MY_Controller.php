<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

	/**
     * The type of caching to use. The default values are
     * set here so they can be used everywhere, but
     */
    protected $cache_type       = 'dummy';
    protected $backup_cache     = 'file';

    // Here you can activate the application profiler.
    protected $show_profiler    = FALSE;

    // If set, this model file will automatically be loaded.
    protected $model_file = NULL;

	// If set, this language file will automatically be loaded.
    protected $language_file = NULL;

    private $use_view     = '';
    private $use_layout   = '';

    // Stores data variables to be sent to the view.
    protected $vars = array();

    // For status messages
    protected $message;

    // Should we try to migrate to the latest version
    // on every page load?
    protected $auto_migrate = false;

	function __construct()
	{

		parent::__construct();

		//--------------------------------------------------------------------
        // Cache Setup
        //--------------------------------------------------------------------

        // Make sure that caching is ALWAYS available throughout the app
        // though it defaults to 'dummy' which won't actually cache.
        $this->load->driver('cache', array('adapter' => $this->cache_type, 'backup' => $this->backup_cache));

		//--------------------------------------------------------------------
        // Language & Model Files
        //--------------------------------------------------------------------

        if (!is_null($this->language_file)) $this->lang->load($this->language_file);

        if (!is_null($this->model_file))
        {
            /*
                This does not automatically load the database.
                If you're using my MY_Model, it will load it for you.
                otherwise, you should load it in your autoload config
                or within your model itself.
             */
            $this->load->model($this->model_file);
        }

        //--------------------------------------------------------------------
        // Migrations
        //--------------------------------------------------------------------

        // Try to auto-migrate any files stored in APPPATH ./migrations
        if ($this->auto_migrate === TRUE)
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
        if ($this->show_profiler == true)
        {
            $this->output->enable_profiler(true);
        }

	}

	public function message($message = '', $type = 'info')
	{
		# code...
	}

	/**
     * A Very simple templating system designed not for power or flexibility
     * but to use the built in features of CodeIgniter's view system to easily
     * create fast templating capabilities.
     *
     * The view is assumed to be under the views folder, under a folder with the
     * name of the controller and a view matching the name of the method.
     *
     * The theme is simply a set of files located under the views/ui folder. By default
     * a view named index.php will be used. You can specify different layouts
     * with the scope method, 'layout()'.
     *
     *      $this->layout('two_left')->render();
     *
     * You can specify a non-default view name with the scope method 'view'.
     *
     *      $this->view('another_view')->render();
     *
     * Within the template the string '{view_content}' will be replaced with the
     * contents of the view file that we're rendering.
     *
     * @param  [type]  $layout      [description]
     * @param  boolean $return_data [description]
     * @return [type]               [description]
     */
    protected function render($data=array())
    {
        // Calc our view name based on current method/controller
        $view = !empty($this->use_view) ? $this->use_view : $this->router->fetch_class() .'/'. $this->router->fetch_method();
echo $view;
        // Merge any saved vars into the data
        $data = array_merge($data, $this->vars);

        // Make sure any scripts/stylesheets are available to the view
        // $data['external_scripts'] = $this->external_scripts;
        // $data['stylesheets'] = $this->stylesheets;

        // We'll make the view content available to the template.
        // $data['view_content'] =  $this->load->view($view, $data, true);
        // Load a view in the content partial
        $this->template->content->view($view, $data);

        // Build our notices from the theme's view file.
        // $data['notice'] = $this->load->view('theme/notice', array('notice' => $this->message()), true);

        // Render our layout and we're done!
        $layout = !empty($this->use_layout) ? $this->use_layout : 'theme/layout';

        // $this->load->view('theme/'. $layout, $data, false, true);

        // Publish the template
        $this->template->publish($layout);

        // Reset our custom view attributes.
        $this->use_view = $this->use_layout = '';
    }

	/**
     * Sets a data variable to be sent to the view during the render() method.
     *
     * @param string $name
     * @param mixed $value
     */
    public function set_var($name, $value=null)
    {
        if (is_array($name))
        {
            foreach ($name as $k => $v)
            {
                $this->vars[$k] = $v;
            }
        }
        else
        {
            $this->vars[$name] = $value;
        }
    }

    /**
     * Specifies a custom view file to be used during the render() method.
     * Intended to be used as a chainable 'scope' method prioer to calling
     * the render method.
     *
     * Examples:
     *      $this->view('my_view')->render();
     *      $this->view('users/login')->render();
     *
     * @param  string $view The relative path/name of the view file to use.
     * @return MY_Controller instance
     */
    public function view($view)
    {
        $this->use_view = $view;

        return $this;
    }

	/**
     * Specifies a custom layout file to be used during the render() method.
     * Intended to be used as a chainable 'scope' method prioer to calling
     * the render method.
     *
     * Examples:
     *      $this->layout('two_left')->render();
     *
     * @param  string $view The relative path/name of the view file to use.
     * @return MY_Controller instance
     */
    public function layout($view)
    {
        $this->use_layout = $view;

        return $this;
    }

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