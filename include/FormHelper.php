<?php 
	/**
	* 
	*/
//	require "Validator.php";
	class FormHelper
	{
		private $_postData=array();
		private $_currentItem=null;
		private $_error=array();
		public $_val=array();
	public function post($field)
	{
		$this->_postData[$field]=$_POST[$field];
		$this->_currentItem=$field;
		return $this;
	}
	public function file($field)
	{
		$this->_postData[$field]=$_FILES[$field];
		$this->_currentItem=$field;
		return $this;
	}

	public function request($field)
	{
		$this->_postData[$field]=$_REQUEST[$field];
		$this->_currentItem=$field;
		return $this;
	}
	public function fetch($fieldName=false)
	{
		if ($fieldName) {
			if (isset($this->_postData[$fieldName])) {
				return $this->_postData[$fieldName];
			}
			else{
				return false;
			}
		}else{
			return $this->_postData;
		}
	}
	public function Validator($validationType,$arg=NULL)
	{
		$_val=new Validator();
		if ($arg==NULL) {
			$error=$_val->{$validationType}($this->_postData[$this->_currentItem]);
		}else{
			$error=$_val->{$validationType}($this->_postData[$this->_currentItem],$arg);
		}
		if ($error) {
			$this->_error[$this->_currentItem]=$error;
		}
		return $this;
	}
	public function submit()
	{
        Session::set('old',$this->_postData);
        if (empty($this->_error)) {
            return true;
        }else{
            Session::init();
            Session::set('errors',$this->_error);
            $str='';
            foreach ($this->_error as $key => $value) {
                $str.=$key.','.$value.',';
            }
            $str=rtrim($str,',');
            throw new Exception($str);
        }
    }
}
 ?>