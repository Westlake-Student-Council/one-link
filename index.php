<?php
$get_file = file_get_contents('announcements.json');
$json_file = json_decode($get_file);
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Westlake Student Council</title>

  <!-- Bootstrap Core CSS -->
  <link href="./css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="./css/half-slider.css" rel="stylesheet">
  <link href="./css/homepagelayout.css" rel="stylesheet">

  <!-- homepage css -->
  <link href="./css/homepage.css" rel="stylesheet">

	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-130419773-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-130419773-2');
</script>


</head>

<body id="page top">
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
		  <!-- Brand and toggle get grouped for better mobile display -->
		  <div class="navbar-header">
		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		      <span class="sr-only">Toggle navigation</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>
		  </div>
		  <!-- Collect the nav links, forms, and other content for toggling -->
		  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		   <ul class="nav navbar-nav navbar-left">
		      <li>
						<a class="page-scroll" href="#page top">Updates</a>
					</li>
		    </ul>

		    <ul class="nav navbar-nav navbar-right">
		      <li>
		        <a href="http://westlakestuco.com">StuCo Main Site</a>
		      </li>
		    </ul>
		  </div>
		  <!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>

	<!-- page content goes here -->
	<div class = "container" style = "margin-top:50px;">
    <div class = "row">
			<div class = "text-center">
				<h1><strong>Student Council Updates</strong></h1>
				<hr>
			</div>

      <?php foreach ($json_file->announcements as $index => $obj): ?>
				<div class="panel panel-<?php echo $obj->panel_color; ?>" style="margin: 0px 10px 10px;">
					<div class="panel-heading">
						<center><h3 class="panel-title"><?php echo $obj->title; ?></h3></center>
	  			</div>
					<div class="panel-body">
	 					<?php echo $obj->description; ?>
	 				</div>
				</div>
      <?php endforeach; ?>

    </div>
	</div>
  <!-- /.container -->
	
	<hr>
	<!-- Footer -->
	<footer>
		<div class="row">
			<div class="text-center">
				<p>Westlake Student Council</p>
				<p>Contact at <a href = "mailto:westlakestuco@gmail.com">westlakestuco@gmail.com</a></p>
			</div>
		</div>
		<!-- /.row -->
	</footer>

  <!-- jQuery -->
  <script src="js/jquery.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="js/bootstrap.min.js"></script>

  <!--navbar js-->
  <script src="js/toolbar.js"></script>

</body>

</html>
