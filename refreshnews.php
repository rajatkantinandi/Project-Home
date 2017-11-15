<?php
if(isset($_GET["ncat"])){
	$ncat=$_GET["ncat"];
}
$j=1;
if(isset($_GET["l"])){
	$l=$_GET["l"];
}
if($l==1){
include("refreshn2.php");
}
else if(isset($_COOKIE["ntime".$ncat])==0){
  include("refreshn2.php");
}
  if($j==0)
  {  echo "<h4 style='color:red;background:white;'>Unable to refresh content due to internet connection error ! Showing old preloaded news..</h4>";
  }
	include("news.php");
?>