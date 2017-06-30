<?php 
App::uses('HtmlHelper', 'View/Helper');

/**
 * Extendendo as funcionalidades do HtmlHelper
 * 
 */
class DefaultHtmlHelper extends HtmlHelper {


	public $pluginPath;
	public $controller;
	public $action;
	public $constant;

	function __construct(View $View, $settings = array()) 
	{
		parent::__construct($View, $settings);
		$this->setVariables();
	}
	

  	public function setPlPath($pluginPath)
  	{
	    return $this->pluginPath = $pluginPath;
  	}
	

  	public function setController($controller)
  	{
	    return $this->controller = $controller;
	    
  	}
	
	
  	public function setAction($action)
  	{
	    return $this->action = $action;
  	}
	

  	public function setConstant($constant)
  	{
	    return $this->constant = $constant;
  	}


  	public function setVariables()
  	{
  		
  		if (isset($this->params->plugin)) {
  			$this->setPlPath(App::pluginPath(Inflector::humanize($this->params->plugin)));
  		}
  		$this->setController($this->params->controller);
  		$this->setAction($this->params->action);
  		$this->setConstant(Configure::read('App'));
  		
  	}

	
  	public function automaticScript()
  	{	
  		$scripts = array();
  		if (isset($this->pluginPath)) {
			$js_path_plugin = $this->pluginPath . $this->constant['webroot'] . DS . $this->constant['jsBaseUrl'];

			if (is_file($js_path_plugin . $this->controller . '.js')) {
		    	$scripts[] = $this->plugin.'.'.$this->controller;
		  	}

		  	if (is_file($js_path_plugin . $this->controller . DS . $this->action . '.js')) {
		    	$scripts[] = $this->plugin . '.' . $this->controller . '/' . $this->action;
		  	}
  		}  		
  		$js_path = $this->constant['www_root'] . $this->constant['jsBaseUrl'];
  		if (is_file($js_path . $this->controller . '.js')) {
	    	$scripts[] = $this->controller;
		}
	  	if (is_file($js_path . $this->controller . DS . $this->action . '.js')) {
	    	$scripts[] = $this->controller . '/' . $this->action;
		}
		return $this->script($scripts);
  	}

  	public function automaticCss()
  	{
  		$css = array();
  		if (isset($this->pluginPath)) {
	  		
			$css_path_plugin = $this->pluginPath . $this->constant['webroot'] . DS . $this->constant['cssBaseUrl'];
			if (is_file($css_path_plugin . $this->controller . '.css')) {
		    	$css[] = $this->plugin.'.'.$this->controller;
		  	}
		  	if (is_file($css_path_plugin . $this->controller . DS . $this->action . '.css')) {
		    	$css[] = $this->plugin.'.'.$this->controller . '/' . $this->action;
		  	}
  		}  		
  		$css_path = $this->constant['www_root'] . $this->constant['cssBaseUrl'];
  		if (is_file($css_path . $this->controller . '.css')) {
	    	$css[] = $this->controller;
		}
	  	if (is_file($css_path . $this->controller . DS . $this->action . '.css')) {
	    	$css[] = $this->controller . DS . $this->action;
		}
		return $this->css($css);
  	}

  	public function image($path, $options = array()) {
		$path = $this->assetUrl($path, $options + array('pathPrefix' => Configure::read('App.imageBaseUrl')));
		$options = array_diff_key($options, array('fullBase' => null, 'pathPrefix' => null));

		if(!is_array(@getimagesize($_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"].$path)))
			$path = "img/default.png";
		
		if (!isset($options['alt'])) {
			$options['alt'] = '';
		}

		$url = false;
		if (!empty($options['url'])) {
			$url = $options['url'];
			unset($options['url']);
		}

		$image = sprintf($this->_tags['image'], $path, $this->_parseAttributes($options));

		if ($url) {
			return sprintf($this->_tags['link'], $this->url($url), null, $image);
		}
		return $image;
	}

}