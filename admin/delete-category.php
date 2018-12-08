<!--Simranjeet Singh : Instagram - @ItsExceptional-->

<?php
	require('../common/functions.php');
	if(isset($_GET['catid'])){
		$catid=(int)$_GET['catid'];
		$deleteRes=delete_category($catid);
		if($deleteRes['bool']==true){
			$_SESSION['msg']='<p class="alert alert-success">Category has been deleted.</p>';
			header("location:category.php");
		}else{
			$_SESSION['msg']='<p class="alert alert-warning">Category has not been deleted.</p>';
			header("location:category.php");
		}
	}
?>