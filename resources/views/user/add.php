<?php
	Session::init();
 	if(Session::get('flagMsg')): ?>
<div class="errors alert alert-success">
	<h4>
		<?php 
			echo Session::get('flagMsg');
			Session::remove('flagMsg');
		 ?>
 	</h4>
</div>
<?php endif; ?>
<?php
 	if(Session::get('errors')): ?>
<div class="errors alert alert-error">
	You have Following Error(s):
	<h4>
		<ul>
			<?php 
				$errors=$this->decryptErrors(Session::get('errors'));
				foreach ($errors as $key=> $error) {
					echo "<li>For ".ucfirst($key).", {$error}</li>";
				}
				Session::remove('errors');
			 ?>
		 </ul>
	 </h4>
</div>
<?php endif; ?>
<div class="form-wrapper">
	<form action="create" method="post">
		<table class='table m20 table-bordered'>
			<tr class="btn-info text-center">
				<th colspan="2" ><h2 >Registration Form..!!</h2></th>
			</tr>
			<tr>
				<td><label for='username'>UserName:</label></td>
				<td><input type='text' name='username' required class='text-center'></td>
			</tr>
			<tr>
				<td><label for='password'>Password:</label></td>
				<td><input type='password' name='password' required class='text-center'></td>
			</tr>
			<tr>
				<td><label for='confirm_password'>Re-Password:</label></td>
				<td><input type='password' name='confirm-password' required class='text-center'></td>
			</tr>
			<tr>
				<td><label for='role'>Role:</label></td>
				<td><select name="role" required>
					<option value="default">Default</option>
					<option value="admin">Admin</option>
				</select>
				</td>
			</tr>
			<tr>
				<td><label for='email'>Email:</label></td>
				<td><input type='email' name='email' required class='text-center'></td>
			</tr>
			<tr class="btn-info">
				<td colspan=2><input type='submit' name='reg' value='Add New User' class='btn-small btn-danger pull-right'></td>
			</tr>

		</table>
	</form>
</div>