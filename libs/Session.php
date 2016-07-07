<?php

namespace Libs;

	class Session
	{
		
		public static function init()
		{
			@session_start();
		}
		public static function set($key,$value)
		{
			$_SESSION[$key]=$value;
		}
		public static function get($key)
		{
			if (isset($_SESSION[$key])) {
				return $_SESSION[$key];
			}
		}
		public static function destroy()
		{
			session_destroy();
		}
		public static function remove($key)
		{
			if (isset($_SESSION[$key])) {
				unset($_SESSION[$key]);
			}
			else{
				return false;
			}
		}
	}