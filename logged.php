<?php
include 'db_connect.php';
session_start();
$id=$_SESSION['current_user'];
/*$query="select * from userprofile where uid=$id";
$result = mysql_query($query,$con);
$row = mysql_fetch_row($result);
if($row>0)
	header("Location:show_profile.php");*/
if(isset($_POST['logout']))
{
	unset($_SESSION['current_user']);
	setcookie('login','true', time()-100);
}

if(!isset($_SESSION['current_user']))
{
	header("Location:index.php");
}

?>
<html>
<head>
<link href="login-box.css" rel="stylesheet" type="text/css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$(function () {
		$('#submit').hide();
		$('#basic').hide();
		$('#school').hide();
		$('#university').hide();
		$('#personal').hide();
		$('#b').click(function(){
			$('#basic').toggle(500);
			if( $( "#basic" ).is( ":visible" ))
			$('#submit').show(500);
		else 
			$('#submit').hide(500);
			$('#school').hide();
			$('#university').hide();
			$('#personal').hide();
			$('#display').hide();
			if( $( "#basic" ).is( ":visible" ))
			{
				$('#submit').click(function(){
					
				var fname = $("#fname").val();
				var lname = $("#lname").val();
				var bday = $("#bday").val();
				var gender = $("input:radio[name=gender]").val();

				$.ajax({
					url:'test.php',
					data:{fname:fname,lname:lname,bday:bday,gender:gender,type:"basic"},
					type:'POST',
					success:function(data){
						$('#b').hide();
						$('#basic').hide();
						alert(data);
					}
				});
					
				});
			}
		});
		
				$('#s').click(function(){
			$('#school').toggle(500);
			if( $( "#school" ).is( ":visible" ))
			$('#submit').show(500);
		else 
			$('#submit').hide(500);
			$('#basic').hide();
			$('#university').hide();
			$('#personal').hide();
			$('#display').hide();
			if( $( "#school" ).is( ":visible" ))
			{
				$('#submit').click(function(){
					
				var sname = $("#sname").val();
				var cname = $("#cname").val();
				var cdegree = $("#cdegree").val();
				var cmarks = $("#cmarks").val();

				$.ajax({
					url:'test.php',
					data:{sname:sname,cname:cname,cdegree:cdegree,cmarks:cmarks,type:"school"},
					type:'POST',
					success:function(data){
						$('#s').hide();
						$('#school').hide();
						alert(data);
					}
				});
					
				});
			}
		});
		
				$('#u').click(function(){
			$('#university').toggle(500);
			if($( "#university" ).is( ":visible" ))
			$('#submit').show(500);
		else 
			$('#submit').hide(500);
			$('#school').hide();
			$('#basic').hide();
			$('#personal').hide();
			$('#display').hide();
			
			if( $( "#university" ).is( ":visible" ))
			{
				$('#submit').click(function(){
					
				var uname = $("#uname").val();
				var udegree = $("#udegree").val();
				var cgpa = $("#cgpa").val();

				$.ajax({
					url:'test.php',
					data:{uname:uname,udegree:udegree,cgpa:cgpa,type:"university"},
					type:'POST',
					success:function(data){
						$('#s').hide();
						$('#school').hide();
						alert(data);
					}
				});
					
				});
			}
		});
		
			$('#p').click(function(){
			$('#personal').toggle(500);
			if($( "#personal" ).is( ":visible" ))
			{
				$('#submit').show(500);
			}
			else
			{
				console.log($( "#submit" ).is( ":visible" ));
				$('#submit').hide(500);
			}
			
			$('#school').hide();
			$('#university').hide();
			$('#basic').hide();
			$('#display').hide();
			
			if( $( "#personal" ).is( ":visible" ))
			{
				$('#submit').click(function(){
					
				var hobby = $("#hobby").val();
				var expert = $("#expert").val();
				var about = $("#about").val();

				$.ajax({
					url:'test.php',
					data:{hobby:hobby,expert:expert,about:about,type:"personal"},
					type:'POST',
					success:function(data){
						$('#s').hide();
						$('#school').hide();
						alert(data);
					}
				});
					
				});
			}
		});
		
			$('#dp').click(function(){
			//$('#display').toggle(500);
			$('#school').hide();
			$('#university').hide();
			$('#basic').hide();
			$('#personal').hide();
			$('#display').toggle(500);

				$.ajax({
					url:'show_profile.php',
					data:{},
					type:'POST',
					success:function(data){
						$("#display").html(data);
					}
				});
		});
	});
});

				/*var user_name = $("#user").val();
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
				});*/
