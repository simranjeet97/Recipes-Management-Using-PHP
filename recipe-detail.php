<!--Simranjeet Singh : Instagram - @ItsExceptional-->

<?php require('common/header.php'); ?>
<?php
	$recipeId=(int)$_GET['recid'];
	$recipeTitle=$_GET['title'];
	$recipeDetail=get_recipe_by_id($recipeId);
	// _t($recipeDetail);

	// Get Views
	$currentViews=get_views($recipeId);
	// Update Views By IP
	$updateRes=update_views($recipeId,$currentViews['views']);
	// Get Views
	$currentViews=get_views($recipeId);
	// _t($currentViews);
?>
		<div class="row content margin-top40 margin-bottom30">
			<div class="col-md-12">
				<h4 class="page-heading margin-bottom20"><span class="text-muted">Recipe:</span>&nbsp;<span class="text-red"><?php echo $recipeTitle; ?></span></h4>
			</div>
		<?php include('common/left-sidebar.php'); ?>
			<!-- #Left Sidebar End -->
			<div class="col-md-6">
			<!-- Recipe Loop Start -->
				<div class="clearfix"></div>
				<div class="panel panel-primary">
					<?php if($recipeDetail['bool']==true){ ?>
					<div class="panel-heading"><?php echo $recipeDetail['allData']['title']; ?></div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<h4 class="margin-bottom10">Mater Paneer</h4>
								<img class="img-responsive" src="<?php echo $path['siteUrl'];?>/admin/upload/<?php echo $recipeDetail['allData']['img']; ?>" />
							</div>
							<div class="clearfix"></div>
							<div class="col-md-12 margin-top10">
								<p class="margin-top5">
									<?php echo $recipeDetail['allData']['description']; ?>
								</p>
							</div>
							<div class="clearfix"></div>
							<div class="col-md-12 margin-top40">
								<h4>Recipe Video</h4>
								<p class="margin-top5">
									<iframe width="400" height="315" src="<?php echo $recipeDetail['allData']['video_url']; ?>" frameborder="0" allowfullscreen></iframe>
								</p>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-md-6"><i class="fa fa-eye"></i>&nbsp;<?php echo $currentViews['views']; ?></div>
						</div>
					</div>
					<?php }else{
						_warning('No Recipe Found');
					}
					?>
				</div>
				<!-- Recipe Detail End -->
				<div class="clearfix"></div>
			</div>
			<!-- #Middle Content End -->
			<?php include('common/right-sidebar.php'); ?>
		</div><!-- Row End -->
		<!-- #Content End -->
	</div><!-- Container End -->
<?php include('common/footer.php'); ?>