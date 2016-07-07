<div class="container">
	<?php
		\Libs\Session::init();
	 	if(\Libs\Session::get('errors')): ?>
	<div class="alert alert-danger text-center alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-hidden="true">x</a>
<!--		You have Following Error(s):-->
		<h4>
        <?php
			echo \Libs\Session::get('errors');
			\Libs\Session::remove('errors');
		 ?> </h4>
	</div>
	<?php endif; ?>
	<div class="login col-md-6 col-md-push-2" >
        <h2 class="text-danger">Login Form..!!</h2>
        <form action="login/login" class="form" method="post">
            <input type='email' name='email' required placeholder="Type Email ID Here..." class='text-center'>
            <input type='password' name='password' required placeholder="Type Password Here" class='text-center'>
            <input type='submit' name='login' value='Login' class='btn submit pull-right'>
		</form>
	</div>
</div>