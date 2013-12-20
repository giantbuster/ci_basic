<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/global.css">
</head>
<body>
<div class="container">
	<div class="profile">
		<div class="header">
			<h1>Welcome <?= $this->session->userdata('first_name')?>!</h1>
			<div class="logoff">
				<a href="<?= base_url() ?>home/log_out">log off</a>
			</div>
		</div>
		<div class="clear">
		<div class="information">
			<h3>User Information</h3>
			<p>First Name: <?= $this->session->userdata('first_name')?></p>
			<p>Last Name: <?= $this->session->userdata('last_name')?></p>
			<p>Email Address: <?= $this->session->userdata('email')?></p>
		</div>
	</div>
</div>
</body>
</html>