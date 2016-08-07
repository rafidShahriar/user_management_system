<?php
include_once ("../vendor/autoload.php");
use App\registration\Registration;

$obj = new Registration();
$obj->index();
include_once ("includes/header.php");
?>

<!-- Registration Form Start -->
<div class="container">
	<div class="row">
		<form role="form" method="post" action="signup_process.php">
			<div class="col-lg-6">
				<div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Fields</strong></div>
				<div class="form-group">
					<label for="InputName">Username*:</label>
					<input type="text" name="username" class="form-control" id="usr" placeholder="Username" required>
				</div>
				<div class="form-group">
				    <label for="pwd">Password*:</label>
				    <input type="password" name="pass" class="form-control" id="pwd" placeholder="Password" required>
				</div>
				<div class="form-group">
				    <label for="pwd">Confirm Password*:</label>
				    <input type="password" name="repass" class="form-control" id="repwd" placeholder="Confirm Password" required>
				</div>
				<div class="form-group">
				    <label for="email">Email address*:</label>
				    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
				</div>
				<input type="reset" value="Reset" class="btn btn-default ">
				<input type="submit" id="submit" value="Submit" class="btn btn-info pull-right">
			</div>
		</form>
		<div class="col-lg-5 col-md-push-1">
			<div class="col-md-12">
				<?php if (isset($_SESSION['Message'])) { ?>
				<div class="alert alert-success">
					<strong>
						<?php echo $_SESSION['Message'];
						unset($_SESSION['Message']);
						?>
					</strong>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<?php include_once ("includes/footer.php"); ?>