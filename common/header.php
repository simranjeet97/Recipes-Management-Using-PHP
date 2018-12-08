<!--Simranjeet Singh : Instagram - @ItsExceptional-->

<?php require('common/functions.php'); 
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Steel Spoon</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $path['siteUrl']; ?>/fonts/font-awesome-4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $path['siteUrl']; ?>/lib/bootstrap-3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $path['siteUrl']; ?>/lib/bootstrap-3.3.7/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $path['siteUrl']; ?>/css/style.css">
</head>
<body>
	<!-- Header Start -->
	<div class="header container">
		<div class="row top-header">
			<div class="col-md-3 logo">
				<h3><a href="index.php" title="Steel Spoon" class="logo"><i class="fa fa-spoon fa-2x"></i> Steel Spoon</a></h3>
			</div>
			<div class="col-md-9 top-right-menu">
				<ul class="text-right">
					<li><a href="index.php">Home</a></li>
					<li><a href="allcategory.php">All Recipes</a></li>
					<li><a href="submit-opinion.php">Submit Opinion</a></li>
				</ul>
			</div>
		</div>
		<!-- #Top Header End -->
		<div class="row search-bar margin-top30 margin-bottom20">
			<div class="col-md-4 col-md-offset-4">
				<form class="form-inline" action="search.php" method="get">
				  <div class="form-group">
				    <input type="text" name="q" class="form-control" id="search" placeholder="Search Here...">
				  </div>
				  <input type="submit" value="Search" name="search" class="btn btn-success">
				</form>
			</div>
		</div>