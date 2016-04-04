			<div class="content">
 				<h1>Welcome to the Edit Admin Page!</h1>
				<form role="form" action="/update_admin" method="post">
<?php if(!empty($errors)) {
	var_dump($errors);
} ?>
					<fieldset class="form-group">
				    <label for="first_name">First Name</label>
				    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="<?php echo $first_name ?>" value="<?php echo $first_name ?>" >
				  </fieldset>
					<fieldset class="form-group">
				    <label for="last_name">Last Name</label>
				    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="<?php echo $last_name ?>" value="<?php echo $last_name ?>">
				  </fieldset>
 					<fieldset class="form-group">
				    <label for="username">Username</label>
				    <input type="text" class="form-control" id="username" name="username" placeholder="<?php echo $username ?>" value="<?php echo $username ?>">
				  </fieldset>
				  <input type="hidden" name="id" value="<?php echo $id ?>">
				  <button type="submit" class="btn btn-primary">Edit!</button>
				</form>
			</div>
		</div><!-- closing container -->
	</body>
</html>