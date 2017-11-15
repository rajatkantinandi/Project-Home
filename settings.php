<?php
session_start();
if(isset($_SESSION["username"])){$user=$_SESSION["username"];}
else if(isset($_COOKIE["user"])){$user=$_COOKIE["user"];}
if(file_exists("profile pics/profilepic_".$user.".jpg")){
$imag="profile pics/profilepic_".$user.".jpg";
$imghead="<h2>Profile Picture</h2>";
}
else {
$imag="user.png";
$imghead="<h2>Upload Your Profile Picture</h2>";
}
?>
<html>
<head>
<title> Account Settings </title>
<script type='text/javascript'>
function cname(){
if(document.getElementById('b1').value=="Edit"){
document.getElementById('u1').disabled=null;
document.getElementById('b1').value="Update";
return false;
}
else if(document.getElementById('u1').value==""){
alert("Username Field must not be empty !");
return false;
}
}

</script>
</head>
<body bgcolor="grey" style="color:#ffffff;">
<h1 style="padding:5px 20px;"> <a href="javascript:history.go(-1)" title="Go Back"><img style="margin-bottom:-10px;margin-right:10px;"src="images/back.png" height="38px"/></a> Account Settings : <span id="uname"></span></h1>
<div style="border:2px dotted green;padding:10px 20px;background:lightgrey;color:black;">
<?php
echo $imghead;
echo "<table><tr><td><span id='imgpreview'><img src='$imag' width='120px' height='150px' alt='N/A' style='color:black;'/></span></td>";
echo "<td><form action='pic.php' method='post' enctype='multipart/form-data' style='color:maroon;'><b>Change Profile picture </b>(Only .jpg image within 1MB is accepted): <br/><input type='file' name='file' id='file' /><input type='submit' name='submit' value='Submit'/></form></td></tr></table>";
?>
<hr/><h2>General Settings</h2>
<form method="post" action="set.php" onsubmit="return cname()">
<?php
$c=mysqli_connect("localhost","root","","sn");
if (!$c)
  {
  die('Could not connect: ' . mysqli_connect_error());
  }
echo "Username: <input id='u1' name='user' disabled='true' value='".$user."'/>";
?>
<input id="b1" type="submit" value="Edit"/>
</form>
</div>
<script type='text/javascript'>
<?php
if(isset($_SESSION["username"])){
echo "document.getElementById('uname').innerHTML='".$_SESSION["username"]."';";
}
else if(isset($_COOKIE["user"])){
echo "document.getElementById('uname').innerHTML='".$_COOKIE["user"]."';";
}
else{
header("location: index.php?v=11");
}
mysqli_close($c);
?>
</script>
</body>
</html>