<?php

session_start();
if($_SESSION['username']){
session_destroy();
header ("location: index.php?v=9");
}
else if($_COOKIE['user']){
setcookie("user","",time()+0);
header ("location: index.php?v=9");
}
else header("location: index.php?v=2");
?>