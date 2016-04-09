			<div class="content">
 				<h1>Welcome to the Edit Admin Page!</h1>
				<form role="form" action="<?php echo base_url('/update_admin') ?>" method="post">
<?php if(!empty($errors)) {
				var_dump($errors);
			} ?>
					<fieldset class="form-group">
				    <label for="first_name">First Name</label>
				    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="<?php echo $admin['first_name'] ?>" value="<?php echo $admin['first_name'] ?>" >
				  </fieldset>
					<fieldset class="form-group">
				    <label for="last_name">Last Name</label>
				    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="<?php echo $admin['last_name'] ?>" value="<?php echo $admin['last_name'] ?>">
				  </fieldset>
 					<fieldset class="form-group">
				    <label for="username">Username</label>
				    <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $admin['username'] ?>" value="<?php echo $admin['username'] ?>">
				  </fieldset>
				  <input type="hidden" name="id" value="<?php echo $admin['id']?>">
				  <button type="submit" class="btn btn-primary">Edit!</button>
				</form>
				<a class="delete" href="<?php echo base_url('/delete_admin/' . $admin['id']) ?>">Delete This Admin</a></td>
			</div>
		</div><!-- closing container -->
	</body>
</html>