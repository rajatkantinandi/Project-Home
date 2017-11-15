<?php
$username=$_POST['username'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$fname=$_POST['fname'];
if($fname==null||$username==null||$password==null||$password2==null)
{
echo "Required fields must not be empty !!";
}
else if(strlen($username)>100)
{
 echo "Username must be within 100 Characters !! Enter fields properly to signup !";
}
else if(strlen($password)<8||strlen($password)>25)
{
 echo "Password must be within 25 Charracters & min 8 chars !! Fill up fields properly to signup ! ";
}
else if($password!=$password2)
{
  echo "Password have not matched !! Verify entered password correctly !";
}
else
{
 $c=mysqli_connect("localhost","root","","sn");
 if (!$c)
	  {
	  die('Could not connect: ' . mysqli_connect_error());
	  }
$queryed=mysqli_query($c,"SELECT username FROM users WHERE username='$username'");
$numrow=mysqli_num_rows($queryed);
if($numrow==0)
 {
$qu=mysqli_query($c,"SELECT * FROM users");
$numrow=mysqli_num_rows($qu);
$slnos=$numrow+1;
 mysqli_query($c,"INSERT INTO users (slno,fname,username,password)
 VALUES ('$slnos','$fname','$username','$password')");
mysqli_query($c,"CREATE TABLE `".$username."`
(
`slno` int primary key,
`sitename` varchar(30),
`Address` varchar(700)
)");
 mysqli_close($c);
 header ("location: index.php?v=8");
}
else {
echo "Username Already exist !! Please choose a different one !";
mysqli_close($c);
}
 }
?>
