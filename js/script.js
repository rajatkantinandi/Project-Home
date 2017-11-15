$(document).ready(function(){
    $("#gsearch").click(function(){
        $(".search-form").attr("action","http://google.co.in/search");
        $(".search-form input").attr("placeholder","Google Search");
        $(".sengine img").attr("src","images/gsearch.png");
        $(".search-form input").focus();
    });
    $("#bsearch").click(function(){
        $(".search-form").attr("action","http://bing.com/search");
        $(".search-form input").attr("placeholder","Bing Search");
        $(".sengine img").attr("src","images/bsearch.ico");
        $(".search-form input").focus();
    });
    $(".signbtn").on('shown.bs.dropdown', function () {
       $("#u1").focus();
    });
    $(".signbtn").on('hidden.bs.dropdown', function () {
       $(".search-form input").focus();
    });
    $(".tab2 a[href='#signin']").on('shown.bs.tab', function () {
       $("#u1").focus();
    });
    $(".tab2 a[href='#signup']").on('shown.bs.tab', function () {
       $("#fname").focus();
    });
});
$(document).on('click','.addrest',function(){
  $("#s1").focus();    
}); 
$(document).on('shown.bs.modal','#addnew', function () {
   $("#s1").focus();
 });
$(document).on('hidden.bs.modal','#addnew', function () {
   $(".search-form input").focus();
 });
$(document).on('submit','#frm1',function(){
      var a=$("#s1").val(),b=$("#ad1").val();
        var s="sites.php?sitename="+a+"&address="+b;
        if(a==""){
        alert("Site Name must not be empty !!");
        }
        else if(b==""){
        alert("Site Address is invalid or empty!!");
        }
        else{
        $("#addnew").modal("hide");
        $("#st").html("<img src='images/loading2.gif' width='25px'/> Adding site..");
        $("#fav").load(s);
      } 
      return false;
    });
$(document).on('click','#addbtn',function(){
      $("#addnew").modal("show");
      $("#addnew .modal-content").hide();
      $("#addnew .modal-content").slideDown("1200");
    });
$(document).on('click','.tab2',function(){
      if($("#top").text()=="Loading..."){
        $("#top").load("sites.php?signed=no");
      }
    });
$(document).on('mouseover','.sitea',function(){
      $(this).find("div.siteoverlays").css("visibility","visible");
    });
$(document).on('mouseout','.sitea',function(){
      $(this).find("div.siteoverlays").css("visibility","hidden");
    });
$(document).on('change','#sl',function(){
  var q=$("#sl").val();
  $("#newsframe").html("<center><img src='images/loading2.gif' width='25px'/> Loading News..</center>");
  $("#newsframe").load("refreshnews.php?ncat="+q+"&l=0");
    });
$(document).on('click','.refreshbtn',function(){
  var q=$("#sl").val();
  $("#newsframe").html("<center><img src='images/loading2.gif' width='25px'/> Loading News..</center>");
  $("#newsframe").load("refreshnews.php?ncat="+q+"&l=1");
    });
function del_confirm(id,name,add)
{
var r=confirm("Are you sure to delete the site : <<"+name+">> \""+add+"\" !");
if (r==true)
  {
  $("#fav").load("delete.php?i="+id); 
  }
}
$(document).on('submit','#signin',function(){
      var a=$("#u1").val(),b=$("#p1").val();
        if(a==""){
        alert("Username must not be empty!!");
        return false;
        }
        else if(b==""){
        alert("Enter the password!! Its empty!!");
        return false;
        }
});
$(document).on('submit','#signup',function(){
      var a=$("#fname").val(),b=$("#u2").val(),c=$("#p2").val(),d=$("#p3").val();
        if(a==""){
        alert("First name must not be empty!!");
        return false;
        }
        else if(b==""){
        alert("Username must not be empty!!");
        return false;
        }
        else if(c==""){
        alert("Enter the password!! Its empty!!");
        return false;
        }
        else if(d!=c){
        alert("Password did not match!! Enter same password to confirm!!");
        return false;
        }
});
function allowDrop(ev,i) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev,i) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    var pos=document.getElementById(data);
    var ii=document.getElementById(i);
    var n1=pos.parentNode.parentNode.parentNode;
    var n3=pos.parentNode.parentNode;
    var n2=ii.parentNode.parentNode;
    n1.insertBefore(n3,n2);
    $("#st").html("<img src='images/loading2.gif' width='25px'/> Rearranging.. Have patience..");
    $.get("reorder.php?pos="+data+"&ii="+i);
    $("#fav").load("sites.php");
  }
 $("body").ready(function(){
  $("#newsframe").load("refreshnews.php?ncat=BING_TOP&l=0");
  $.get("refreshnews.php?ncat=BING_INT&l=0");
  $.get("refreshnews.php?ncat=BING_BUSINESS&l=0");
  $.get("refreshnews.php?ncat=BING_ENT&l=0");
  $.get("refreshnews.php?ncat=BING_SPORTS&l=0");
 });
  $(function(){
    $(".carousel").carousel({
      interval:40000,
      pause: false,
      wrap:true,
      keyboard:false
    });
  });