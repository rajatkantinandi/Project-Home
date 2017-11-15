<html>
<head>
<title>Edit Site</title>
</head>
<body bgcolor="lightgrey">
<div style="color:maroon;padding:50px 50px;z-index:5;position:fixed;margin:200px 400px;height:200px;width:400px;background-color:white;border:2px black solid;-moz-border-radius:20px;border-radius:20px;outline:-moz-box-shadow: 10px 10px 5px #888888;-webkit-box-shadow: 10px 10px 5px #888888;box-shadow: 10px 10px 5px #888888;">
<div style="visibility:hidden;position:absolute;">
<?php
session_start();
$i2=$_GET["i"];
$c=mysqli_connect("localhost","root","","sn");
if (!$c)
  {
  die('Could not connect: ' . mysqli_connect_error());
  }
    if($_SESSION['username']){$qr=mysqli_query($c,"SELECT * FROM `".$_SESSION['username']."` WHERE slno='$i2'");}
	else if($_COOKIE['user']){
$qr=mysqli_query($c,"SELECT * FROM `".$_COOKIE['user']."` WHERE slno='$i2'");
}
else $qr=mysqli_query($c,"SELECT * FROM sites WHERE slno='$i2'");
?>
</div>
<?php
  while($row=mysqli_fetch_assoc($qr))
		{
		$sname=$row['sitename'];
		$add=$row['Address'];
		}
mysqli_close($c);
echo "<form action='edited.php' method='get' id='edfrm'>";
echo "Edit Site Name: <input type='text' style='margin-bottom:5px;' name='sitename' size='29' value='$sname' id='sname'/>";
echo "<br/> Edit Address: <input type='text' name='address' style='width:300px;' size='699' id='ad1' value='$add'/>";
echo "<input type='hidden' value='$i2' name='ii'/>";
echo "<br/><input type='submit' style='margin-top:10px;' value='Edit Site'/>";
echo "</form>";
?>
<a href="javascript:history.go(-1)"><button style="position:absolute;margin-left:80px;margin-top:-39px;">Cancel</button></a>
</div>
</body>
</html>