</script>
</head>

<body>
<form action = "logged.php" method = "post">
<input type="submit" id="logout" name='logout'value="Logout"/>
</form>
<p>Successfully Login </br> Please complete your profile</p>
<div id = "result"></div>
<div id = "menu">
<ul>
		<li><input type='button'  id = "b" value = "Basic" width="103" height="42" /></li>
		<li><input type='button'  id = "s" value = "School" width="103" height="42"  /></li>
		<li><input type='button'  id = "u" value = "University" width="103" height="42"  /></li>
		<li><input type='button'  id = "p" value = "Personal" width="103" height="42"  /></li>
		<li><input type='button'  id = "dp" value = "Display Profile" width="103" height="42"  /></li>
</ul>
</div>

<div id="basic">
<div id="profile">
<H2>Basic</H2>
<div id="login-box-name">
First Name:</div><div id="login-box-field" ><input type='text' input id='fname' class="form-login" title="Username" size="30" maxlength="30" /></div>
<div id="ferror"></div>
<div id="login-box-name">
Last Name:</div><div id="login-box-field" ><input type='text' input id='lname' class="form-login" title="Username" size="30" maxlength="30" /></div>
<div id="lerror"></div>
<div id="login-box-name">
Date of Birth:</div><div id="login-box-field" ><input type='date' input id='bday' class="form-login" title="Username" size="30" maxlength="30" /></div>
<div id="bderror"></div>
<div id="login-box-name">
Gender:</div>
<div id="gender" ><input type="radio" name="gender" value="Male">Male</br>
<input type="radio" name="gender" value="Female">Female</div>
<div id="gerror"></div>
</div>
</div>

<div id="school">
<div id="profile">
<H2>School / College</H2>
<div id="login-box-name">
School Name:</div><div id="login-box-field" ><input type='text' input id='sname' class="form-login" title="Username" size="30" maxlength="40" /></div>
<div id="login-box-name">
College Name:</div><div id="login-box-field" ><input type='text' input id='cname' class="form-login" title="Username" size="30" maxlength="40" /></div>
<div id="login-box-name">
College Degree:</div><div id="login-box-field" ><input type='text' input id='cdegree' class="form-login" title="Username" size="30" maxlength="30" /></div>
<div id="login-box-name">
College Marks:</div><div id="login-box-field" ><input type='text' input id='cmarks' class="form-login" title="Username" size="30" maxlength="30" /></div>
</div>
</div>

<div id="university">
<div id="profile">
<H2>University</H2>
<div id="login-box-name">
University Name:</div><div id="login-box-field" ><input type='text' input id='uname' class="form-login" title="Username" size="40" maxlength="30" /></div>
<div id="login-box-name">
University Degree:</div><div id="login-box-field" ><input type='text' input id='udegree' class="form-login" title="Username" size="20" maxlength="30" /></div>
<div id="login-box-name">
CGPA:</div><div id="login-box-field" ><input type='text' input id='cgpa' class="form-login" title="Username" size="30" maxlength="30" /></div>
</div>
</div>

<div id="personal">
<div id="profile">
<H2>Personal</H2>
<div id="login-box-name">
Hobbies:</div><div id="login-box-field" ><input type='text' input id='hobby' class="form-login" title="Username" size="100" maxlength="30" /></div>
<div id="login-box-name">
Expertise:</div><div id="login-box-field" ><input type='text' input id='expert' class="form-login" title="Username" size="100" maxlength="30" /></div>
<div id="login-box-name">
About me:</div><div id="login-box-field" ><textarea rows="4" cols="50" class ="form-login" id='about'></textarea></div>
</div>
</div>
<div id="display"></div>
<input type='image' id="submit" src="http://www.clker.com/cliparts/s/k/f/S/M/A/submit-button-png-hi.png" width="103" height="42"name='submit'  />
</body>

</html>
