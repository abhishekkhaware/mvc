<?php
	
	class Validator
	{
		/**
		 * [isDigit Check If $param is in Digit]
		 * @param  [type]  $param [description]
		 * @return boolean        [description]
		 */
		public function isDigit($param)
		{
			if (ctype_digit($param)==false) {
				return "You Are Required To Enter Digit Only!!";
			}
		}
		public function isMoney($param)
		{
			if (!is_float($param) || !is_int($param)) {
				return "You Are Required To Enter Price Only!!";
			}
		}
		public function isphone($param,$size=10)
		{
			if (!preg_match("/^[0-9]{".$size."}+$/", $param)) {
				return "You Are Required To Enter $size Digit Phone Number!!";
			}
		}
		public function isAlphaNum($param)
		{
			if (ctype_alnum($param)==false) {
				return "You Are Required To Enter AlphaNumberic Character Only!!";
			}
		}
		public function isAlpha($param)
		{
			if (ctype_alpha($param)==false) {
				return "You Are Required To Enter Alphabet Character Only!!";
			}
		}
		public function isEmail($param)
		{
			if (!filter_var($param,FILTER_VALIDATE_EMAIL)) {
				return "You Are Required To Enter A Valid Email Address!!";
			}
		}
		public function minLength($data,$len)
		{
			if (strlen($data) < $len) {
				return "You Are Required To Enter Minimun: $len Value!!";
			}
		}
		public function maxLength($data,$len)
		{
			if (strlen($data) > $len) {
				return "You Are Required To Enter Maximun: $len Value!!";
			}
		}
		public function isMatched($param1=-1,$param2=NULL,$type='Password')
		{
			if ($param1!=$param2) {
				return "$type does not Match!!";
			}
		}
		public function isRequired($param)
		{
			if (!isset($param) || empty($param)) {
				return "$param Cannot be Blank!!";
			}
		}
		public function isFileOk($file,$option=array('type'=>array('image/jpeg','image/pjpeg'),'maxUploadSize'=>20480,'isOptional'=>false))
		{
            if($option['isOptional']){return;}
			$upload_errors=array(
					UPLOAD_ERR_OK =>"NO ERRORS.",
					UPLOAD_ERR_INI_SIZE =>"File is Larger Then upload_max_size.",
					UPLOAD_ERR_FORM_SIZE =>"File is Larger Then MAX_FILE_SIZE.",
					UPLOAD_ERR_PARTIAL =>"Partial Upload ERRORS.",
					UPLOAD_ERR_NO_FILE =>"NO FILE SELECTED. Please Upload A File.",
					UPLOAD_ERR_NO_TMP_DIR =>"NO Temporary Directory.",
					UPLOAD_ERR_CANT_WRITE =>"Can't Write to Disk.",
					UPLOAD_ERR_EXTENSION =>"File Upload Stopped by Extension."
				);
			if(!is_uploaded_file($file['tmp_name'])){
				return $upload_errors[$file['error']];
			}
			if (!in_array($file['type'], $option['type']) || $file['size'] > $option['maxUploadSize'] ) {
				return "File Not Allowed. Try Different!! ";
			}

		}
		public function __call($name, $arg)
		{
			throw new Exception("$name does not exists in ".__CLASS__);

		}
	}
 ?>