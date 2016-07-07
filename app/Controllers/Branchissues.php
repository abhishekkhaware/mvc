<?php
namespace App\Controllers;

use Libs\BaseController;
use Libs\Session;

class Branchissues extends BaseController{

        function __construct()
        {
            parent::__construct();
            Session::init();
            if (Session::get('loggedIn')!==TRUE) {
                header("location:".URL."login");
                exit;
            }
        }
        public function Index($limit=5)
        {
            $page=(isset($_GET['page'])? $_GET['page']: 1);
            $param['sort']=isset($_GET['sort'])? $_GET['sort']:'issue_ticket_created_at';
            $param['direction']=isset($_GET['direction'])? $_GET['direction']: 'asc';
            $totalRecord=$this->model->totalRecord();
            $pagination=new \Pagination($page,$limit,$totalRecord);
            $this->view->offSet=$pagination->offset();
            if ($page < 1 || $page > $pagination->totalPages() ){
                $this->Index($page=1);
                exit;
            }
            $this->view->createLinks=$pagination->createPaginationArea($pagination,$page);
            $this->view->issues=$this->model->branchIssueList($limit,$pagination->offset(),$param);
            $this->view->render("branch_issue/index");
        }
        public function search_by_ticket(){
            $q=isset($_GET['q-tkt'])? $_GET['q-tkt']: '';
            $this->view->issues=$this->model->search_by_ticket($q);
            $this->view->createLinks=NULL;
            $this->view->render("branch_issue/index");
        }

        public function add(){
            $this->view->render('branch_issue/add');
        }
        public function show(){
            $this->view->render('branch_issue/show');
        }
        public function response($issue_id){
            if($_SERVER['REQUEST_METHOD']==='POST' ){
                $_POST['status']=isset($_POST['status'])? 1: 0;
                try{
                    $form=new \FormHelper();
                    $form->post('status')
                        ->post('remark')
                        ->Validator('isRequired')
                        ->Validator('minLength',5);
                    $form->submit();
                    $data=$form->fetch();
                    $bi=\Branchissue::find($issue_id);
//                    dd((bool)$data['status']);
                    $bi->status=(bool)$data['status'];
                    $bi->result=$data['remark'];
                    $bi->issue_updated_at=new \DateTime();
                    $bi->save();
                    Session::set('message',"Respond Submitted Successfully!");
                    header('location:'.URL.'branchissue');
                }catch (\Exception $e){
//                   throw new Exception($e->getMessage());
                    header('location:'.URL.'branchissue');
                }

            }else{
                header('location:'.URL);
            }
        }
    }
?>