
<section class="main-container">
	<div class="media_title">
		<h1>Sign up</h1>
	</div>
	<form class="signup-form was-validated" action="<?php echo URL;?>Register\Signup"  method="Post">
		<fieldset>
			<label>Username</label>
			<input type="text" required name="username" placeholder="Enter Username">
			<div class="invalid-feedback"><?php if(isset($error) && $error==0 ) { echo "Invalid Username"; } ?></div>
		</fieldset>
		<fieldset>
			<label>Phone</label>
			<input type="text" required name="Phone" placeholder="Enter Phone Number">
			<div class="invalid-feedback"><?php if(isset($error) && $error==3 ) { echo "Invalid Phone"; } ?></div>
		</fieldset>
		<fieldset>
			<label>Email</label>
			<input type="email" required name="Email" placeholder="Enter Email Address">
			<div class="invalid-feedback"><?php if(isset($error) && $error==2 ) { echo "Invalid Email"; } ?></div>
		</fieldset>
		<fieldset>
			<label>Password</label>
			<input type="password" required name="pwd" placeholder="Enter Password">
		</fieldset>
		<fieldset>
			<label>Address</label>
			<input type="text" required name="Address" placeholder="Enter Address">
			<div class="invalid-feedback"><?php if(isset($error) && $error==1 ) { echo "Invalid Address"; } ?></div>
		</fieldset>
		<button type="submit" name="submit">Sign up</button>
	</form>
</section>
