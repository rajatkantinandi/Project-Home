<?php
$ii=$_GET["ii"];
$pos=$_GET["pos"];
include("signcheck.php");
$q=mysqli_query($c,"UPDATE `".$usernme."` SET slno=0 WHERE slno='$pos'");
if($pos>$ii){
	for ($i=($pos-1); $i >=$ii ; $i--) {
	$i2=$i+1;
	$q2=mysqli_query($c,"UPDATE `".$usernme."` SET slno='$i2' WHERE slno='$i'");
	header ("location: index.php");
	}
}
else if ($pos<$ii) {
	for ($i=($pos+1); $i <$ii ; $i++) { 
	$i2=$i-1;
	$q2=mysqli_query($c,"UPDATE `".$usernme."` SET slno='$i2' WHERE slno='$i'");
	header ("location: index.php");
	}
	$ii=$ii-1;
}
$q3=mysqli_query($c,"UPDATE `".$usernme."` SET slno='$ii' WHERE slno=0");
?>