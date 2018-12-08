<!--Simranjeet Singh : Instagram - @ItsExceptional-->

<?php require('../common/functions.php'); ?>
<?php
	if(!isset($_SESSION['admin'])){
		header("location:login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin | Steel Spoon</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $path['siteUrl']; ?>/fonts/font-awesome-4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $path['siteUrl']; ?>/lib/bootstrap-3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $path['siteUrl']; ?>/css/style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 top-header">
				<ul class="pull-right">
					<li><a href="<?php echo $path['siteUrl']; ?>" target="_blank">Front View</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
		<h3 class="page-header"><a href="index.php" class="logo"><i class="fa fa-spoon fa-2x"></i> Steel Spoon</a></h3>
		<div class="row">
			<!-- Left Sidebar Start -->
			<div class="col-md-3">
				<div class="list-group">
					<?php
						$currentPage=$_SERVER['PHP_SELF'];
						$endString=explode('/',$currentPage);
						$endStringg=end($endString);
						$recIndPos=strpos($endStringg,'index');
						$recPos=strpos($endStringg,'recipe');
						$catPos=strpos($endStringg,'category');
						$oPos=strpos($endStringg,'opinions');
					?>
					<a href="index.php" class="list-group-item <?php if($recPos!==false || $recIndPos!==false){echo 'active';} ?>">Recipes</a>
					<a href="category.php" class="list-group-item <?php if($catPos!==false){echo 'active';} ?>">Categories</a>
					<a href="opinions.php" class="list-group-item <?php if($oPos!==false){echo 'active';} ?>">Opinions</a>
				</div>
			</div>
			<!-- Left Sidebar End -->