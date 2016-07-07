<div class="form-wrapper">
		<table class='table m20'>
		<caption ><h2 class="btn-info">Registered User..!!</h2></caption>
			<tr class="btn-success">
				<th>UserId</th>
				<th>UserName</th>
				<th>Email</th>
				<th>Role</th>
				<th colspan="2">Action</th>
			</tr>
		<?php foreach ($this->userList as $user => $value): ?>
			<tr>
				<td><?php echo  $value['user_id'] ?></td>
				<td><?php echo  $value['username'] ?></td>
				<td><?php echo  $value['email'] ?></td>
				<?php if($value['username']=='abhishekkhaware'): ?>
				<td>SUPER</td>
				<?php else: ?>
				<td><?php echo  $value['role'] ?></td>
				<?php endif; ?>
				<?php if($value['username']!='abhishekkhaware'): ?>
				<td><a href="<?php echo URL.'user/edit/'.$value['user_id'] ?>" class="button btn btn-warning">
					<i class="icon-edit icon-white"></i> EDIT</a></td>
				<td><a href="#" rel="<?php echo $value['user_id'] ?>" class="del button btn btn-danger">
					<i class="icon-remove icon-white"></i> DELETE</a></td>
				<?php else : ?>
					<td colspan="2">&nbsp;</td>
				<?php endif; ?>
			</tr>
			<?php endforeach; ?>
			<tr>
				<td colspan="6"><?php echo $this->createLinks; ?></td>
			</tr>
			<tr>
				<td colspan="6"><a href="<?php echo URL.'user/add' ?>" class="button btn pull-right btn-danger">
					<i class="icon-plus-sign icon-white"></i> Add New User</a></td>
			</tr>
		</table>
</div>