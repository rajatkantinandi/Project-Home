<?php
echo "<span style='display:none;'>";
if($ncat=="BING_INT")
  {
  $u="http://www.bing.com/news/search?q=&nvaug=%5BNewsVertical+Category%3d%22rt_World%22%5D&FORM=NSBABR&format=RSS";
  $j=copy($u,"news/news1.xml");
  }
else if($ncat=="BING_TOP")
  {
  $u="http://www.bing.com/news/search?q=&nvaug=%5BNewsVertical+Category%3d%22rt_India%22%5D&FORM=NSBABR&format=RSS";
  $j=copy($u,"news/news2.xml");
  }
  else if($ncat=="BING_BUSINESS")
  {
  $u="http://www.bing.com/news/search?q=&nvaug=%5BNewsVertical+Category%3d%22rt_Business%22%5D&FORM=NSBABR&format=RSS";
  $j=copy($u,"news/news3.xml");
  }
  else if($ncat=="BING_SPORTS")
  {
  $u="http://www.bing.com/news/search?q=&nvaug=%5BNewsVertical+Category%3d%22rt_Sports%22%5D&FORM=NSBABR&format=RSS";
  $j=copy($u,"news/news5.xml");
  }
  else if($ncat=="BING_ENT")
  {
  $u="http://www.bing.com/news/search?q=&nvaug=%5BNewsVertical+Category%3d%22rt_Entertainment%22%5D&FORM=NSBABR&format=RSS";
  $j=copy($u,"news/news6.xml");
  }
  echo "</span>";
  if($j==1){
  setcookie("ntime".$ncat,"2 hours to load news",time()+7200);
}
?>