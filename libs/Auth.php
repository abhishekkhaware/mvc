<?php

namespace Libs;

	class Auth
	{
		public static $user_id=NULL;
		public static $username=NULL;
		public static $email=NULL;
		public static function check($email,$password)
		{
			$db=new Database();
			$st= $db->prepare("SElECT * FROM users WHERE email=:email AND password=:password");
			$st->execute(array(
				':email'=>$email,
				':password'=>Hash::make($password)
				));
			$data=$st->fetch();
			$count=$st->rowCount();
			if ($count > 0) {
				self::$user_id=$data['id'];
				self::$username=$data['username'];
				self::$email=$data['email'];
				return TRUE;
			}
			return FALSE;
		}
		public static function login($username,$password)
		{
			if(self::check($username,$password)){
				Session::init();
				Session::set('loggedIn',TRUE);
				Session::set('id',self::$user_id);
				Session::set('username',self::$username);
				Session::set('email',self::$email);
				return true;
			}
			return false;
		}
		public static function logout()
		{
			Session::init();
			self::$user_id=NULL;
			self::$username=NULL;
			self::$email=NULL;
			Session::remove('loggedIn');
			Session::remove('id');
			Session::remove('username');
			Session::remove('email');
//			Session::destroy();
		}
	}