<?php

namespace App\Models;

use Libs\BaseModel;

class UserModel 
{

	function __construct()
	{
		parent::__construct();
	}
	public function create()
	{
		if (isset($_REQUEST['reg']) ){
			try {
				$form=new FormHelper();
				$form->post('username')
					 ->Validator('minLength',8)
					 ->Validator('maxLength',40)
					 ->Validator('isAlphaNum')
					 ->post('password')
					 ->Validator('minLength',6)
					 ->post('confirm-password')
					 ->Validator('isMatched',$form->fetch('password'))
					 ->post('email')
					 ->Validator('isEmail')
					 ->post('role')
					 ->Validator('isAlpha');
				$form->submit();
				$data= $form->fetch();
			$data['password']=Hash::make($data['password']);
			unset($data['confirm-password']);
			date_default_timezone_set("Asia/Calcutta");
			$dt = date('Y-m-d H:i:s', time());
			$data['created_at']=$dt;
			$data['updated_at']=$dt;
			$this->db->insert('users',$data);
			Session::init();
			Session::set('flagMsg',"New User Added Successfull!!");
			header("location:".URL."user/add");
			} catch (Exception $e) {
				Session::init();
				Session::set('errors',$e->getMessage());
				header("location:".URL."user/add");
			}
		}else{
			header("location:".URL."user");
		}
	}
	public function userList($limit=5,$offset=0)
	{
		return $this->db->select("SELECT * FROM users LIMIT $limit OFFSET $offset");
	}
	public function userById($id,$limit=1)
	{
		$res=$this->db->select("SELECT * FROM users WHERE user_id=$id LIMIT $limit");
		return $res[0];
	}
	public function totalRecord()
	{
		return (int)count($this->db->select("SELECT user_id FROM users"));
	}
	public function editSave($id)
	{
		if (isset($_REQUEST['update']) ){
			try {
				$form=new FormHelper();
				$form->post('username')
					 ->Validator('minLength',8)
					 ->Validator('maxLength',40)
					 ->Validator('isAlphaNum')
					 ->post('password')
					 ->Validator('minLength',6)
					 ->post('confirm-password')
					 ->Validator('isMatched',$form->fetch('password'))
					 ->post('email')
					 ->Validator('isEmail')
					 ->post('role')
					 ->Validator('isAlpha');
				$form->submit();
				$data= $form->fetch();
			$data['password']=Hash::make($data['password']);
			unset($data['confirm-password']);
			date_default_timezone_set("Asia/Calcutta");
			$dt = date('Y-m-d H:i:s', time());
			$data['updated_at']=$dt;
			$this->db->update('users',$data,"user_id=$id");
			Session::init();
			Session::set('flagMsg',"User's Record Updated Successfully!!");
			header("location:".URL."user/edit/{$id}");
			} catch (Exception $e) {
				Session::init();
				Session::set('errors',$e->getMessage());
				header("location:".URL."user/edit/{$id}");
			}
		}else{
			header("location:".URL."user/edit/{$id}");
		}
	}
	public function delete($id)
	{
		$this->db->delete("users","user_id=$id");
	}
}