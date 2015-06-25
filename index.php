
<html>
<head>
<title>Login Box</title>
<link href="login-box.css" rel="stylesheet" type="text/css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$(function () {
		$('#login').click(function(){
			var errors = false;
			if($('#user').val()=="")
			{
				$('#error').html('Missing Name');
				errors = true;
			}
			else
			{
				$('#error').html(' ');
			}
			if($('#pass').val()=="")
			{
				$('#perror').html('Missing Password');
				errors = true;
			}
			else
			{
				$('#perror').html(' ');
			}
			if(errors)
				return false;
			/*else
			{
				var user_name = $("#user").val();
				var user_pass = $("#pass").val();
				var rem = $("#rem").attr("checked",true).val();
				alert(rem);
				$.ajax({
					url:'test.php',
					data:{name:user_name,pass:user_pass},
					type:'POST',
					success:function(data){
						$('#login-box').hide();
						$("#result").html(data);
					}
				});
			}*/
		});
	});
});
</script>
</head>

<body>
<div id="result"> </div>
<div id="login-box">

<H2>Login</H2>

<form action = "login.php" method = "post">
<div id="name">
User Name:</div><div id="login-box-field" ><input type='text' name='username' class="form-login" id ="user" title="Username" <?php if(isset($_COOKIE['id']))echo "value = ".$_COOKIE['id']; ?> size="30" maxlength="2048" />
<div id="error" class ="er"></div>
</div>

<div id="name">
Password:</div><div id="login-box-field"><input name="password" type="password" class ="form-login" id="pass" title="Password" <?php if(isset($_COOKIE['pass']))echo "value = ".$_COOKIE['pass'];?> size="30" maxlength="2048" />
<div id="perror" class ="er"></div>
</div>
<div id="remember">
<input type="checkbox" id="rem" name="remember" <?php if(isset($_COOKIE['id'])) echo "checked =check"?> >Remember me</div>
<div id="newid"><a href ="newAcount.php">Create new account</a></div>
<div id="button">
<input type='image' id='login' src="http://www.clker.com/cliparts/m/m/x/r/J/6/login-button-png-hi.png" width="103" height="42"name='login' />
</div>

</form>
</div>

<?php
session_start();
if(!isset($_SESSION['wrong']))
	$_SESSION['wrong'] = false;

if($_SESSION['wrong'])
{
	echo"<p>User name or password incorrect</p>";
	$_SESSION['wrong'] = false;
}
if(isset($_SESSION['current_user']))
	echo header("Location:logged.php");
	
?>

</body>
</html>
