<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Admin - Northern Arizona Investment Property</title>

<!-- ## Just testing out bootstrap, if not need, need to delete allfiles ## -->
<!-- ## IF Bootstap is the choosen option (js or jquery too) I would like to use hosted files, not these links.  These are just for testing purposes ## -->
<!-- 		<link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->	
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>	
		<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
		<link rel="stylesheet" type="text/css" href="../assets/css/admin_styles.css">
	</head>
	<body>
			<div id="header">
				<div id="header_top"></div>
				<ul class="navigation_bar">
<?php if($loggedin == true) { ?>
					<a class="btn btn-primary" href="logout" role="button">Logout</a>
<?php } ?>
				</ul>
			</div>
			<div class="container">
