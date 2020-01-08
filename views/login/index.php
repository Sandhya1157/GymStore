
<section class="main-container">
	<form class="signup-form" action="<?php echo URL;?>login\logincheck" method="POST">
		<fieldset>
			<label>Email</label>
			<input type="text" required name="uid" placeholder="Enter your e-mail address">
		</fieldset>
		<fieldset>
			<label>Password</label>
			<input type="password" required name="pwd" placeholder="Enter your password">
		</fieldset>
		<button type="submit" name="submit">Login</button>
	</form>
</section>