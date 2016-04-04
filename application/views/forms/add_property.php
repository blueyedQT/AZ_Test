<form role="form" action="add_new_property" method="post">
<?php if(!empty($errors)) {
	var_dump($errors);
} ?>
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
				  		<option>Please Select</option>
<?php 	foreach($cities as $city) { ?>
							<option value="<?php echo $city['id'] ?>"><?php echo $city['city'] ?></option>
<?php 	} ?>
						</select>
					</fieldset>
				  <button type="submit" class="btn btn-primary">Add Property!</button>
				</form>