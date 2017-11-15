<?php
session_start();
$uname=$_POST["user"];
$c=mysqli_connect("localhost","root","","sn");
if (!$c)
  {
  die('Could not connect: ' . mysqli_connect_error());
  }
 if(isset($_SESSION['username'])){
 $q=mysqli_query($c,"SELECT * FROM users WHERE username='".$_SESSION['username']."'");
while($row=mysqli_fetch_assoc($q)){
$i=$row['slno'];
}
 mysqli_query($c,"UPDATE users SET username='$uname' WHERE slno='$i'");
 mysqli_query($c,"ALTER TABLE `".$_SESSION['username']."` RENAME TO `".$uname."`");
 $_SESSION['username']=$uname;
header("location: index.php?v=10");
 }
 else if(isset($_COOKIE['user'])){
$q=mysqli_query($c,"SELECT * FROM users WHERE username='".$_COOKIE['user']."'");
while($row=mysqli_fetch_assoc($q)){
$i=$row['slno'];
}
 mysqli_query($c,"UPDATE users SET username='$uname' WHERE slno='$i'");
 mysqli_query($c,"ALTER TABLE `".$_COOKIE['user']."` RENAME TO `".$uname."`");
 $expire=time()+60*60*24*30;
 setcookie("user", "".$uname, $expire);
header("location: index.php?v=10");
 }
?>