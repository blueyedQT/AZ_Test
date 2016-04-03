<!doctype html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<title>Northern Arizona Investment Property Contact From Request</title>
	</head>
	<body>
		<h3>Contact Request</h3>
		<div style="width:300px; padding:20px; background-color:lightgray; border:1px solid black;">
			<p><?php echo $name ?></p>
<?php 	if($contact_option == "Email") { ?>
			<p><strong><?php echo $email ?></strong></p>
			<p><?php echo $phone ?></p>
<?php 	} else if($contact_option == "Phone") { ?>
			<p><strong><?php echo $phone ?></strong></p>
			<p><?php echo $email ?></p>
<?php 	} ?>
			<p>Time: <?php echo $contact_time ?></p>
		</div>
		<p>Message: <?php echo $message ?></p>
		<p>Intested In: <?php echo $investment_type ?></p>
		<p>Property Type: <?php echo $property_type ?></p>
		<P>Budget: <?php echo $budget ?></p>
		<p>Funds: <?php echo $funds ?></p>
		<p>Manage: <?php echo $manage ?></p>
		<p>Partnership: <?php echo $partnership ?></p>
		<p>Visit in person: <?php echo $personal_visit ?></p>
	</body>
</html>