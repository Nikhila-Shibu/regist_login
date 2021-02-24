<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style>
	form{
		margin:10px;
		padding:15px;
		height :200px;
		width:100px;

	}
</style>
<body>
<form method="post" action="<?php echo base_url()?>main/log_use">
	<fieldset>
		emailid:<input type="email" name="email" placeholder="enter your email"><br>
		password:<input type="password" name="password" placeholder="enter your password"><br>
		<input type="submit" value="login">
	</fieldset>
</form>
</body>
</html>