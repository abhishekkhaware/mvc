<?php

namespace Libs;

use App\Controllers\Index;

class Bootstrap
{
	private $_url=null;
	private $_controller=null;

	public function __init()
	{
		$this->__getUrl();
		if (empty($this->_url[0])) {
			$this->__loadDefaultController();
			return false;
		}
		$this->__loadExistingController();
		$this->__loadControllerMethod();


	}
	private function __getUrl()
	{
		$url=isset($_GET['url'])? $_GET['url'] : null;
		$url= rtrim($url,'/');
		$url=filter_var($url,FILTER_SANITIZE_URL);
		$this->_url=explode('/', $url);
	}
	private function __loadDefaultController()
	{
		require __CONTROLLERS__.'Index.php';
		$this->_controller=new Index();
		$this->_controller->loadModel( 'Index' );
		$this->_controller->index();
	}
	private function __loadExistingController()
	{
		$file=__CONTROLLERS__.ucwords($this->_url[0]).'s.php';
		if(file_exists($file)){
//			require $file;
            $cc=ucwords($this->_url[0]).'s';
            $cc = "\\App\\Controllers\\{$cc}";
			$this->_controller=new $cc;
            $this->_controller->loadModel( $this->_url[0] );
        }else{
			$this->error();
		}
	}
	private function __loadControllerMethod()
	{
		# Find if controller exist
		# if controller does not exist call error method.
		$length=count($this->_url);
			if ($length > 1) {
				if(!method_exists($this->_controller, $this->_url[1])){
					$this->error();
				}
			}
		# if controller exist load the controller's method
			switch ($length) {
				case 5:
					$this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3],$this->_url[4]);
					break;
				case 4:
					$this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3]);
					break;
				case 3:
					$this->_controller->{$this->_url[1]}($this->_url[2]);
					break;
				case 2:
					$this->_controller->{$this->_url[1]}();
					break;
				default:
					$this->_controller->Index();
					break;
			}
	}
	function error(){
//		require __CONTROLLERS__.'Error.php';
		$this->_controller=new \Errors();
		$this->_controller->Index();
		exit();

	}
}