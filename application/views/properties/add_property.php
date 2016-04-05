			<div class="content">
 				<h1>Welcome to the Add Property Page!</h1>
				<form role="form" action="add_new_property" method="post" enctype="multipart/form-data">
<?php 	if(!empty($errors)) { ?>
					<div class="alert alert-danger" role="alert">
						<span class="sr-only">Error:</span>
<?php 		echo $errors ?>
					</div>
<?php		} ?>		
					<fieldset class="form-group">
				    <label for="address1">Address</label>
				    <input type="text" class="form-control" id="address" name="address1" placeholder="1234 Your Street">
				  </fieldset>
					<fieldset class="form-group">
				    <label for="address2">Address Two (Optional)</label>
				    <input type="text" class="form-control" id="address2" name="address2" placeholder="Additional address">
				  </fieldset>
				  <fieldset class="form-group">
				  	<label for="city">City</label>
				  	<select class="form-control" type="select" name="city">
				  		<option value="none" selected="selected">Please Select</option>
<?php 	foreach($cities as $city) { ?>
							<option value="<?php echo $city['id'] ?>"><?php echo $city['city'] ?></option>
<?php 	} ?>
						</select>
					</fieldset>
					<fieldset class="form-group">
						<input type="file" name="userfile" />
	    		</fieldset>
					<button type="submit" class="btn btn-primary">Add Property!</button>
				</form>
			</div>
		</div><!-- closing container -->
	</body>
</html>