<?php

namespace App\Controllers;

use Libs\BaseController;

class Errors extends BaseController
{
	function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		$this->view->render("error/index");
	}
}