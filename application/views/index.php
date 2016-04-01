			<!-- <div id="welcome_image"></div> --> <!-- featured image -->
			<div class="content">

				<!-- modal practice -->
				<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static"><!-- can add fade into class -->
	  			<div class="modal-dialog">
	      		<div class="modal-content">
	      			<!-- Header-->
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">
									<span aria-hidden="true">&times;</span>
									<span class="sr-only">Close</span>
								</button>
								<h4 class="modal-title" id="myModalLabel"><i>Warning:  Don't get caught buying worthless land from scammers!  Find out how to Avoid Arizona Land Scams!!</i></h4>
							</div>
							<!-- Body -->
							<div class="modal-body">
		     				<p>
		     					Sign up now for our FREE Newsletter and receive our FREE Bonus Arizona Land Scam Report and Arizona Land Buyer's Guide.
		     				</p>
		     				<form role="form" action="free_report_signup" method="post">
		     					<fieldset class="form-group">
								    <label for="first_name">First Name</label>
								    <input type="text" class="form-control" id="name" name="first_name" placeholder="Your Name Here">
								  </fieldset>
								  <fieldset class="form-group">	
								  	<label for="email">Email address</label>							    
<?php 	if(!empty($errors)) { ?>
										<div class="alert alert-danger" role="alert">
											<span class="sr-only">Error:</span>
<?php 		echo $errors ?>
										</div>
<?php		} ?>			
								    <input type="email" class="form-control" id="email" name="email" placeholder="you@yourdomain.com">
								    <small class="text-muted">We'll never share your email with anyone else.</small>
								  </fieldset>
								  <button type="submit" class="btn btn-primary">Sign Me Up!</button>
								</form>
							</div>
							<!-- Footer -->
							<div class="modal-footer">
							</div>
		        </div>
		    	</div>
				</div>
				<!-- End Practice Zone -->

				<div class="jumbotron">		
					<h2>Welcome To Arizona Investment Property</h2>
					<p>Stay tuned, the unveiling of the site is Coming Soon!</p>

<!-- Optional success message -->
<!-- <?php 	if(!empty($message)) { ?>
				<div class="alert alert-success" role="success">
					<span class="sr-only">Message:</span>
<?php 		echo $message ?>
				</div>
<?php 	} ?> -->

				</div>
			</div>
		</div><!-- closing container -->
	</body>
</html>