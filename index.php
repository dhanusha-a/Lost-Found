<?php
	include('connection.php');
	session_start();
	
	$user=$_POST['user'];
	$user_name= $_POST['user_name'];
	$pass=$_POST['pass'];

	if($_POST['submit'])
	{
	    $query="select * from login where user_name='$user_name' and pass='$pass'";
		$result=mysql_query($query);
		$rs=mysql_fetch_row($result);
		if($user_name=="")
		{
			echo "<script>alert('Username cannot be blank');</script>";
		}
		else if($pass=="")
		{
			echo "<script>alert('Password cannot be blank');</script>";
		}
		else if($rs)
		{
			if($user=="admin")
			{
				$_SESSION['username'] = $rs[0];
				header('location:display.php');
			}
			else
			{
				$_SESSION['username'] = $rs[0];
				header('location:displaystu.php');
			}
			
		}
		else
		{
			echo "<script>alert('Invalid User Name Or Password');</script>";
		}
	} 	 
?>

<html>
	<head>
		<title>Login Page</title>
		<link href="default.css" rel="stylesheet" type="text/css" media="all" />
		<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
	</head>
	
	<body>
		<div id="header-wrapper">
			<div id="header" class="container">
				<div id="logo">
					<h1><span class="icon icon-key"></span><a href="login.php">Lost & Found</a></h1>
				</div>
			</div>
		</div>
     
		<div id="page-wrapper">
			<div id="page" class="container">
				<div class="title">
					<h2>Login</h2>
				</div>
				
	
				<form name="frm" method="post">
				<table border=0 align="center" cellspacing=3>
					<tr>
						<td>User:</td>
						<td>
							<select name="user">
								<option value="">Select </option>
								<option value="admin">Admin</option>
								<option value="student">Student</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Username:</td>
						<td><input type="text" name="user_name"></td>
					</tr>
					<tr>
						<td>PassWord:</td>
						<td><input type="password" name="pass"></td>
					</tr>
				</table> <br>
				<input type="submit" name="submit" value="submit">				
				</form>
			</div>	
		</div>
		
		<div id="copyright" class="container">
			<p>&copy; FYMCA-11415 @ NMIMS. All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
		</div>
		
	 </body>
  </head>
</html>