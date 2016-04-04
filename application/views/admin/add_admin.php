			<div class="content">
 				<h1>Welcome to the Add Admin Page!</h1>
				<form role="form" action="register_admin" method="post">
<?php if(!empty($errors)) {
	var_dump($errors);
} ?>
					<fieldset class="form-group">
				    <label for="first_name">First Name</label>
				    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
				  </fieldset>
					<fieldset class="form-group">
				    <label for="last_name">First Name</label>
				    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
				  </fieldset>
 					<fieldset class="form-group">
				    <label for="username">Username</label>
				    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
				  </fieldset>
				  <fieldset class="form-group">	
				  	<label for="password">Password</label>							    		
				    <input type="password" class="form-control" id="password" name="password" placeholder="you@yourdomain.com">
				  </fieldset>
				  <button type="submit" class="btn btn-primary">Add!</button>
				</form>
			</div>
		</div><!-- closing container -->
	</body>
</html>