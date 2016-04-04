			<div class="content">
 				<h1>Welcome <?php echo $name ?>, to the AZTest Admin Dashboard!</h1>
 				<a class="btn btn-success" href="edit_admin/<?php echo $id ?>" role="button">Edit My Info</a>
 				
<!-- ### Display All Admin By Name and Admin Level ## -->
 				<div class="row">
	 				<div class="dashboard col-md-3">
	 					<h3>Admins</h3>
<?php 	foreach($admins as $admin) {
					if($admin['id'] !== $id) { ?>
						<a href="edit_admin/<?php echo $admin['id'] ?>"><p><?php echo $admin['first_name'] ?> <?php echo $admin['last_name']?></p></a>
<?php 		}
				} ?>
					</div>
					<a class="btn btn-warning col-md-2 col-md-offset-1" href="add_admin" role="button">Add Admin</a>
				</div>

<!-- ## Change Modal Text ## -->
				<h3>Change Popup Text</h3>
				<div class="html_editor">
					What it currently says.
					<!-- <?php highlight_file('testing.html'); ?> -->
				</div>

<!-- ## Upload, view, select PDF for report! ## -->
				<h3>PDF's And Reports</h3>
				
			</div>
		</div><!-- closing container -->
	</body>
</html>