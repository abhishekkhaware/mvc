<?php

namespace App\Controllers;

	use Libs\Auth;
	use Libs\BaseController;
	use Libs\Session;

	class Logins extends BaseController
	{

		function __construct()
		{
			parent::__construct();
            $this->view->css=array('login/css/login.css');
		}
		public function Index()
		{
            Session::init();
            if (Session::get('loggedIn')===TRUE) {
                header("location:".URL);
                exit;
            }
			$this->view->Render('login/index');
		}
		public function login()
		{
			if (Auth::login($_REQUEST['email'],$_REQUEST['password'])) {
				header("location:".URL."branchdetail");
			}
			else{
                Session::init();
                Auth::logout();
                Session::set('errors','Oops!! Invalid Credentials. Try Again.');
				header("location:".URL."login");
			}
		}
        public function logout()
        {
            Auth::logout();
            header("location:".URL."login");
        }
	}
 ?>