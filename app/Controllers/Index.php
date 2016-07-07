<?php

namespace App\Controllers;

use Libs\BaseController;

class Index extends BaseController
{
	function __construct() {
		parent::__construct();
	}

	public function index()
	{
		 $this->view->render('index/index');
	}
}