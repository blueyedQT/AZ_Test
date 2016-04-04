			<div class="content">
 				<h1>Welcome to the Admin Dashboard!</h1>
 				<div class="row">
	 				<div class="dashboard col-md-3">

<!-- ### Display All Admin By Name and Admin Level ## -->
	 					<h3>Admins</h3>
<?php 	foreach($admins as $admin) { ?>
						<p><?php echo $admin['username'] ?></p>
<?php 	} ?>
					</div>
					
					<a class="btn btn-warning col-md-2 col-md-offset-1" href="add_admin" role="button">Add Admin</a>
				</div>
<!-- ## Display Admin Name and Welcome Message ## -->
<!-- ## Change Modal Text ## -->
<!-- ## Upload, view, select PDF for report! ## -->
			</div>
		</div><!-- closing container -->
	</body>
</html>