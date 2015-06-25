<html>
<head>
<title>Sign Up</title>
<link href="login-box.css" rel="stylesheet" type="text/css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
var u = false;
var p = false;
var e = false;
var n = false;
$(function () {
	$('#sub').click(function(){
		var errors = false;
		if($('#user').val()=="")
		{
			if(!u)
			$('#user').after('<span class="errors">Missing UserName</span>');
			errors = true;
			u = true;
		}
		if($('#pass').val()=="")
		{
			if(!p)
			$('#pass').after('<span class="errors">Missing Password</span>');
			errors = true;
			p=true;
		}
				if($('#email').val()=="")
		{
			if(!e)
			$('#email').after('<span class="errors">Missing Email</span>');
			errors = true;
			e=true;
		}
				if($('#n').val()=="")
		{
			if(!n)
			$('#n').after('<span class="errors">Missing Name</span>');
			errors = true;
			n=true;
		}
		if(errors)
			return false;
		else
			return true;
	});
});
</script>
</head>

<body>
<div id="login-box">

<H2>Sign Up</H2>

<form action = "submit.php" method="post">

<div id="signup-box-name">
Name:</div><div id="login-box-field" ><input type='text'  name='name' id='n' class="form-login" title="name"size="30" maxlength="30" /></div>
<div id="signup-box-name">
User Name:</div><div id="login-box-field" ><input type='text'  name='username' id='user' class="form-login" title="Username" size="30" maxlength="30" /></div>
<div id="signup-box-name">
Email:</div><div id="login-box-field" ><input type='text' name='email' id='email' class="form-login" title="Email" size="30" maxlength="40" /></div>
<div id="signup-box-name">
Password:</div><div id="login-box-field"><input name="password" type='password' id='pass' class="form-login" title="Password" size="30" maxlength="15" /></div>

<div id="submit">
<input type='image' id='sub' src="http://www.clker.com/cliparts/s/k/f/S/M/A/submit-button-png-md.png" width="103" height="42"name='login' />
</div>
</form>
<div id="submit">
<a href="index.php"><input type='image' src="http://www.clker.com/cliparts/j/6/l/f/Z/v/back-button-png-hi.png" width="103" height="42" name='back' /></a>
</div>
<?php
session_start();

if(!isset($_SESSION['duplicate']))
	$_SESSION['duplicate'] = false;

if($_SESSION['duplicate'])
{
	echo '<p> User name or Email already exist please try with different Email or user name.</p>';
	$_SESSION['duplicate'] = false;
}
?>

</div>

</body>
</html>