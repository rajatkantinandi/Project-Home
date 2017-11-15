<?php
//find out which feed was selected
if($ncat=="BING_INT")
  {
  $l="news/news1.xml";
  }
else if($ncat=="BING_TOP")
  {
  $l="news/news2.xml";
  }
  else if($ncat=="BING_BUSINESS")
  {
  $l="news/news3.xml";
  }
  else if($ncat=="MSN_TOP")
  {
  $l="news/news4.xml";
  }
  else if($ncat=="BING_SPORTS")
  {
  $l="news/news5.xml";
  }
  else if($ncat=="BING_ENT")
  {
  $l="news/news6.xml";
  }
 ?>
 <div id="newsouter">
<div class="carousel slide" id="news1">
	<div class="carousel-inner">

<?php $xml=($l);
$xmlDoc=new DOMDocument();
echo "<span style='display:none;'>";
$xmlDoc->load($xml);
echo "</span>";
$x=$xmlDoc->getElementsByTagName('item');
for ($i=0; $i <$x->length ; $i++) { 
	if($i==0){
		echo "<div class='item active'> ";
	}
	else{
		echo "<div class='item'>";
	}
	$item_title=$x->item($i)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
	$item_link=$x->item($i)->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
	$item_desc=$x->item($i)->getElementsByTagName('description')->item(0)->childNodes->item(0)->nodeValue;
	$item_time=$x->item($i)->getElementsByTagName('pubDate')->item(0)->childNodes->item(0)->nodeValue;
	echo "<div class='headline'><b><a style='color:white;text-decoration:none;' target='_blank' href='".$item_link."'>(".($i+1).") ".$item_title."</a></b></p>";
	echo "<div class='newsitem'>".$item_desc."</div><br/><b>Published on(GMT) :</b> ".$item_time."</div></div>";
}
?>
	</div>
	<a href="#news1" class="left carousel-control" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
	</a>
	<a href="#news1" class="right carousel-control" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
	</a>
</div>
</div>