<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/global.css">
</head>
<body>
<div class="container">
	<div class="modals">
		<div class="login">
			<h3>Login</h3>
			<div class="errors">
				<?php if (isset($login_error)) echo $login_error; ?>
			</div>
			<div class="form-area">
				<form action="<?=base_url()?>home/login_validation" method="post">
					<label>Email: </label>
					<input type="text" name="login_email" placeholder="Email address" value="<?= $this->input->post('login_email') ?>"/><br>
					<label>Password: </label>
					<input type="password" name="login_password" placeholder="Password" /><br>
					<input type="submit" value="Login" />
				</form>
				<div class="clear"></div>
			</div>
		</div><!-- login -->

		<div class="register">
			<h3>Or Register</h3>
			<div class="errors">
				<?php if (isset($register_error)) echo $register_error; ?>
			</div>
			<div class="form-area">
				<form action="<?=base_url()?>home/register_validation" method="post">
					<label>First Name: </label>
					<input type="text" name="first_name" placeholder="First Name" value="<?= $this->input->post('first_name') ?>"/><br />
					<label>Last Name: </label>
					<input type="text" name="last_name" placeholder="Last Name" value="<?= $this->input->post('last_name') ?>"/><br />
					<label>Email Address: </label>
					<input type="text" name="email" placeholder="Email address" value="<?= $this->input->post('email') ?>"/><br />
					<label>Password: </label>
					<input type="password" name="password" placeholder="Password" /><br />
					<label>Confirm Password: </label>
					<input type="password" name="passconf" placeholder="Confirm Password" /><br />
					<input type="submit" value="Register" />
				</form>
				<div class="clear"></div>
			</div>
		</div><!-- register -->
	</div><!-- modals -->
</div>
</body>
</html>