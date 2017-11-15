<?php
include("signcheck.php");
$sname=$_GET["sitename"];
$add=$_GET["address"];
$i2=$_GET["ii"];
mysqli_query($c,"UPDATE `".$usernme."` SET sitename='$sname', Address='$add'
WHERE slno='$i2'");
echo "<div style='position:absolute;visibility:hidden;'>";
$domain1=explode("/",$add);
copy("http://".$domain1[2]."/favicon.ico","icons/".$slno."/icon_".$sname.".ico");
echo "</div>";
mysqli_close($c);
header ("location: index.php?v=4");
?>