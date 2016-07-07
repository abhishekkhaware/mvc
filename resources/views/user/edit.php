<?php
	Session::init();
 	if(Session::get('flagMsg')): ?>
<div class="errors alert alert-success">
	<a href="#" class="close" data-dismiss="alert">x</a>
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
	<a href="#" class="close" data-dismiss="alert">x</a>
	You have Following Error(s):
	<h4>
		<ul>
			<?php
				$errors=$this->decryptErrors(Session::get('errors'));
				foreach ($errors as $error) {
					echo "<li>{$error}</li>";
				}
				Session::remove('errors');
			 ?>
		 </ul>
	 </h4>
</div>
<?php endif; ?>
<div class="form-wrapper" >
	<form action="<?php echo URL.'user/editSave/'.$this->user['user_id'] ?>" method="post">
		<table class='table m20 table-bordered'>
			<tr class="btn-info text-center">
				<th colspan="2" ><h2>Update User Details.</h2></th>
			</tr>
			<tr>
				<td><label for='username'>UserName:</label></td>
				<td><input type='text' name='username' disabled value="<?php echo $this->user['username'] ?>" required class='text-center'></td>
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
					<option value="default" <?php if ($this->user['role']=='default') {
						echo "Selected";
					} ?> >Default</option>
					<option value="admin" <?php if ($this->user['role']=='admin') {
						echo "Selected";
					} ?> >Admin</option>
				</select>
				</td>
			</tr>
			<tr>
				<td><label for='email'>Email:</label></td>
				<td><input type='email' name='email' value="<?php echo $this->user['email'] ?>" required class='text-center'></td>
			</tr>
			<tr class="btn-info">
				<td colspan=2><input type='submit' name='update' value='Update' class='btn-small btn-danger pull-right'></td>
			</tr>

		</table>
	</form>
</div>