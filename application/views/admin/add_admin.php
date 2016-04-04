			<div class="content">
 				<h1>Welcome to the Add Admin Page!</h1>
				<a class="btn btn-primary" href="logout" role="button">Logout</a>
				<form role="form" action="add_new_admin" method="post">
 					<fieldset class="form-group">
				    <label for="username">Username</label>
				    <input type="text" class="form-control" id="username" name="username" placeholder="Your Name Here">
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