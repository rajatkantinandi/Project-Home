<?php
include("signcheck.php");
if(isset($_GET["signed"])=="no"){
	$signed="no";
}
if(isset($_GET["sitename"])&&isset($_GET["address"]))
{
$sname=$_GET["sitename"];
$add="http://".$_GET["address"];
$queryed=mysqli_query($c,"SELECT * FROM `".$usernme."`");
$numrow=mysqli_num_rows($queryed);
$slnos=$numrow+1;
$q=mysqli_query($c,"SELECT sitename FROM `".$usernme."` WHERE sitename='$sname'");
if(mysqli_num_rows($q)==0){
	mysqli_query($c,"INSERT INTO `".$usernme."` (slno, sitename, Address) VALUES ('$slnos', '$sname','$add')");
	echo "<span style='position:absolute;visibility:hidden;'>";
	$domain1=explode("/",$add);
	copy("http://".$domain1[2]."/favicon.ico","icons/".$slno."/icon_".$sname.".ico");
	echo "</span>";
	$v=1;
}
else $v=5;
}?>
<div class="container fav col-xs-12">
<h4 id="st"></h4>
<?php
	if(isset($_GET["v"])){
	$v=$_GET["v"];
}
if(isset($v)){
	if($v==1){$sts="Status: Site added successfully !";$alert="success";}
	else if($v==2){$sts="Status: Site removed successfully !";$alert="danger";}
	else if($v==5){$sts="Error: Site already exist !";$alert="danger";}
	else if($v==4){$sts="Status: Site edited successfully !";$alert="info";}
	else if($v==6){$sts="Error: Username doesn't Exist!! Try again!";$alert="danger";}
	else if($v==7){$sts="Error: Invalid password!! Try again!";$alert="danger";}
	else if($v==8){$sts="You have signed up successfully !! ";$alert="info";}
	else if($v==9){$sts="You have been signed out successfully!";$alert="danger";}
	else if($v==10){$sts="Settings updated successfully !!";$alert="success";}
	else if($v==11){$sts="Please log in first to access this page !!";$alert="danger";}
	?>
	<h4 class="alert alert-<?php echo $alert;?>"><span class="glyphicon glyphicon-info-sign"></span> <?php echo $sts;?> <a href="#" class="close" data-dismiss="alert">&nbsp; &times;</a></h4>
<?php } ?>
	<?php
if($signed=="yes"){
	$queryed=mysqli_query($c,"SELECT * FROM `".$usernme."`");
}
else{
	$queryed=mysqli_query($c,"SELECT * FROM sites");
}
while($row=mysqli_fetch_assoc($queryed))
		{
		$ii=$row['slno'];
		$sname=$row['sitename'];
		$add=$row['Address'];
		if($signed=="yes"){
	    if(file_exists("icons/".$slno."/icon_".$sname.".ico")){$icn="icons/".$slno."/icon_".$sname.".ico";}
	    else {$icn="icons/webicon.png";}
		}
		else{
			if(file_exists("icons/icon_".$sname.".ico")){$icn="icons/icon_".$sname.".ico";}
	    else {$icn="icons/webicon.png";}
		}
	
?>
<div class="col-lg-2 col-sm-3 col-xs-4 sitea" ondrop="drop(event,<?php echo ($ii);?>)" ondragover="allowDrop(event,<?php echo ($ii);?>)">
<div class="site">
		<img src="<?php echo $icn;?>" height="60%"/>
		<div><?php echo $sname;?></div>
</div>
<div class="siteoverlays">
<div class="siteoverlay" draggable="true" ondragstart="drag(event)" id="<?php echo ($ii);?>">
	<a href="<?php echo $add;?>" style="position:absolute;color:white;font-size:20px;right:0px;left:auto;font-weight:bold;"  target="_blank" title="open link in new tab"><span class="glyphicon glyphicon-new-window"></span></a>
	<a href="<?php echo $add;?>" style="position:relative;top:40px;color:white;text-align:center;font-size:16px;overflow:hidden;font-weight:bold;"><?php echo $sname;?></a>
	<?php if ($signed=="yes") {?>
		<a href="javascript:del_confirm(<?php echo $ii; ?>,'<?php echo $sname; ?>','<?php echo $add;?>')" style="position:absolute;color:white;font-size:20px;right:0px;left:auto;bottom:0px;top:auto;font-weight:bold;" title="Delete Site"><span class="glyphicon glyphicon-remove"></span></a>
		<a href="edit.php?i=<?php echo $ii;?>" style="position:absolute;color:white;font-size:20px;left:0px;right:auto;top:2px;bottom:auto;font-weight:bold;" title="Edit Site"><span class="glyphicon glyphicon-edit"></span></a>
	<?php }?>
</div>
</div>
</div>
<?php 
}
if ($signed=="yes") {
?>

<div class="col-lg-2 col-sm-3 col-xs-4">
<a href="#" id="addbtn" data-backdrop="false">
<div class="site">
<img src="images/add.png" width="70%"/>
</div>
</a>
</div>
<div class="modal" id="addnew">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Add New Site</h3>
			</div>
			<div class="modal-body">
				<form action="#" id="frm1">
				<div class="form-group"><label for="s1">Site Name: </label><input class="form-control" type="text" size="29" name="sitename" id="s1" placeholder="Enter Site Name"/></div>
				<div class="form-group"><label for="ad1">Address: </label><div class="input-group"><span class="input-group-addon" style="font-weight:bold;">http://</span><input type="text" class="form-control" name="address"  size="699" id="ad1" placeholder="Enter address"/></div></div>
				<input class="btn btn-primary" type="submit" value="Add Site"/>
				<input class="btn btn-danger addrest" type="reset" value="clear"/>
				</form>
			</div>
		</div>
	</div>
</div>
<?php }?>
</div>