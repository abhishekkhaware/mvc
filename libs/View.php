<?php

namespace Libs;

class View
{
	/**
	 * Display The View page. Includes header, Page Contains and Footer of the rendered Page.
	 * @param string  $name      Name of the page for which contents will be render.
	 * @param boolean $noInclude weather to include Header and Footer or Not.
	 */
	function render($name, $noInclude=false)
	{
		if ($noInclude===true) {
			require __VIEWS__.$name.'.php';
		} else {
			require __VIEWS__.'header.php';
			require __VIEWS__.$name.'.php';
			require __VIEWS__.'footer.php';
		}
	}
}

 ?>