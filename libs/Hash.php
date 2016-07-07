<?php

namespace Libs;

	class Hash
	{		
		public static function make($data,$algo='md5',$salt=PUBLIC_HASH_KEY)
		{
			$context=hash_init($algo,HASH_HMAC,$salt);
			hash_update($context, $data);
			return hash_final($context);
		}
	}
 ?>