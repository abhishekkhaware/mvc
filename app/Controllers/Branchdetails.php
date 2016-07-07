<?php

namespace App\Controllers;

use Libs\BaseController;
use Libs\Session;
use Mailgun\Mailgun;

class Branchdetails extends BaseController{

        function __construct()
        {
            parent::__construct();
            Session::init();
            if (Session::get('loggedIn')!==TRUE) {
                header("location:".URL."login");
                exit;
            }
            $this->view->js=array('branch_detail/js/details.js');
        }

    public function index($limit=5)
    {
        $page=(isset($_GET['page'])? $_GET['page']: 1);
        $param['sort']=isset($_GET['sort'])? $_GET['sort']:'id';
        $param['direction']=isset($_GET['direction'])? $_GET['direction']: 'asc';
        if(isset($_GET['search_query'])){
            return $this->search($page,$limit,$param);
        }
        unset ($_GET['search_query']);
        $totalRecord=$this->model->totalRecord();
        $pagination=new \Pagination($page,$limit,$totalRecord);
        $this->view->offSet=$pagination->offset();
        if ($page < 1 || $page > $pagination->totalPages() ){
            $this->index($page=1);
            exit;
        }
        $this->view->createLinks=$pagination->createPaginationArea($pagination,$page);
        $this->view->details=$this->model->branchList($limit,$pagination->offset(),$param);
        $this->view->render("branch_detail/index");
    }
        public function add(){
            $this->view->render('branch_detail/add');
        }
        public function store(){
            if(($_SERVER['REQUEST_METHOD']==='POST') && isset($_POST['add-issue']) ){
                try{
                    $form=new \FormHelper();
                    $form->post('branch_name')
                       ->Validator('isRequired')
                       ->Validator('minLength',3)
                       ->Validator('maxLength',80)
                       ->post('branch_manager')
                       ->Validator('isRequired')
                       ->Validator('minLength',3)
                       ->Validator('maxLength',80)
                       ->post('location')
                       ->Validator('isRequired')
                       ->Validator('minLength',5)
                       ->post('email')
                       ->Validator('isEmail');
                   $form->submit();
                   $data=$form->fetch();
                   $bd=new \Branchdetail();
                   $bd->branch_name=$data['branch_name'];
                   $bd->branch_manager=$data['branch_manager'];
                   $bd->location=$data['location'];
                   $bd->location=$data['location'];
                   $bd->email=$data['email'];
                   $bd->save();
                   Session::set('message',"New Branch Added Successfully!");
                   header("location:".URL.'branchdetail/');
               }catch (\Exception $e){
//                   throw new Exception($e->getMessage());
                   header('location:'.URL.'branchdetail/add');
               }

            }else{
                header('location: '.URL);
            }
        }
    public function sendmessage($id){
        try{
            $form=new \FormHelper();
            $form->post('client-full-name')
                ->Validator('isRequired')
                ->Validator('minLength',3)
                ->Validator('maxLength',80)
                ->post('branch_manager')
                ->Validator('isRequired')
                ->Validator('minLength',3)
                ->Validator('maxLength',80)
                ->post('subject')
                ->Validator('isRequired')
                ->Validator('minLength',5)
                ->post('message')
                ->Validator('isRequired')
                ->Validator('minLength',5)
                ->post('client-email')
                ->Validator('isEmail')
                ->file('client-file')
                ->Validator('isFileOk',array('type'=>array('image/jpeg','image/pjpeg',
                                'application/msword','application/pdf','application/zip'),'maxUploadSize'=>4194304,'isOptional'=>true));
            $form->submit();
            $data=$form->fetch();
            $message=" Client Name: ".$data['client-full-name'];
            $message.="\n Client Email- ID: ".$data['client-email'];
            $message.="\n Message: \n\n".$data['message'];
            $mailgun= new Mailgun(MAILGUN_API_KEY);
            $email=\Branchdetail::first($id)->get_values_for(['email'])['email'];
            if(move_uploaded_file($_FILES['client-file']['tmp_name'],UPLOAD_DIR.$_FILES['client-file']['name'])){
                $file=UPLOAD_DIR.$_FILES['client-file']['name'];
                $mailgun->sendMessage(MAILGUN_DOMAIN, array('from'=> MAILGUN_FROM,
                        'to'      => $data['client-full-name']."<{$email}>",
                        'subject' => $data['subject'],
                        'text'    => $message),
                    array('attachment' => array("@{$file}")));
                unlink($file);
            }else{
                $mailgun->sendMessage(MAILGUN_DOMAIN, array('from'=> MAILGUN_FROM,
                        'to'      => $data['client-full-name']."<{$email}>",
                        'subject' => $data['subject'],
                        'text'    => $message));
            }
            Session::set('message',"Your Message Sent Successfully!");
            header("location:".URL.'branchdetail/');
        }catch (\Exception $e){
//            throw new Exception($e->getMessage());
            header("location:".URL.'branchdetail/');
        }
    }
    public function show( $branchDetail_id){
        try{
            $this->view->details=$this->model->showBranchIssues($branchDetail_id);
            $this->view->render('branch_detail/show');
        }
        catch(ActiveRecordException $e){
            echo $e->getMessage();
//            Session::set('errors', array("{$branchDetail_id}"=>'Does Not Exists'));
//            header('location:'.URL.'branchdetail/');
        }
    }
    public function showBranchIssuesInJson(){
        $branchDetail_id=$_GET['b_id'];
        echo $this->model->showBranchIssues($branchDetail_id)->to_json(array('include'=>'issues'));
    }
    public function search($page=1,$limit=10,$param){
        try{
            $form=new \FormHelper();
            $form->request('search_query')
                ->Validator('isRequired')
                ->request('searchBy')
                ->Validator('isRequired');
            $form->submit();
            $data=$form->fetch();
            $totalRecord=$this->model->totalSearch($data);
            $pagination=new \Pagination($page,$limit,$totalRecord);
            $this->view->details=$this->model->search($data,$limit,$pagination->offset(),$param);
            $this->view->createLinks=$pagination->createPaginationArea($pagination,$page);
            $this->view->render("branch_detail/index");
        }catch (\Exception $e){
//            throw new Exception($e->getMessage());
            header("location:".URL.'branchdetail/');
        }
    }
   }
?>