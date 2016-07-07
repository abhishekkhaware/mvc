<?php

namespace Libs;

class BaseController
{
	public function __construct()
	{
		$this->view=new View();
    }
    public function loadModel($name)
	{
        $file=__MODELS__.ucfirst($name).'.php';
        if (file_exists($file)) {
//            require $file;
            $modelName=ucwords($name);
            $this->model=new $modelName();
		}
	}
}