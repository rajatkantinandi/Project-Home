<html>
<body style="color:maroon" bgcolor="lightgrey">

<?php
$uploaddir = 'profile pics/';
session_start();
if(isset($_SESSION["username"]))
{$uploadfile = $uploaddir.basename("profilepic_".$_SESSION["username"].".jpg");}
else if(isset($_COOKIE["user"]))
{$uploadfile = $uploaddir.basename("profilepic_".$_COOKIE["user"].".jpg");}
if ((($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/jpeg"))
&& ($_FILES["file"]["size"]< 1048576))
  {
  if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))
    {
    echo "Uploaded";
	echo "<br/>File Size : ".($_FILES["file"]["size"]/1024)." Kb<br/>";
	echo "".$uploadfile;
  header("location: index.php?v=10");
    }
  else
    {
    echo "<h2>Error: Unable to upload !</h2>";
	}
  }
  else if(($_FILES["file"]["size"]>=1048576)){echo "File too big!! Must be within 1 Mb";}
else
  {
  echo "<h2>Error: No Files selected or Invalid file Type !!</h2> Only \".jpg\" Files are accepted.";
  echo "<br/>File Type : ".$_FILES["file"]["type"];
  }
?>

</body>
</html>