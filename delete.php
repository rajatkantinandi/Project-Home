<?php
include("signcheck.php");
if(isset($_GET["i"])){
$i=$_GET['i'];
mysqli_query($c,"DELETE FROM `".$usernme."` WHERE slno='$i'");
$v=2;
}
mysqli_close($c);
include("sites.php");
?>
