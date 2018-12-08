<!--Simranjeet Singh : Instagram - @ItsExceptional-->

<?php
	require('../common/functions.php');
	if(isset($_GET['recid'])){
		$recid=(int)$_GET['recid'];
		$deleteRes=delete_recipe($recid);
		if($deleteRes['bool']==true){
			$_SESSION['msg']='<p class="alert alert-success">Recipe has been deleted.</p>';
			header("location:index.php");
		}else{
			$_SESSION['msg']='<p class="alert alert-warning">Recipe has not been deleted.</p>';
			header("location:index.php");
		}
	}
?>