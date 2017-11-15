<?php
session_start();
$username=$_POST['user'];
$password=$_POST['pass'];
$keepsigned=$_POST['keeploged'];
if($username!=null&&$password!=null)
{
	$connect=mysql_connect("localhost","root","") or die;
	mysql_select_db("sn") or die ("Database is Invalid");
	$queryed=mysql_query("SELECT username,password FROM users WHERE username='$username'");
	$numrow=mysql_num_rows($queryed);
	if($numrow==0)
	{
	header ("location: index.php?v=6");//Username Doesn't Exist
	}
	else {
		while($row=mysql_fetch_assoc($queryed))
		{
		$usernm=$row['username'];
		$pass=$row['password'];
	    }
		if($username==$usernm&&$password==$pass)
		{
		if($keepsigned==""){
		$_SESSION['username']=$usernm;}
		else {
			$expire=time()+60*60*24*30;
			setcookie("user", "".$usernm, $expire);
			}
		header ("location: index.php");//login successful & redirect
		}
		else {
		header ("location: index.php?v=7");//Invalid Password
		}
}
}
else {die ("Username or Password Field is empty ..<br/> Please enter a Username & Password<br/><form action='signin.php' method='post'>
User Name: <input  style='margin-bottom:5px;' type='text' name='user'/>
<br/> Password: <input type='password' name='pass'/>
<br/><input style='margin-top:10px;' type='submit' value='Log in'/>
</form>");}
?>