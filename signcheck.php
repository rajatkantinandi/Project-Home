	<span style="display:none;">
	<?php
	session_start();
	$signed="";
	$usernme="";
	if(isset($_SESSION['username']))
	{
	$usernme=$_SESSION['username'];	
	$signed="yes";
	}
	else if(isset($_COOKIE["user"]))
	{
	$usernme=$_COOKIE["user"];
	$signed="yes";
	}
	if(file_exists("profile pics/profilepic_".$usernme.".jpg")){
	$imag="profile pics/profilepic_".$usernme.".jpg";}
	else $imag="user.png";
		$c=mysqli_connect("localhost","root","","sn");
		if (!$c)
	  {
	  die('Could not connect: ' . mysqli_connect_error());
	  }
	$q1=mysqli_query($c,"SELECT * FROM users WHERE username='$usernme'");
	while($row=mysqli_fetch_assoc($q1)){
		$fname=$row['fname'];
		$slno=$row['slno'];
	}
	?>
	</span>