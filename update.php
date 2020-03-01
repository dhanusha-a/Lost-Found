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
	
	
	$id=$_GET['id'];
	 echo $id;
	 $rec_dis_query="Select * from item where id=$id";
	 $result=mysql_query($rec_dis_query);
	 $rs=mysql_fetch_array($result);
	
	
	if(isset($_POST['submit']))
	{
		/*if (file_exists("upload/" . $_FILES["file"]["name"]))
		{
			echo $_FILES["file"]["name"] . " already exists. ";
		}
		if($imageFileType != "jpg" && $imageFileType !="png" && $imageFileType !="jpeg" && $imageFileType !="gif")
		{
			$error="sorry, only jpg, jpeg, Png & gif files are allowed.";
			$uploadok=0;
		}
		else
		 
			move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
			echo "<br>";
			echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
			$image =  "upload/" . $_FILES["file"]["name"];*/
			
				
				$sql="UPDATE ITEM SET  name='$name', floor='$floor', class='$class', date='$date', day='$day', time='$time' where id=$id";
			mysql_query($sql);
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
		<title>Update Details</title>
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
					<h2>Update Details</h2>
				</div>
				
				<form name="add" id="add"   method= "post" enctype="multipart/form-data">
				<table width="32%" cellpadding="3" cellspacing="3" align="center"> <col width="90" />
					<tr>
						<td>Item Name:</td>
						<td><input type="text" name="item_name" value="<?php echo $rs['name'];?>"></td>
						<td> </td>
					</tr>
					<tr>
						<td align="right">Floor:</td>
						<td>
							<select name="floor">
								<option value="">Select </option>
								<option value="1" <?php if ($rs['floor']=='1'):?> selected="selected"<?php endif;?>>1</option>
								<option value="2" <?php if ($rs['floor']=='2'):?> selected="selected"<?php endif;?>>2</option>
								<option value="3" <?php if ($rs['floor']=='3'):?> selected="selected"<?php endif;?>>3</option>
								<option value="4" <?php if ($rs['floor']=='4'):?> selected="selected"<?php endif;?>>4</option>
								<option value="5" <?php if ($rs['floor']=='5'):?> selected="selected"<?php endif;?>>5</option>
								<option value="6" <?php if ($rs['floor']=='6'):?> selected="selected"<?php endif;?>>6</option>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">Class:</td>
						<td>
							<select name="class">
								<option value="">Select </option>
								<option value="01" <?php if ($rs['class']=='01'):?> selected="selected"<?php endif;?>>01</option>
								<option value="02" <?php if ($rs['class']=='02'):?> selected="selected"<?php endif;?>>02</option>
								<option value="03" <?php if ($rs['class']=='03'):?> selected="selected"<?php endif;?>>03</option>
								<option value="04" <?php if ($rs['class']=='04'):?> selected="selected"<?php endif;?>>04</option>
								<option value="05" <?php if ($rs['class']=='05'):?> selected="selected"<?php endif;?>>05</option>
								<option value="06" <?php if ($rs['class']=='06'):?> selected="selected"<?php endif;?>>06</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Date:</td>
						<td><input type="date" name="date" value="<?php echo $rs['date'];?>"></td>
						<td> </td>
					</tr>
					<tr>
						<td align="right">Week Day:</td>
						<td>
							<select name="day">
								<option value="">Weekday </option>
								<option value="Monday" <?php if ($rs['day']=='Monday'):?> selected="selected"<?php endif;?>>Monday</option>
								<option value="Tuesday" <?php if ($rs['day']=='Tuesday'):?> selected="selected"<?php endif;?>>Tuesday</option>
								<option value="Wednesday" <?php if ($rs['day']=='Wednesday'):?> selected="selected"<?php endif;?>>Wednesday</option>
								<option value="Thursday" <?php if ($rs['day']=='Thursday'):?> selected="selected"<?php endif;?>>Thursday</option>
								<option value="Friday" <?php if ($rs['day']=='Friday'):?> selected="selected"<?php endif;?>>Friday</option>
								<option value="Saturday" <?php if ($rs['day']=='Saturday'):?> selected="selected"<?php endif;?>>Saturday</option>
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
						<td><img border='1' src="<?php echo $rs['image'];?>" width="100" height="100" title="<?php echo $rs['name'];?>"></td>						
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