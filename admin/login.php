<!--Simranjeet Singh : Instagram - @ItsExceptional-->

<?php require('../common/functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $path['siteUrl']; ?>/fonts/font-awesome-4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $path['siteUrl']; ?>/lib/bootstrap-3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $path['siteUrl']; ?>/css/style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<h3 class="page-header"><a href="index.php" class="logo"><i class="fa fa-spoon fa-2x"></i> Steel Spoon</a></h3>
				<div class="panel panel-primary">
					<div class="panel-heading">Admin Login</div>
					<div class="panel-body">
					<form action="" method="post">
						<?php
							if(isset($_POST['submit'])){
								$data=array();
								$data['username']=$_POST['_user'];
								$data['password']=$_POST['_pass'];
								$res=admin_login($data);
								if($res['bool']==false){
									echo _error('Invalid Username/Password');
								}else{
									$_SESSION['admin']=true;
									header("location:index.php");
								}
							}
						?>
						<table class="table table-bordered">
							<tr>
								<td>Username</td>
								<td><input type="text" name="_user" class="form-control" /></td>
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="password" name="_pass" class="form-control" /></td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="submit" value="Login" class="btn btn-danger btn-block" /></td>
							</tr>
						</table>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>