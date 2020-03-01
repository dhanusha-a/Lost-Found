<?php
	include('connection.php');
	session_start();
	if(!isset($_SESSION['username']))
	{
		header('location:index.php');
	}
	
	$qry = "select * from item";
	$res = mysql_query($qry);
	while($row = mysql_fetch_array($res))
	{
		$rs[] = $row;
	}	
	error_reporting(E_ALL ^ E_NOTICE);	
	$id=$_GET['id'];
	
	if($_GET['id'] != '')
	{
		$select=mysql_query("select image from item where id='$id'");
		$image=mysql_fetch_array($select);
		@unlink($image['image']);
		$result=mysql_query("delete from item where id='$id'");
		header('location:display.php');
	}
?>



<html>
	<head>
		<title>Admin Display</title>
		<link href="default.css" rel="stylesheet" type="text/css" media="all" />
		<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
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
					<h2>Details</h2>
				</div>
		
	<table border=1 align="center" width="85%">
	      <tr>
		     <th width="5%">Id</th>
			 <th>Name</th>
			 <th>Floor</th>
			 <th>Class</th>
			 <th>Date</th>
			 <th>Day</th>
			 <th>Time</th>
			 <th>Image</th>
			 <th colspan="2" align="center">Action</th>
		  </tr>
		  <?php
		       for($i = 0; $i < count($rs); $i++)
				{
		     ?>
		  <tr>
		      <td align="center"><?php echo $rs[$i]['id']?></td>
			  <td align="center"><?php echo $rs[$i]['name']?></td>
			  <td align="center"><?php echo $rs[$i]['floor']?></td>
			  <td align="center"><?php echo $rs[$i]['class']?></td>
			  <td align="center"><?php echo $rs[$i]['date']?></td>
			  <td align="center"><?php echo $rs[$i]['day']?></td>
			  <td align="center"><?php echo $rs[$i]['time']?></td>
			  <td align="center"><img src="<?php echo $rs[$i]["image"];?>" height="100" width="100"></td>
			  <td align="center"><a href="update.php?id=<?php echo $rs[$i]['id'];?>">Update</td>
			  <td align="center"><a href="display.php?id=<?php echo $rs[$i]['id'];?>" onClick="return confirm('Are you sure you want to delete?')">Delete</td>
			  
		  </tr>
				<?php }?>
	   </table>
	   
			</div>	
			</div>
		
		<div id="copyright" class="container">
			<p>&copy; FYMCA-11415 @ NMIMS. All rights reserved. | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
		</div>
	</body>
</html>
