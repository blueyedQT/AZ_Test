			<div class="content">
 				<form class="form-inline" role="form" action="admin_login" method="post">
<?php 	if(!empty($errors)) { ?>
					<div class="alert alert-danger" role="alert">
						<span class="sr-only">Error:</span>
<?php 		echo $errors ?>
					</div>
<?php		} ?>		
			    <label class="sr-only" for="username">Username</label>
			    <input type="text" class="form-control" id="admin_user" name="username" placeholder="Username">
			  	<label class="sr-only" for="password">Email address</label>							    
			    <input type="password" class="form-control" id="admin_password" name="password" placeholder="Password">
				  <button type="submit" class="btn btn-primary">Log In!</button>
				</form>
			</div>
		</div><!-- closing container -->
	</body>
</html>