			<div class="content">
				<h1>Contact Us</h1>
				<h4>So we can serve your needs better, please fill out this short questionaire:</h4>

<! -- Error messages -- >
<?php 	if(!empty($errors)) { ?>
				<div class="alert alert-danger" role="alert">
					<span class="sr-only">Error:</span>
<?php 		echo $errors ?>
				</div>
<?php		} ?>

<!-- Optional success message -->
<?php 	if(!empty($message)) { ?>
				<div class="alert alert-success" role="success">
					<span class="sr-only">Message:</span>
<?php 	echo $message ?>
				</div>
<?php 	} ?>

<!-- Testing out this bootstrap form -->
				<form role="form" class="col-md-5" action="contact_form" method="post">
					<div class="form-group">
						<label for="invetment_type">I am interested in:</label>
						<select class="form-control" type="select" name="investment_type">
							<option>Long term investment property (buy and hold)</option>
							<option>Short term profit like a fix and flip</option>
							<option>Owner carry income</option>
						</select>
					</div>
					<div class="form-group">
						<label for="property_type">I am looking for investment:</label>
						<select class="form-control" type="select" name="property_type">
							<option>Land</option>
							<option>Residential rental homes</option>
							<option>Commercial properties</option>
						</select>
					</div>
					<div class="form-group">
						<label for="budget">I want to spend:</label>
						<select class="form-control" type="select" name="budget">
							<option>10K - 50K</option>
							<option>50K - 100K</option>
							<option>100K - 200K</option>
							<option>200K - 500K</option>
							<option>500K + </option>
						</select>
					</div>
					<div class="form-group">
						<label for="funds">I plan to purchase with:</label>
						<select class="form-control" type="select" name="funds">
							<option>Cash</option>
							<option>Loan</option>
							<option>Owner carry</option>
						</select>
					</div>
					<div class="form-group">
						<!-- Am considering making this a radio option -->
						<label for="manage">I plan on hiring someone to manage my property:</label>
						<select class="form-control" type="select" name="manage">
							<option>Yes</option>
							<option>No</option>
						</select>
					</div>
					<div class="form-group">
						<!-- Am considering making this a radio option -->
						<label for="partnership">I want to be part of an investment partnership:</label>
						<select class="form-control" type="select" name="partnership">
							<option>Yes</option>
							<option>No</option>
						</select>
					</div>
					<div class="form-group">
						<!-- Am considering making this a radio option -->
						<label for="personal_visit">I plan on coming to the area to see the property in person:</label>
						<select class="form-control" type="select" name="personal_visit">
							<option>Yes</option>
							<option>No</option>
						</select>
					</div>
					<div class="form-group">
						<label for="name">Name:</label>
						<input class="form-control" type="text" name="name" placeholder="John Doe">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input class="form-control" type="text" name="email" placeholder="johndoe@example.com">
					</div>
					<div class="form-group">
						<label for="phone">Phone:</label>
						<input class="form-control" type="text" name="phone" placeholder="555-123-4567">
					</div>
					<div class="form-group">
						<!-- Am considering making this a checkbox option -->
						<label for="contact_option">The best way to contact me is:</label>
						<select class="form-control" type="select" name="contact_option">
							<option>Email</option>
							<option>Phone</option>
						</select>
					</div>	
					<div class="form-group">
						<!-- Am considering making this a checkbox option -->
						<label for="contact_time">The best time to reach me is:</label>
						<select class="form-control" type="select" name="contact_time">
							<option>Daytime</option>
							<option>Afternoon</option>
							<option>Evening</option>
						</select>
					</div>	
					<div class="form-group">
						<label for="message">Message:</label>
						<input class="form-control" type="textarea" name="message">
					</div>		
					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-success">Submit</button>
					</div>
				</form>
<!-- end of testing form -->

			</div>
		</div><!-- closing container -->
	</body>
</html>