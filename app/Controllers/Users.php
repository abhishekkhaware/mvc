<?php
namespace App\Controllers;

use Libs\Auth;
use Libs\BaseController;
use Libs\Session;

class Users extends BaseController
{

	function __construct()
	{
		parent::__construct();
		Session::init();
		if (Session::get('loggedIn')!==TRUE) {
			header("location:".URL."login");
			exit;
		}
	}
	public function Index()
	{
		$this->pages();
		// $this->view->Render('user/index');
	}
	public function add()
	{
		$this->view->render('user/add');
	}
	public function create()
	{
		$this->model->create();
	}

	public function edit($id)
	{
		$this->view->user=$this->model->userById($id);
		if($this->view->user['username']=='abhishekkhaware'){
			header("location:".URL.'user');
			return true;
		}
		$this->view->render('user/edit');
	}
	public function editSave($id)
	{
		$this->model->editSave($id);
	}
	public function pages($page=1,$limit=4)
	{
		$totalRecord=$this->model->totalRecord();
		$pagination=new \Pagination($page,$limit,$totalRecord);
		$this->view->offSet=$pagination->offset();
		if ($page < 1 || $page > $pagination->totalPages() ){
			$this->index($page=1);
			exit;
		}
		$this->view->createLinks=$this->createPaginationArea($pagination,$page);
		$this->view->userList=$this->model->userList($limit,$pagination->offset());
		$this->view->render("user/index");
	}
	public function createPaginationArea($pagination,$page)
	{
		$area="<ul class='pagination' >";
		if ($pagination->totalPages() > 1) {
			if ($pagination->hasPrevPage()) {
				$area.="<li><a href=".URL."user/pages/".$pagination->prevPage()." > &laquo; Previous</a></li>";
			}
			for ($i=1; $i <= $pagination->totalPages(); $i++) {
				if ($i==$page) {
					$area.="<li><span class=active > {$i} </span></li>";
				}else{
					$area.="<li><a href=".URL."user/pages/{$i} > {$i} </a></li>";
				}
			}

			if ($pagination->hasNextPage()) {
				$area.="<li><a href=".URL."user/pages/".$pagination->nextPage()." >Next &raquo; </a></li>";
			}
		}
		$area.="</ul>";
		return $area;
	}

	public function delete($id)
	{
		$this->model->delete($id);
		header("location:".URL."user");
	}
	public function logout()
	{
		Auth::logout();
		header("location:".URL."login");
	}
}