<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <title>#Homepage_2.0</title>
  <link rel="SHORTCUT ICON" href="favicon.ico" type="image/x-icon" />
</head>
<body>
<!-- sign in check -->
<?php include("signcheck.php");?>
<!-- sign in check -->

<!-- Navigation Bar -->
	<nav class="navbar navbar-default" id="topbar">
	<!-- navlogo -->
		<a href="index.php" style="color:white;text-decoration:none;"><div class="navbar-header col-md-2 col-sm-3 col-xs-1">
			<h4>
				<span class="glyphicon glyphicon-home" style="font-size:24px;"></span>&nbsp; <span class="hidden-xs">HomePage !</span>
			</h4>

		</div></a>
	<!-- navlogo -->
	<!-- search -->
		<div class="col-md-7 col-sm-6 col-xs-8">
		<form method="get" action="http://google.co.in/search" class="search-form">
			<div class="input-group">
				<span class="sengine input-group-addon dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="images/gsearch.png" class="img-round" width="20px"><span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#" id="gsearch">Google</a></li>
						<li><a href="#" id="bsearch">Bing</a></li>
					</ul>
				</span>
				<input type="text" name="q" placeholder="Google Search" class="form-control" autofocus="true">
				<span class="input-group-addon btn btn-default">
					<button type="submit" class="searchgo"><span class="glyphicon glyphicon-search"></span></button>
				</span>
			</div>
		</form>			
		</div>
	<!-- search -->
	<!-- userbtn -->
		<div class="dropdown signbtn">
		<?php if($signed=="yes"){echo "<button data-toggle='dropdown' class='btn btn-primary dropdown-toggle'><img src='".$imag."' height='30px' width='30px' class='img-circle' alt='dp'/> <span class='hidden-xs' translate='no'>".$fname." </span><span class='caret'></span></button>";}
		else { echo "<button data-toggle='dropdown' class='btn btn-primary dropdown-toggle'><span class='glyphicon glyphicon-user'></span> <span class='hidden-xs'>Sign in </span><span class='caret'></span></button>";}
		?>

			<?php if($signed!="yes"){?>
			<!-- Sign Form -->
			  <div class="signform dropdown-menu">
			  <form action="#" class="tab2">
			  <ul class="nav nav-tabs">
			  	<li class="active"><a href="#signin" data-toggle="tab">Sign in</span></a></li>
			  	<li><a href="#signup" data-toggle="tab">Sign up</span></a></li>
			  </ul>
			  <br/>
			  </form>
			  <div class="tab-content">
			  <!-- Sign in Form -->
			  	<form id="signin" action="signin.php" method="post" class="tab-pane active" onsubmit="return sinformv()">
			  	<div class="form-group">
			  		<label for="u1">Username</label>
			  		<input type="text" class="form-control" name="user" id="u1" placeholder="Username.." data-validation/>
			  	</div>
			  	<div class="form-group">
			  		<label for="p1">Password</label>
			  		<input name="pass" class="form-control" type="password" id="p1" placeholder="Password.."/>
			  	</div>
			  	<div class="checkbox">
			  			<label><input type="checkbox" name="keeploged" checked="checked"/>Keep me signed in ...</label>
			  	</div>
			  			<input type="submit" value="Log in" class="btn btn-success" />
				</form>
				<!-- Sign in Form -->
				<!-- Sign up Form -->
				<form id="signup" action="signup.php" method="post" class="tab-pane" onsubmit="return supformv()">
					<div class="form-group">
						<label for="fname">First Name</label>
						<input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name"/>
					</div>
					<div class="form-group">
						<label for="u2">Choose Username</label>
						<input type="text" class="form-control" id="u2" name="username" placeholder="Choose Username"/>
					</div>
					<div class="form-group">
						<label for="p2">Choose Password (Max 25 &amp; Min 8 chars)</label>
						<input type="password" class="form-control" id="p2" name="password" placeholder="Choose Password"/>
					</div>
					<div class="form-group">
						<label for="p3">Confirm Password</label>
						<input type="password" id="p3" class="form-control" name="password2" placeholder="Confirm Password"/>
					</div>
					<input type="submit" value="Sign up" class="btn btn-info"/>
				</form>
				<!-- Sign up Form -->
			  </div>
			<!-- Sign Form -->
			  </div><?php }
			 else {
			?>
			<!--Sign out dropdown -->
					<ul class="signedmenu dropdown-menu">
						<li><a href="signout.php">Sign Out</a></li>
						<li><a href="settings.php">A/C Settings</a></li>
					</ul>
			<!--Sign out dropdown -->
			<?php 
			mysqli_close($c);
			}?>
		</div>
	<!-- userbtn -->
	</nav>
<!-- Navigation Bar -->
<!-- Sites -->
	<div class="container sites col-sm-8 col-xs-12" id="sites">
  <ul class="nav nav-tabs">
  	<li class="active"><a href="#fav" data-toggle="tab" class="tab1"><big><b>
  	<?php if($signed=="yes"){echo "Favourites";}
  	else echo "Top Sites";
  	?>
  	</b></big></a></li>
  	<?php if($signed=="yes"){?><li><a href="#top" data-toggle="tab" class="tab2"><big><b>Top Sites</b></big></a></li><?php }?>
  	<li class="newstab"><a href="#news"> <big><b>News <span class="glyphicon glyphicon-arrow-down"></span></b></big></a></li>
  </ul>
  <div class="tab-content">
  	<div class="tab-pane active" id="fav">
  		<?php include("sites.php");?>
  	</div>
  	<div class="tab-pane" id="top">Loading...</div>
  </div>
	</div>
<!-- Sites -->

<!-- News -->
	<div class="container news col-sm-4 col-xs-12" id="news">
	<h3>
		<span class="glyphicon glyphicon-book"></span> News <a href="#sites" class="btn btn-default newstofav">Favourites <span class="glyphicon glyphicon-arrow-up"></span></a>
	</h3>
	<form>
		<select id="sl" onchange="refreshn(0)">
	<option value="BING_TOP">BING TOP STORIES INDIA</option>
	<option value="BING_INT">BING International</option>
	<option value="BING_BUSINESS">BING India Business News</option>
	<option value="BING_SPORTS">BING SPORTS News</option>
	<option value="BING_ENT">BING ENTERTAINMENT News</option>
	</select> <span class="btn btn-primary refreshbtn"><span class="glyphicon glyphicon-refresh"></span> Refresh</span>
	</form>
	<br/>
	<span id="newsframe">
	<center><img src='images/loading2.gif' width='25px'/> Loading News..</center>
	</span>
	</div>
<!-- News -->
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>