<!--Simranjeet Singh : Instagram - @ItsExceptional-->

<?php require('common/header.php'); ?>	
		<div class="row content margin-top40 margin-bottom30">
		<?php include('common/left-sidebar.php'); ?>
			<!-- #Left Sidebar End -->
			<div class="col-md-6">
			<!-- Recipe Loop Start -->
				<?php
					$limit=8;
					if(!isset($_GET['page']) || $_GET['page']==1){
						$start=0;
					}else{
						$start=($_GET['page']*$limit)-$limit;
					}
					$recipe=get_all_recipe_front($start,$limit);
					if($recipe['bool']==true){
						foreach($recipe['allData'] as $recipe){
							?>
				<div class="panel panel-primary">
					<div class="panel-heading"><?php echo $recipe['title']; ?></div>

					<div class="panel-body">
						<div class="row">
							<div class="col-md-4">
								<a href="recipe-detail.php?recid=<?php echo $recipe['recipe_id']; ?>&title=<?php echo $recipe['title']; ?>" title="Recipe Title">
									<img alt="Recipe Title" class="img-responsive" src="<?php echo $path['siteUrl'];?>/admin/upload/<?php echo $recipe['img']; ?>" />
								</a>
							</div>
							<div class="col-md-8">
								<h4><a href="recipe-detail.php?recid=<?php echo $recipe['recipe_id']; ?>&title=<?php echo $recipe['title']; ?>" title="Recipe Title"><?php echo $recipe['title']; ?></a></h4>
								<p class="margin-top5">
									<?php echo $recipe['small_desc']; ?>
								</p>
							</div>
						</div>
					</div>

					<div class="panel-footer">
						<div class="row">
							<div class="col-md-4"><i class="fa fa-eye"></i>&nbsp;<?php echo $recipe['views']; ?></div>
							<div class="col-md-8 text-right">
								<a href="recipe-detail.php?recid=<?php echo $recipe['recipe_id']; ?>&title=<?php echo $recipe['title']; ?>" class="text-blue">View Detail</a>
							</div>
						</div>
					</div>
				</div>
							<?php
						}
					}
				?>
				<!-- Recipe Loop End -->
				<div class="pagination-container">
					<ul class="pagination">
						<?php
							$totalRecipes=count_recipe();
							$totalRecipes=$totalRecipes['total'];
							$links=ceil($totalRecipes/$limit);
							for($i=1; $i<=$links; $i++){
								if(isset($_GET['page']) && $_GET['page']==$i){
									$class='active';
								}else{
									if($i==1){
										$class='active';
									}else{
										$class='';
									}
									$class='';
								}
								?>
								<li class="<?php echo $class; ?>"><a href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
								<?php
							}
						?>
					</ul>
				</div>
			</div>
			<!-- #Middle Content End -->
			<?php include('common/right-sidebar.php'); ?>
		</div><!-- Row End -->
		<!-- #Content End -->
	</div><!-- Container End -->
<?php include('common/footer.php'); ?>