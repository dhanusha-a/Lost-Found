<?php
	include('connection.php');
	session_start();
	if(!isset($_SESSION['username']))
	{
		header('location:index.php');
	}
	
	$name= $_POST['item_name'];
	$floor= $_POST['floor'];
	$class= $_POST['class'];
	$date= $_POST['date'];
	$day= $_POST['day'];
	$time= $_POST['time'];
	//$y=$_POST["year"]."/".$_POST["month"]."/".$_POST["day"];
	//$image=$_POST['image'];
	
	if(isset($_POST['submit']))
	{
		if (file_exists("upload/" . $_FILES["file"]["name"]))
		{
			echo $_FILES["file"]["name"] . " already exists. ";
		}
		/*if($imageFileType != "jpg" && $imageFileType !="png" && $imageFileType !="jpeg" && $imageFileType !="gif")
		{
			$error="sorry, only jpg, jpeg, Png & gif files are allowed.";
			$uploadok=0;
		}*/
		else
		{   
			move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
			echo "<br>";
			echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
			$image =  "upload/" . $_FILES["file"]["name"];
			
				
				$sql="INSERT INTO item (name, floor, class, date, day, time, image) VALUES ('$name','$floor','$class','$date','$day','$time','$image')";
			mysql_query($sql);
			header('location:display.php');
		}
		
		
		$k="select Email from crdt";
		$mailto = $k;
		$mailSub ="Lost Item";
		$mailMsg ="A valuable item of a student belonging to your class is found abondoned in the class. You are requested to check it with your class if it belongs to anyone. Thank You.";
	   require 'PHPMailer/PHPMailerAutoload.php';
	   $mail = new PHPMailer();
		 $mail ->IsSmtp(true);
	   $mail ->SMTPDebug = 2;
	   $mail ->SMTPAuth = true;
	   $mail ->SMTPSecure = 'ssl';
	   $mail ->Host = "smtp.gmail.com.";
	   $mail ->Port = 465;
	   $mail ->IsHTML(true);
	   $mail ->Subject = $mailSub;
	   $mail ->Body = $mailMsg;
	   $mail ->AddAddress($mailto);

	   if(!$mail->Send())
	   {
		   echo "Mail Not Sent";
	   }
	   else
	   {
		echo "<script>alert('Added');</script>";
		  
		}
			 header('location:display.php');
		}
		
		
	
	
	/*if(isset($_POST['submit']))
{
	if (file_exists("upload/" . $_FILES["file"]["name"]))
	{
      echo $_FILES["file"]["name"] . " already exists. ";
	}
	else
	{
       
	  move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
	  echo "<br>";
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
	  $image =  "upload/" . $_FILES["file"]["name"];
	  $sql = "insert into item (image) values ('$image')";
	  mysql_query($sql);
	  header('location:display.php');
	}
}*/
?>

<html>
	<head>
		<title>Add New</title>
		<link href="default.css" rel="stylesheet" type="text/css" media="all" />
		<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
		
		<link rel="stylesheet" href="datecalendar/jquery.ui.all.css">
		<script src="datecalendar/jquery-1.9.0.js"></script>
		<script src="datecalendar/jquery.ui.core.js"></script>
		<script src="datecalendar/jquery.ui.widget.js"></script>
		<script src="datecalendar/jquery.ui.datepicker.js"></script>
		<link rel="stylesheet" href="datecalendar/demos.css">
		
		<script>
		var $j = jQuery.noConflict()
		$j(function() {
			$j( "#lostdate" ).datepicker({
				changeMonth: true,
				changeYear: true, 
				maxDate: "today(-18Y)"
			});
			$j( "#lostdate" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
		});
		
		</script>
	
	</head>
	
	<body>
	
	<div id="header-wrapper">
		<div id="header" class="container">
		<div id="logo">
			<h1><span class="icon icon-key"></span><a href="login.php">Lost & Found</a></h1>
			<div id="menu">
				<ul>
					<li class="current_page_item"><a href="#" accesskey="1" title="">Homepage</a></li>					
					<li><a href="insert.php" accesskey="3" title="">New</a></li>
					<li><a href="display.php" accesskey="2" title="">Details</a></li>
					<li><a href="logout.php" accesskey="2" title="">Logout</a></li>
					
				</ul>
			</div>
		</div>
		</div>
		</div>
		
		<div id="page-wrapper">
			<div id="page" class="container">
				<div class="title">
					<h2>Add Lost Item Details</h2>
				</div>
				
				<form name="add" id="add"   method= "post" enctype="multipart/form-data">
				<table width="40%"cellpadding="3" cellspacing="3" align="center"> <col width="90" />
					<tr>
						<td>Item Name:</td>
						<td><input type="text" name="item_name"></td>
						<td> </td>
					</tr>
					<tr>
						<td align="right">Floor:</td>
						<td>
							<select name="floor">
								<option value="">Select </option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3" >3</option>
								<option value="4" >4</option>
								<option value="5" >5</option>
								<option value="6" >6</option>
								<option value="7" >7</option>
								<option value="8" >8</option>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">Class:</td>
						<td>
							<select name="class">
								<option value="">Select </option>
								<option value="01" >01</option>
								<option value="02">02</option>
								<option value="03" >03</option>
								<option value="04" >04</option>
								<option value="05" >05</option>
								<option value="06" >06</option>
								<option value="07" >07</option>
								<option value="08" >08</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Date:</td>
						<td><input type="date" name="date"></td>
						<td> </td>
					</tr>
					<tr>
						<td align="right">Week Day:</td>
						<td>
							<select name="day">
								<option value="">Weekday </option>
								<option value="Monday">Monday</option>
								<option value="Tuesday">Tuesday</option>
								<option value="Wednesday">Wednesday</option>
								<option value="Thursday">Thursday</option>
								<option value="Friday">Friday</option>
								<option value="Saturday">Saturday</option>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">Time:</td>
						<td>
							<select name="time">
								<option value="">Select </option>
								<option value="8:00:00">8:00</option>
								<option value="9:00:00">9:00</option>
								<option value="10:00:00">10:00</option>
								<option value="11:00:00">11:00</option>
								<option value="12:00:00">12:00</option>
								<option value="13:00:00">13:00</option>
								<option value="14:00:00">14:00</option>
								<option value="15:00:00">15:00</option>
								<option value="16:00:00">16:00</option>
								<option value="17:00:00">17:00</option>
								<option value="18:00:00">18:00</option>
								<option value="19:00:00">19:00</option>
								<option value="20:00:00">20:00</option>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">Image:</td>
						<td><input type="file" name="file" id="file"><br></td>
					</tr>
				
				</table>
				<br>
				<input type="submit" name="submit" value="Submit">				
				</form>
				
			</div>	
		</div>
		
		<div id="copyright" class="container">
			<p>&copy; FYMCA-11415 @ NMIMS. All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
		</div>
		
	</body>
</html>